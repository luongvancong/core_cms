<?php

namespace Nht\Hocs\Products;

use Elasticsearch\Client;
use Illuminate\Support\Collection;
use Input;
use Nht\Hocs\Categories\Category;
use Nht\Hocs\Core\BaseRepository;
use Nht\Hocs\ProductImages\ProductImage;
use Nht\Hocs\Products\Product;
use Xss;

/**
 * Class DbSettingRepository.
 *
 * @author	SaturnLai
 */
class DbProductRepository extends BaseRepository implements ProductRepository
{
	protected $model;
	protected $client;

	public function __construct(Product $model)
	{
		$this->model = $model;
	}


	public function getProductsPaginated($perPage = 20, $filterArray = array(), array $sortArray = array(), $paginate = true) {
		$query = $this->model->whereRaw(1);

		$this->buildQueryWithParams($query, $filterArray);

		$query = $this->chainGlobalQueryCondition($query);

		if(empty($sortArray)) $sortArray = ['updated_at' => 'DESC'];

		foreach($sortArray as $key => $value) {
			$query->orderBy($key, $value);
		}

		return $paginate ? $query->paginate($perPage) : $query->take($perPage)->get();
	}

	/**
	 * Binding params to query
	 *
	 * @param  [type] &$query
	 * @param  array  $filterArray
	 * @return void
	 */
	private function buildQueryWithParams(&$query, array $filterArray) {
        $id           = (int) array_get($filterArray, 'id');
        $name         = array_get($filterArray, 'name');
        $price        = (int) array_get($filterArray, 'price');
        $type         = array_get($filterArray, 'type');
        $brandId      = (int) array_get($filterArray, 'brand_id');
        $categoryId   = (array) array_get($filterArray, 'category_id');
        $activeStatus = (array) array_get($filterArray, 'active');

        if($activeStatus) {
            $query->whereIn('active', $activeStatus);
        }

		if($brandId) {
			$query->where('brand_id', $brandId);
		}

		if($categoryId) {
			$query->whereIn('category_id', $categoryId);
		}

		if($id > 0) {
			$query->where('id', $id);
		}

		if($name) {
			$query->where('name', 'LIKE', '%'. $name .'%');
		}

		if($price > 0) {
			$query->where('price', $price);
		}

        if(!is_null($type) && $type != "") {
            $type = (int) $type;
            $query->where('type', $type);
        }
	}



    public function chainGlobalQueryCondition($query) {
    	return $query->where('id', '>', 0);
    }


    public function countAllProducts() {
    	return $this->model->count();
    }


    public function saveProductImages($product, array $images) {
    	foreach($images as $image) {
    		$product->images()->create([
				'product_id' => $product->getId(),
				'image'      => $image
    		]);
    	}
    }


    public function getRalatedProducts($product, $take = 10) {
    	return $this->model->whereNotIn('id', [$product->getId()])
    					    ->where('category_id', $product->category_id)
    					    ->orderBy('updated_at', 'DESC')
    					    ->take($take)
    					    ->get();
    }


    public function deleteMultiByIds(array $ids) {
        return $this->model->whereIn('id', $ids)->delete();
    }
}