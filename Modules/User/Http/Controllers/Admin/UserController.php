<?php

namespace Modules\User\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\User\Http\Requests\AdminUserFormRequest;
use Modules\User\Repositories\Chmod\RoleRepository;
use Modules\User\Repositories\UserRepository;
use App\Http\Controllers\Admin\AdminController;
use App;

/**
 * Class description.
 *
 * @author  Justin
 */
class UserController extends AdminController
{
    /**
     * @var UserRepository
     */
    protected $user;
    protected $role;
    private $imageUploader;

    public function __construct(UserRepository $user, RoleRepository $role)
    {
        $this->user = $user;
        $this->role = $role;
        $this->imageUploader = App::make('ImageFactory');
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        $filter = $request->all();
        $filter['sort'] = ['created_at' => "DESC"];
        $users = $this->user->filter($filter);
        return view('user::admin/users/index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        $roles = $this->role->getAll();
        return view('user::admin/users/create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     * @param AdminUserFormRequest $request
     * @return mixed
     */
    public function store(AdminUserFormRequest $request)
    {
        $formData = $request->except(['_token', 'roles', 'avatar']);
        $formData['password'] = bcrypt($formData['password']);

        if ($request->hasFile('avatar')) {
            $resultUpload = $this->imageUploader->upload('avatar');
            if ($resultUpload['status'] > 0) {
                $formData['avatar'] = $resultUpload['filename'];
            }
        }

        if ($newUser = $this->user->create($formData)) {
            $roles = (array)$request->get('roles');
            $newUser->roles()->sync($roles);
            return redirect()->route('user.index')->with('success', trans('general.messages.create_success'));
        }
        return redirect()->back()->withInputs()->with('error', trans('general.messages.create_fail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return mixed
     */
    public function edit($id)
    {
        $user = $this->user->getById($id);
        $roles = $this->role->getAll();
        $user_roles = array_pluck($user->roles, 'id');
        return view('user::admin/users/edit', compact('user', 'roles', 'user_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param AdminUserFormRequest $request
     * @return mixed
     */
    public function update($id, AdminUserFormRequest $request)
    {
        $data = $request->except('_token', 'roles', 'avatar');

        if ($request->hasFile('avatar')) {
            $resultUpload = $this->imageUploader->upload('avatar');
            if ($resultUpload['status'] > 0) {
                $data['avatar'] = $resultUpload['filename'];
            }
        }

        if ($this->user->update($data, ['id' => $id])) {
            if ($user = $this->user->find($id)) {
                $roles = (array)$request->get('roles');
                if ($roles) {
                    $user->roles()->sync($roles);
                }
            }
            return redirect()->route('user.index')->with('success', trans('general.messages.update_success'));
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
        if ($this->user->delete($id)) {
            return redirect()->route('user.index')->with('success', trans('general.messages.delete_success'));
        }
        return redirect()->route('user.index')->with('error', trans('general.messages.delete_fail'));
    }
}
