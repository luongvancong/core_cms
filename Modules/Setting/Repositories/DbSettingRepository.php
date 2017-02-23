<?php

namespace Modules\Setting\Repositories;

use Nht\Hocs\Core\BaseRepository;


/**
 * Class DbSettingRepository.
 *
 * @author	SaturnLai
 */
class DbSettingRepository extends BaseRepository implements SettingRepository
{
	protected $model;
	public function __construct(Setting $model)
	{
		$this->model = $model;
	}
}