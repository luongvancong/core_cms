<?php

namespace Modules\User\Repositories\Chmod;

/**
 * Interface description.
 *
 * @author	AlvinTran
 */
interface RoleRepository
{
	public function getByName($role);
}