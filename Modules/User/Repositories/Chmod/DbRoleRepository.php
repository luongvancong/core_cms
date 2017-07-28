<?php

namespace Modules\User\Repositories\Chmod;

use Modules\User\Repositories\Chmod\Role;
use App\Hocs\Core\BaseRepository;

class DbRoleRepository extends BaseRepository implements RoleRepository {

	protected $model;

	public function __construct(Role $model)
	{
		$this->model = $model;
	}

	public function getByName($role)
	{
		return $this->model->where('name', $role)->first();
	}
}