<?php

namespace Nht\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Nht\Http\Requests;
use Nht\Http\Controllers\Admin\AdminController;

use Nht\Hocs\Pictures\PictureRepository;

use File;

class PictureController extends AdminController
{

    public function __construct(PictureRepository $picture)
    {
        $this->picture = $picture;
    }

    public function getIndex(Request $request)
    {
        $picture = $this->picture->getPaginated(20, $request->all());

        return view('admin/pictures/index', compact('picture'));
    }

    public function getDelete(Request $request, $id)
    {
        $picture = $this->picture->getById($id);
        $directory = PATH_UPLOAD_IMAGE_PRODUCT;

        if (File::exists($directory)) {
            File::delete(PATH_UPLOAD_IMAGE_PRODUCT. $picture->image);
            File::delete(PATH_UPLOAD_IMAGE_PRODUCT. "lg_" .$picture->image);
            File::delete(PATH_UPLOAD_IMAGE_PRODUCT. "xlg_" .$picture->image);
            File::delete(PATH_UPLOAD_IMAGE_PRODUCT. "md_" .$picture->image);
            File::delete(PATH_UPLOAD_IMAGE_PRODUCT. "sm_" .$picture->image);

            $this->picture->deleteById($id);

            return redirect()->route('admin.picture.index')->with('success', 'Xóa thành công');
        }

    }

    public function getActive($id)
    {
        $picture = $this->picture->updateActive($id);
        
        if ($picture) 
            return response()->json(['code' => 1, 'status' => $picture->getActive() ]);
        else
            return response()->json(['code' => 0]);
    }

}
