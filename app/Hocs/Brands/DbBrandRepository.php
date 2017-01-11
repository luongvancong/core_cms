<?php namespace Nht\Hocs\Brands;

use Nht\Hocs\Core\BaseRepository;

class DbBrandRepository extends BaseRepository implements BrandRepository{
	public function __construct(Brand $model) {
		$this->model = $model;
	}

	public function getBrands($perPage = 25, $filterArray = array()) {
		$name = array_get($filterArray, 'name');
		$query = $this->model->whereRaw(1);

		if($name) {
			$query->where('name', 'LIKE', '%'. $name .'%');
		}

		$query->orderBy('updated_at', 'DESC');

		return $query->paginate($perPage);
	}

	public function getAllBrands() {
		return $this->model->orderBy('name', 'ASC')->where('total_products', '>', 0)->get();
	}

	public function getByName($name) {
		return $this->model->where('name', $name)->first();
	}

	public function getBySlug($slug) {
		return $this->model->where('slug', $slug)->first();
	}

	public function getBySlugOrFail($slug) {
		$brand = $this->getBySlug($slug);
		if(!$brand) {
			return app()->abort(404);
		}

		return $brand;
	}

	public function searchByName($name) {
		return $this->model->where('name', 'LIKE', '%'. $name .'%')
							->where('total_products', '>', 0)
							->orderBy('name', 'ASC')
							->get();
	}

	public function getAllBrandHasProduct() {
		return $this->model->where('total_products', '>', 0)->orderBy('name', 'ASC')->get();
	}
}