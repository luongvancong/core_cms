<?php

namespace Modules\Resource\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\Resource\Repositories\ResourceRepository;
use Nht\Http\Controllers\Admin\AdminController;

use App;

class ResourceController extends AdminController {

    public function __construct(ResourceRepository $resource)
    {
        parent::__construct();
        $this->resource = $resource;
        $this->uploader = App::make('Uploader');
    }

    public function getIndex(Request $request)
    {
        # code...
    }

    public function getCreate(Request $request)
    {
        return view('resource::admin/create', compact('resource'));
    }

    public function postCreate(Request $request)
    {
        $extension = $request->file('file')->getClientOriginalExtension();
    }

    public function getEdit($id, Request $request)
    {
        # code...
    }

    public function postEdit($id, Request $request)
    {
        # code...
    }

    public function getDelete($id, Request $request)
    {
        # code...
    }
}