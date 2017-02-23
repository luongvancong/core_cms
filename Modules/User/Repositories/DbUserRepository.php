<?php

namespace Modules\User\Repositories;

use Illuminate\Contracts\Auth\Guard;
use Modules\User\Repositories\User;
use Nht\Hocs\Core\BaseRepository;

/**
 * Class DbUserRepository.
 *
 */
class DbUserRepository extends BaseRepository implements UserRepository
{

	protected $model;
	protected $auth;

	public function __construct(User $model, Guard $auth)
	{
		$this->model = $model;
		$this->auth = $auth;
	}

	public function getByEmail($email)
	{
		return $this->model->where('email', $email)->first();
	}

	public function getActivedUser($pageSize = 20)
	{
		$this->model->where('active', 1)->paginate($pageSize);
	}

	public function getCurrentUser()
	{
		return $this->auth->user();
	}

	public function isLogged()
	{
		return $this->auth->check();
	}

	public function isAdmin()
	{
		return $this->isLogged() && $this->getCurrentUser()->hasRole(['admin']);
	}

	public function isSuperAdmin() {
		return $this->isLogged() && $this->getCurrentUser()->hasRole('superadmin');
	}

	public function createUserFromSocialite($user) {
		$dataUser = [
			'name'     => $user->getName(),
			'nickname' => $user->getName(),
			'email'    => $user->getEmail(),
			'password' => bcrypt($user->getEmail())
		];

		return $this->create($dataUser);
	}

	public function getAllUser()
	{
		return $this->model->all();
	}

	public function getUserById($id)
	{
		return $this->model->find($id);
	}


	public function countAllUsers() {
		return $this->model->count();
	}
}
