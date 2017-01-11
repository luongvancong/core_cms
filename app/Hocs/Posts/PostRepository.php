<?php

namespace Nht\Hocs\Posts;

use Nht\Hocs\Products\Product;
use Nht\Hocs\Tags\Tag;

/**
 * Interface description.
 *
 * @author	AlvinTran
 */
interface PostRepository
{
	public function getAll();
	public function getById($id);


    /**
     * Get post and filter, sort
     * @param  integer $perPage
     * @param  array   $filterArray
     * @return Paginator
     */
	public function getPosts($perPage = 20, $filterArray = array(), array $sortArray = array());


    /**
     * Đếm tất cả bài post
     * @return int
     */
    public function countAllPosts();



    /*
     * Lấy tin tức theo id danh mục
     * @param  int $categoryId
     * @param  int $take
     * @return Collection
     */
    public function getPostByCategoryId($categoryId, $take = 10);
}