<?php

namespace Modules\Menu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\Menu\Http\Requests\AdminMenuFormRequest;
use Modules\Menu\Repositories\Menu;
use Modules\Menu\Repositories\MenuRepository;
use Modules\Post\Repositories\PostRepository;
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

    public function postCreate(AdminMenuFormRequest $request)
    {
        $type = (int) $request->get('type');

        $data = [
            'label'     => clean($request->get('label')),
            'url'       => clean($request->get('url')),
            'type'      => $type,
            'object_id' => (int) $request->get('object_id'),
            'parent_id' => (int) $request->get('parent_id')
        ];

        if($menu = $this->menu->create($data)) {
            return redirect()->route('admin.menu.index')->with('success', 'Cập nhật thành công');
        }

        return redirect()->route('admin.menu.index')->with('error', 'Cập nhật không thành công');
    }

    public function getDelete($id)
    {
        # code...
    }

    public function getActive($id)
    {
        # code...
    }


    public function ajaxSearchPost(Request $request, PostRepository $postRepository)
    {
        $posts = $postRepository->getPosts(20, ['title' => $request->get('q')]);
        $json = [];
        foreach($posts as $item) {
            $json[] = [
                'id' => $item->getId(),
                'name' => $item->getTitle()
            ];
        }

        return response()->json($json);
    }
}