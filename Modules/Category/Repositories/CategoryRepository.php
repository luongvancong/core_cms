<?php

namespace Modules\Category\Repositories;

use Illuminate\Support\Collection;

interface CategoryRepository
{
	public function getCategoryBySlug($slug);

    public function getOneChildThietKeByParentId($parentId);

    /**
     * Get childs
     * @param  Category $category [description]
     * @return [type]             [description]
     */
    public function getChildsById($id, $take = 20);


    /**
     * Safe update category
     * @param  array  $array
     * @param  integer $id
     * @param  \Illuminate\Support\Collection $categories
     * @return boolean
     */
    public function safeUpdate(array $data, $id, Collection $categories);


    /**
     * Lấy tất cả con, cháu, chắt, chút, chít của danh mục theo id
     * @param  integer $parentId
     * @param  \Illuminate\Support\Collection $categories
     * @return \Illuminate\Support\Collection
     */
    public function getChildRecursive($parentId, Collection $categories);
}