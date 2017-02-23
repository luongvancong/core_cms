<?php

namespace Nht\Hocs\Products;

use Nht\Hocs\Categories\Category;

/**
 * Interface description.
 *
 * @author	AlvinTran
 */
interface ProductRepository
{

    /**
     * Get products have paginate
     * @param  integer $perPage
     * @param  array   $filterArray
     * @param  array   $sortArray
     * @return Paginator
     */
	public function getProductsPaginated($perPage = 20, $filterArray = array(), array $sortArray = array(), $paginate = true);


    /**
     * Gắn điều kiện query chung vào câu query
     * @param  Model/DB $query
     * @return void
     */
    public function chainGlobalQueryCondition($query);


    /**
     * Count all products
     * @return int
     */
    public function countAllProducts();


    /**
     * Save product images
     * @return [type] [description]
     */
    public function saveProductImages($product, array $images);


    /**
     * Sản phẩm liên quan
     * @param  [type]  $product [description]
     * @param  integer $take    [description]
     * @return [type]           [description]
     */
    public function getRalatedProducts($product, $take = 10);


    /**
     * Delete multi by ids
     * @param  array  $ids
     * @return mixed
     */
    public function deleteMultiByIds(array $ids);

}