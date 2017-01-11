<?php

namespace Nht\Http\Controllers\Admin;

use App;
use Illuminate\Http\Request;
use Nht\Hocs\Transporters\TransporterRepository;
use Nht\Http\Controllers\Controller;
use Nht\Http\Requests\AdminTransporterFormRequest;

class TransporterController extends AdminController
{
    protected $transporter;

    protected $imageUploader;

    public function __construct(TransporterRepository $transporter)
    {
        parent::__construct();
        $this->transporter = $transporter;
        $this->imageUploader = App::make('ImageFactory');
    }

    public function getIndex(Request $request)
    {
        $transporters = $this->transporter->getTransporters(20, $request->all(), $request->all());
        return view('admin/transporters/index', compact('transporters'));
    }


    /**
     * Create form
     * @param  Request $request
     * @return view
     */
    public function getCreate(Request $request)
    {
        $transporter = $this->transporter->getInstance();
        return view('admin/transporters/create', compact('transporter'));
    }


    /**
     * Store a transporter
     * @param  Nht\Http\Requests\AdminTransporterFormRequest $request
     * @return mixed
     */
    public function postCreate(AdminTransporterFormRequest $request)
    {
        $data = $request->except(['_token', 'image']);
        $data = $this->removeNullValue($data);
        $data = $this->parseData($data,$request);

        if($this->transporter->create($data)) {
            return redirect()->route('admin.transporter.index')->with('success', 'Cập nhật thành công');
        }

        return redirect()->route('admin.transporter.index')->with('error', 'Cập nhật không thành công');
    }


    /**
     * Edit form
     * @param $id
     * @param Request $request
     */
    public function getEdit($id, Request $request) {
        $transporter = $this->transporter->getById($id);
        return view('admin/transporters/edit', compact('transporter'));
    }


    /**
     * Store a transporter
     * @param $id
     * @param AdminTransporterFormRequest $request
     */
    public function postEdit($id, AdminTransporterFormRequest $request) {
        $transporter = $this->transporter->getById($id);
        $data = $request->except(['_token', 'image']);
        $data = $this->removeNullValue($data);
        $data = $this->parseData($data,$request);

        if($this->transporter->update($data, ['id' => $id])) {
            return redirect()->route('admin.transporter.index')->with('success', 'Cập nhật thành công');
        }

        return redirect()->route('admin.transporter.index')->with('error', 'Cập nhật không thành công');
    }


    /**
     * Delete a transporter
     * @param $id
     */
    public function getDelete($id) {
        $transporter = $this->transporter->getById($id);
        if($transporter->delete()) {
            return redirect()->route('admin.transporter.index')->with('success', 'Xóa không thành công');
        }

        return redirect()->route('admin.transporter.index')->with('error', 'Xóa không thành công');
    }


    public function getActive($id) {
        $transporter = $this->transporter->getById($id);
        $transporter->active = !$transporter->active;
        $transporter->save();

        return response()->json([
            'code' => 1,
            'status' => $transporter->active
        ]);
    }

    /**
     * Merge data if has file upload
     * @param array $data
     * @param $request
     * @return array
     */
    private function parseData(array $data, $request) {
        if($request->hasFile('image')) {
            $resultUpload = $this->imageUploader->upload('image', config('image.array_resize_image'), 'resize');
            if($resultUpload['status'] > 0) {
                $data['image'] = $resultUpload['filename'];
            }
        }

        return $data;
    }


    /**
     * Get images of a transporter
     * @param  int  $transporterId
     * @param  Request $request
     * @return mixed
     */
    public function getImages($transporterId, Request $request)
    {
        $transporter = $this->transporter->getById($transporterId);
        $images = $transporter->images()->paginate(20);
        return view('admin/transporters/images/index', compact('transporter', 'images'));
    }


    /**
     * Create images transporter
     * @param  int  $transporterId
     * @param  Request $request       [description]
     * @return mixed
     */
    public function getCreateImages($transporterId, Request $request)
    {
        $transporter = $this->transporter->getById($transporterId);
        return view('admin/transporters/images/create', compact('transporter'));
    }

    /**
     * Store images
     * @param  int  $transporterId
     * @param  Request $request
     * @return mixed
     */
    public function postCreateImages($transporterId, Request $request)
    {
        $transporter = $this->transporter->getById($transporterId);
        $images = $this->imageUploader->uploadMulti('images', config('image.array_resize_image'), 'resize');

        if($images['filename']) {
            $this->transporter->saveImages($transporter, $images['filename']);
        }

        return redirect()->route('admin.transporter.images',$transporter->getId())->with('success', 'Cập nhật thành công');
    }


    /**
     * Get delete image of transporter
     * @param  int $transporterId
     * @param  int $imageId
     * @return mixed
     */
    public function deleteImage($transporterId, $imageId)
    {
        $transporter = $this->transporter->getById($transporterId);
        $image = $transporter->images()->findOrFail($imageId);
        if($image->delete()) {
            return redirect()->route('admin.transporter.images',$transporter->getId())->with('success', 'Cập nhật thành công');
        }

        return redirect()->route('admin.transporter.images',$transporter->getId())->with('error', 'Cập nhật ko thành công');
    }
}
