<?php

namespace Modules\Setting\Repositories;

use App\Hocs\Core\BaseRepository;


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

    public function getAllActive()
    {
        return $this->model->where('active', 1)->get();
    }

    public function getByKey($key, array $default = array())
    {
        $row = $this->model->where('key', $key)->first();
        return $row ? $row : new Setting($default);
    }
}