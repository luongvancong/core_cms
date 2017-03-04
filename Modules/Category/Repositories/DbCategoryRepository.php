<?php

namespace Modules\Category\Repositories;

use Illuminate\Database\DatabaseManager as DBM;
use Illuminate\Support\Collection;
use Modules\Category\Exceptions\CategoryCanNotBeParentItSelftException;
use Modules\Category\Exceptions\SafeUpdateException;
use Nht\Hocs\Core\BaseRepository;

class DbCategoryRepository extends BaseRepository implements CategoryRepository
{
	protected $model;

	protected $childRecursive;

	public function __construct(Category $model, DBM $db) {
		$this->model    = $model;
		$this->db       = $db;
	}

	/**
	 * Lấy ra tất cả các danh mục có trạng thái được Active
	 * @param  boolean $list   default: false
	 * @param  array   $conditions[] Mảng điều kiện
	 * @return array
	 */
	public function getAllCategories($filter = array(), $sort = array(), array $with = array(), $sortable = true)
	{
		// Sort
		$defaultSort = empty($sort) ? ['created_at' => 'ASC'] : array();
		$sort = array_merge($defaultSort, $sort);

		$data = $this->model->whereRaw(1);

		// With relationship
		foreach($with as $relation) {
			$data->with($relation);
		}

		$name = array_get($filter, 'name');
		$active = array_get($filter, 'active', 'all');
		$type = array_get($filter, 'type');
		$parentId = array_get($filter, 'parent_id');

		if($active != 'all') {
			$data->where('active', $active);
		}

		if($name) {
			$data->where('name', 'LIKE', '%' . clean($name) . '%');
		}

		if(!is_null($type)) {
			$type = (array) $type;
			$data->whereIn('type', $type);
		}

		if(!is_null($parentId)) {
			$data->where('parent_id', $parentId);
		}

		foreach($sort as $k => $v) {
			$data->orderBy($k, $v);
		}

		$_data = $data->get();

		// Sortable
		if($sortable === true) {
			$sortable = new \Nht\Hocs\Sortable\Sortable($_data);
			return $sortable->getData();
		}

		return $_data;
	}

	/**
     * Get categories which sorted
     * @param  array  $filter
     * @param  array  $sort
     * @param  array  $with
     * @return \Illuminate\Support\Collection
     */
	public function getSortedCategories($filter = array(), $sort = array(), array $with = array()) {
		return $this->getAllCategories($filter, $sort, $with, true);
	}


	/**
	 * Lấy ra danh mục theo slug
	 * @param  [type] $slug [description]
	 * @return [type]       [description]
	 */
	public function getCategoryBySlug($slug, $exception = true) {
		$category = $this->model->where('slug', $slug)->where('active', Category::ACTIVE)->first();
		if(!$category && $exception) {
			throw new \Illuminate\Database\Eloquent\ModelNotFoundException("Category not found");
		}

		return $category;
	}

	/**
	 * Toggle active status
	 *
	 * @param  Categories $categories
	 *
	 * @return Categories
	 */

	public function toggleActiveStatus(Category $category) {
		$category->active = !$category->active;
		return $category->save();
	}

	public function getChildsById($id, $take = 20) {
		return $this->model->where('parent_id', $id)
							->orderBy('updated_at', 'DESC')
							->take($take)
							->get();
	}


	public function safeUpdate(array $data, $id, Collection $categories) {
		// Lấy tất cả các con, cháu, chắt, chút, chít... của nó
		$childIds = $this->getChildRecursive($id, $categories)->keys()->toArray();

		// Nếu id cha mà trong list id con thì ko cho update
		$parentId = (int) array_get($data, 'parent_id');

		// Không thể chọn nó làm cha của chính nó
		if($parentId == $id) {
			throw new CategoryCanNotBeParentItSelftException("It can't be parent of it self", 1);
		}

		// Con nó không thể làm cha của nó
		if(in_array($parentId, $childIds)) {
			throw new SafeUpdateException("Child of category can't be the parent of category", 1);
		}

		return parent::update($data, ['id' => $id]);
	}


	public function getChildRecursive($parentId, Collection $categories) {
		$this->childRecursive = new Collection;
		$this->_getChildRecursive($parentId, $categories);
		return $this->childRecursive;
	}


	/**
	 *  Đệ quy tim các con của một danh mục
	 * @param  integer     $parentId
	 * @param  \Illuminate\Support\Collection $categories
	 * @return \Illuminate\Support\Collection
	 */
	private function _getChildRecursive($parentId, Collection $categories) {
		foreach($categories as $category) {
            if($category->parent_id == $parentId) {
                $this->childRecursive->put($category->getId(), $category);
                $this->_getChildRecursive($category->getId(), $categories);
            }
        }
	}

}