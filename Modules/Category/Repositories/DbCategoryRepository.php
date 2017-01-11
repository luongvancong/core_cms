<?php

namespace Modules\Category\Repositories;

use Illuminate\Database\DatabaseManager as DBM;
use Illuminate\Support\Collection;
use Nht\Hocs\Core\BaseRepository;

class DbCategoryRepository extends BaseRepository implements CategoryRepository
{
	protected $model;

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
	public function getAllCategories($filter = array(), $sort = array())
	{
		$this->tempData = [];
		$this->data = new Collection();

		// Sort
		$defaultSort = empty($sort) ? ['created_at' => 'ASC'] : array();
		$sort = array_merge($defaultSort, $sort);

		$data = $this->model->whereRaw(1);

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
		$data = [];

		foreach($_data as $c) {
			if($c->parent_id == 0) {
				$data[0][$c->id] = $c->toArray();
			}

			foreach($_data as $cc) {
				if($c->id == $cc->parent_id) {
					$data[$c->id][$cc->id] = $cc->toArray();
				}
			}
		}


		$this->sort($data, 0);

		// Convert to collection
		foreach($this->tempData as $category) {
			$c = new Category();
			$c->forceFill($category);
			$this->data->push($c);
		}

		return $this->data;
	}


	/**
	 * Hàm đệ quy để lấy ra danh mục
	 * @param  [type]  $data   [description]
	 * @param  integer $parent [description]
	 * @param  boolean $list   [description]
	 * @return [type]          [description]
	 */
	public function sort($data, $parent = 0, $level = 0)
	{
		// Lặp qua mảng dữ liệu, đệ quy lần lượt để ghép cha và con lại gần nhau hơn
		if(array_key_exists($parent, $data)) {
			// Nếu nó có con, cháu, chắt thì tăng level lên
			$level ++;
			foreach ($data[$parent] as $key => $category) {
				if ($category['parent_id'] == $parent) {
					$category['level'] = $level;
					$this->tempData[] = $category;
					$this->sort($data, $category['id'], $level);
				}
			}
		}
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


	public function getOneChildThietKeByParentId($parentId) {
		return $this->model->where('parent_id', $parentId)->where('type', Category::DESIGN)->first();
	}


	public function getChildsById($id, $take = 20) {
		return $this->model->where('parent_id', $id)
							->orderBy('updated_at', 'DESC')
							->take($take)
							->get();
	}
}