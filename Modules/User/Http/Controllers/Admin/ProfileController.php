<?php

namespace Modules\User\Http\Controllers\Admin;

use App;
use Illuminate\Http\Request;
use Modules\User\Http\Requests\AdminProfileChangePasswordFormRequest;
use Modules\User\Http\Requests\AdminUserFormRequest;
use Modules\User\Repositories\Chmod\RoleRepository;
use Modules\User\Repositories\UserRepository;
use Nht\Http\Controllers\Admin\AdminController;

/**
 * Class description.
 *
 * @author Justin
 */
class ProfileController extends AdminController
{
    protected $user;
    protected $role;

    public function __construct(UserRepository $user, RoleRepository $role)
    {
        $this->user = $user;
        $this->role = $role;
        $this->imageUploader = App::make('ImageFactory');
        parent::__construct();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getProfile(Request $request)
    {
        $user = $this->user->getCurrentUser();
        $roles = $this->role->getAll();
        $user_roles = array_pluck($user->roles, 'id');
        return view('user::admin/users/profile', compact('user', 'roles', 'user_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function postProfile(AdminUserFormRequest $request)
    {
        $user = $this->user->getCurrentUser();
        $id = $user->getId();
        $data = $request->except('_token', 'roles', 'avatar');

        if($request->hasFile('avatar')) {
            $resultUpload = $this->imageUploader->upload('avatar');
            if($resultUpload['status'] > 0) {
                $data['avatar'] = $resultUpload['filename'];
            }
        }

        if ($this->user->update($data, ['id' => $id]))
        {
            if ($user = $this->user->find($id))
            {
                $roles = (array) $request->get('roles');
                if($roles) {
                    $user->roles()->sync($roles);
                }
            }
            return redirect()->route('user.index')->with('success', trans('general.messages.update_success'));
        }
        return redirect()->back()->withInputs()->with('error', trans('general.messages.update_fail'));
    }


    /**
     * Get change password
     * @return [type] [description]
     */
    public function getChangePassword()
    {
        $user = $this->user->getCurrentUser();
        return view('user::admin/users/change_password', compact('user'));
    }


    /**
     * Post change password
     * @return [type] [description]
     */
    public function postChangePassword(AdminProfileChangePasswordFormRequest $request)
    {
        $user = $this->user->getCurrentUser();

        $oldPassword = clean($request->get('old_password'));
        $newPassword = clean($request->get('new_password'));


        // Neu mat khau cu khong dung
        if(false === \Hash::check($oldPassword, $user->password)) {
            return redirect()->route('user.index')->with('error', 'Old password do not match');
        }

        $data = [
            'password' => bcrypt($newPassword)
        ];

        if($this->user->update($data, ['id' => $user->getId()])) {
            return redirect()->route('user.index')->with('success', trans('general.messages.update_success'));
        }

        return redirect()->route('user.index')->with('error', trans('general.messages.update_fail'));
    }
}
