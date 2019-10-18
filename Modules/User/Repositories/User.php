<?php

namespace Modules\User\Repositories;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    protected $guarded = ['roles', 'id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function getName()
    {
        return $this->name;
    }

    public function getUrl()
    {
        return route('account.profile');
    }

    public function getId()
    {
        return $this->id;
    }

    public function getSlug()
    {
        return removeTitle($this->name);
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getShopId()
    {
        return $this->shop_id;
    }

    public function isRoot() {
        return true;
    }

    public function isAdmin() {
        return true;
    }

}
