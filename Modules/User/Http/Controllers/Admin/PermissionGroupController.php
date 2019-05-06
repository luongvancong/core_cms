<?php

namespace Modules\User\Http\Controllers\Admin;

use Illuminate\View\View;
use Modules\User\Http\Requests\AdminPermissionFormRequest;
use Modules\User\Http\Requests\AdminPermissionGroupFormRequest;
use Modules\User\Repositories\Chmod\PermissionGroup;
use Modules\User\Repositories\Chmod\PermissionRepository;
use Modules\User\Repositories\Chmod\RoleRepository;
use App\Http\Controllers\Admin\AdminController;

class PermissionGroupController extends AdminController
{

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $items = PermissionGroup::orderBy('created_at', 'DESC')->paginate(25);
        return view('user::admin/permission-group/index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('user::admin/permission-group/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return View
     */
    public function store(AdminPermissionGroupFormRequest $request)
    {
        $item = new PermissionGroup($request->all());
        $item->save();
        return redirect()->route('permission-group.index')->with('success', trans('general.messages.create_success'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return View
     */
    public function edit($id)
    {
        $item = PermissionGroup::findOrFail($id);
        return view('user::admin/permission-group/edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return mixed
     */
    public function update($id, AdminPermissionGroupFormRequest $request)
    {
        $item = PermissionGroup::findOrFail($id);
        $item->fill($request->all());
        $item->save();
        return redirect()->route('permission-group.index')->with('success', trans('general.messages.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return mixed
     */
    public function destroy($id)
    {
        $item = PermissionGroup::findOrFail($id);
        $item->delete();
        return redirect()->route('permission-group.index')->with('success', trans('general.messages.delete_success'));
    }
}
