<?php

namespace Modules\User\Http\Controllers\Admin;

use Modules\User\Http\Requests\AdminRoleFormRequest;
use Modules\User\Repositories\Chmod\PermissionRepository;
use Modules\User\Repositories\Chmod\RoleRepository;
use App\Http\Controllers\Admin\AdminController;


class RoleController extends AdminController
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
    * @return Response
    */
    public function index()
    {
        $roles = $this->role->getAllWithPaginate();
        return view('user::admin/roles/index', compact('roles'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function create()
    {
        $permissions = $this->perm->getAll();
        $permissions = $permissions->sortBy('name');
        return view('user::admin/roles/create', compact('permissions'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store(AdminRoleFormRequest $request)
    {
        if ($newRole = $this->role->create($request->except(['_token', 'perms'])))
        {
            $perms = (array) $request->get('perms');
            $newRole->perms()->sync($perms);
            return redirect()->route('role.index')->with('success', trans('general.messages.create_success'));
        }
        return redirect()->back()->withInputs()->with('error', trans('general.messages.create_fail'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
    public function edit($id)
    {
        $role = $this->role->getById($id);
        $permissions = $this->perm->getAll();
        $permissions = $permissions->sortBy('name');
        $role_permissions = array_pluck($role->perms, 'id');
        return view('user::admin/roles/edit', compact('role', 'permissions', 'role_permissions'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function update($id, AdminRoleFormRequest $request)
    {
        if ($this->role->update($request->except('_token', 'perms'), ['id' => $id]))
        {
            if ($role = $this->role->find($id))
            {
                $perms = (array) $request->get('perms');
                $role->perms()->sync($perms);
            }
            return redirect()->route('role.index')->with('success', trans('general.messages.update_success'));
        }
        return redirect()->back()->withInputs()->with('error', trans('general.messages.update_fail'));
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
    public function destroy($id)
    {
        if ($this->role->delete($id))
        {
            return redirect()->route('role.index')->with('success', trans('general.messages.delete_success'));
        }
        return redirect()->route('role.index')->with('error', trans('general.messages.delete_fail'));
    }
}
