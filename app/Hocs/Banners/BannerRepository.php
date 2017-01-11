<?php

namespace Nht\Hocs\Banners;

interface BannerRepository {
	/**
	 * Lấy banner
	 *
	 * @param  integer $take     Số lượng cần lấy
	 * @param  string  $position Vị trí
	 * @param  string  $page     Trang đích
	 *
	 * @return Collection
	 */
	public function getBanners($take = 5, $position, $page);

	/**
	 * Get banners have paginated
	 * @param  int $perPage
	 * @param  array  $filter
	 * @param  array  $sort
	 * @return Illuminate\Contracts\Pagination\Paginator
	 */
	public function getBannersPaginated($perPage = 20, array $filter = array(), array $sort = array());
}