<?php

namespace Modules\Category\Repositories;

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
}