<?php

namespace Modules\Menu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\Menu\Repositories\MenuRepository;
use Nht\Http\Controllers\Admin\AdminController;

class MenuController extends AdminController {

    public function __construct(MenuRepository $menu)
    {
        parent::__construct();
        $this->menu = $menu;
    }

    public function getIndex(Request $request)
    {
        # code...
    }

    public function getCreate(Request $request)
    {
        $menu = $this->menu->getInstance();
        $type = (int) $request->get('type');
        $menus = $this->menu->get();
        return view('menu::admin/create', compact('menu', 'type', 'menus'));
    }

    public function postCreate()
    {
        # code...
    }

    public function getDelete($id)
    {
        # code...
    }

    public function getActive($id)
    {
        # code...
    }
}