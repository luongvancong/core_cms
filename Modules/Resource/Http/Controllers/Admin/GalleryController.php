<?php

namespace Modules\Resource\Http\Controllers\Admin;

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
        # code...
    }
}