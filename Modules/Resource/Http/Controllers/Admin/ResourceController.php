<?php

namespace Modules\Resource\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\Resource\Repositories\ResourceRepository;
use Nht\Http\Controllers\Admin\AdminController;

use App;

class ResourceController extends AdminController {

    /**
     * [$uploader description]
     * @var \Nht\Hocs\Core\Uploads\Uploader
     */
    protected $uploader;


    /**
     * [$imageUploader description]
     * @var \Nht\Hocs\Core\Images\ImageFactory
     */
    protected $imageUploader;


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
        $resources = $this->resource->getResources(20);
        return view('resource::admin/index', compact('resources'));
    }

    public function getCreate(Request $request)
    {
        return view('resource::admin/create', compact('resource'));
    }

    public function postCreate(Request $request)
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
            return redirect()->route('admin.resource.index')->with('success', 'Cập nhật thành công');
        }

        return redirect()->route('admin.resource.index')->with('error', 'Cập nhật không thành công');
    }

    public function getDelete($id, Request $request)
    {
        $resource = $this->resource->getById($id);
        $imageName = $resource->getName();

        if($resource->delete()) {
            // Xóa luôn cả file
            $uploadPath = public_path() . '/uploads/';
            $arrayResizeImage = config('image.array_resize_image');
            $targetFolder = get_image_folder($imageName);
            @unlink($uploadPath . $targetFolder . '/'. $imageName);
            foreach($arrayResizeImage as $key => $value) {
                @unlink($uploadPath . $targetFolder . '/'. $key . $imageName);
            }

            return redirect()->route('admin.resource.index')->with('success', 'Xóa thành công');
        }

        return redirect()->route('admin.resource.index')->with('error', 'Xóa không thành công');
    }


        /**
     * Ajax editable
     * @param  Request $request
     * @return json
     */
    public function ajaxEditAble(Request $request)
    {
        $id    = $request->get('pk');
        $field = $request->get('name');
        $value = clean($request->get('value'));

        $item = $this->resource->getById($id);
        $item->$field = $value;

        if($item->save()) {
            return response()->json(['code' => 1]);
        }

        return response()->json(['code' => 0]);
    }
}