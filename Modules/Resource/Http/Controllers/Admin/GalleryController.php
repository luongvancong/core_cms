<?php

namespace Modules\Resource\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\Resource\Repositories\ResourceRepository;
use Nht\Http\Controllers\Admin\AdminController;

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
}