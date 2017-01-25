<?php

namespace Modules\User\Repositories\Chmod;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
   protected $guarded = ['_token', 'perms'];

   public function users()
   {
       return $this->belongsToMany('Modules\User\Repositories\User');
   }
}
