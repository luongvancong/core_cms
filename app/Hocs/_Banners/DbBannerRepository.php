<?php

namespace Nht\Hocs\Banners;

use Nht\Hocs\Core\BaseRepository;

class DbBannerRepository extends BaseRepository implements BannerRepository {

	public function __construct(Banner $model)
	{
		$this->model = $model;
	}

	public function getBanners($take = 5, $position, $page) {
		return $this->model->where('status', Banner::ACTIVE)
								 ->where('position', trim($position))
								 ->where('page', trim($page))
								 ->orderBy('sort', 'ASC')
								 ->take(5)
								 ->get();
	}

	public function getBannersPaginated($perPage = 20, array $filter = array(), array $sort = array()) {
		$query = $this->model->whereRaw(1);

		$position = array_get($filter, 'position');
		$page = array_get($filter, '_page');

		if($position) $query->where('position', trim($position));
		if($page) $query->where('page', trim($page));

		if(!$sort) $sort = ['updated_at' => 'DESC'];
		foreach($sort as $key => $value) {
			$query->orderBy($key, $value);
		}

		return $query->paginate($perPage);
	}

}