<?php

namespace Modules\User\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Modules\User\Http\Requests\AdminPermissionFormRequest;
use Modules\User\Repositories\Chmod\Permission;
use Modules\User\Repositories\Chmod\PermissionGroup;
use Modules\User\Repositories\Chmod\PermissionRepository;
use Modules\User\Repositories\Chmod\RoleRepository;
use App\Http\Controllers\Admin\AdminController;

class PermissionController extends AdminController
{
    protected $role;
    protected $perm;

    public function __construct(RoleRepository $role, PermissionRepository $perm)
    {
        $this->role = $role;
        $this->perm = $perm;
        parent::__construct();
    }


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(Request $request)
    {
        $groups = PermissionGroup::orderBy('name', 'ASC')->get();
        $query = Permission::orderBy('name', 'ASC')->with('group');
        if($groupId = $request->get('group_id')) {
            $query->where('group_id', $groupId);
        }
        $permissions = $query->paginate(200);
        return view('user::admin/permissions/index', compact('permissions', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $groups = PermissionGroup::orderBy('name', 'ASC')->get();
        return view('user::admin/permissions/create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return View
     */
    public function store(AdminPermissionFormRequest $request)
    {
        if ($perm = $this->perm->create($request->except(['_token']))) {
            return redirect()->route('permission.index')->with('success', trans('general.messages.create_success'));
        }
        return redirect()->back()->withInputs()->with('error', trans('general.messages.create_fail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return View
     */
    public function edit($id)
    {
        $permission = $this->perm->getById($id);
        $groups = PermissionGroup::orderBy('name', 'ASC')->get();
        return view('user::admin/permissions/edit', compact('permission', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return mixed
     */
    public function update($id, AdminPermissionFormRequest $request)
    {
        if ($this->perm->update($request->except('_token'), ['id' => $id])) {
            return redirect()->route('permission.index')->with('success', trans('general.messages.update_success'));
        }
        return redirect()->back()->withInputs()->with('error', trans('general.messages.update_fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return mixed
     */
    public function destroy($id)
    {
        if ($this->perm->delete($id)) {
            return redirect()->route('permission.index')->with('success', trans('general.messages.delete_success'));
        }
        return redirect()->route('permission.index')->with('error', trans('general.messages.delete_fail'));
    }
}
