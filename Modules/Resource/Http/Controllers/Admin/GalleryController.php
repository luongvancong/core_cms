<?php

namespace Modules\Resource\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\Resource\Repositories\ResourceRepository;
use Nht\Http\Controllers\Admin\AdminController;
use App;

class GalleryController extends AdminController {

    /**
     * [$resource description]
     * @var \Modules\Resource\Repositories\ResourceRepository
     */
    protected $resource;

    public function __construct(ResourceRepository $resource)
    {
        parent::__construct();
        $this->resource = $resource;
        $this->uploader = App::make('Uploader');
        $this->imageUploader = App::make('ImageFactory');
    }

    public function getIndex(Request $request)
    {
        $filter = [
            'extensions' => array('jpg', 'jpeg', 'png', 'bmp', 'gif')
        ];

        $images = $this->resource->getResources(100, $filter);

        return view('resource::admin/gallery/index', compact('images'));
    }


    public function getDelete(Request $request)
    {
        $resource = $this->resource->getByName($request->get('image'));
        if($resource) {
            $imageName = $resource->getName();

            if($resource->delete()) {
                // Xóa luôn cả file
                $uploadPath = public_path() . '/'. config('upload.upload_folder') .'/';
                $arrayResizeImage = config('image.array_resize_image');
                $targetFolder = get_image_folder($imageName);
                @unlink($uploadPath . $targetFolder . '/'. $imageName);
                foreach($arrayResizeImage as $key => $value) {
                    @unlink($uploadPath . $targetFolder . '/'. $key . $imageName);
                }
            }
        }
    }


    public function ajaxUploadImage(Request $request)
    {
        $extension = $request->file('file')->getClientOriginalExtension();
        $data = [];
        if(in_array($extension, array('gif', 'png', 'jpg', 'bmp', 'jpeg'))) {
            $resultUpload = $this->imageUploader->upload('file', config('image.array_resize_image'), 'resize');
            if($resultUpload['status'] > 0) {
                $data['name'] = $resultUpload['filename'];
                $data['extension'] = $extension;
                $data['size'] = $resultUpload['size'];
                list($width, $height) = getimagesize($resultUpload['path']);
                $data['width'] = $width;
                $data['height'] = $height;
            }
        } else {
            $resultUpload = $this->uploader->upload('file');
            $data['name'] = $resultUpload;
            $data['extension'] = $extension;
            $data['size'] = filesize($this->uploader->getUploadFolderPathToDay() . '/' . $resultUpload);
        }

        if($data) {
            $this->resource->create($data);
            return response()->json(['code' => 1]);
        }

        return response()->json(['code' => 0]);
    }
}