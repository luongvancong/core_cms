<?php

namespace Modules\User\Repositories\Chmod;

use Illuminate\Database\Eloquent\Model;

class PermissionGroup extends Model
{
    protected $table = 'permission_group';
    protected $guarded = ['_token', 'id'];
}
