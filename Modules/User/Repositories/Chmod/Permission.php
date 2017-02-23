<?php

namespace Modules\User\Repositories\Chmod;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
   protected $guarded = ['_token'];
}
