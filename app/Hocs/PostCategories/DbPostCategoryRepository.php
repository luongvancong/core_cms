<?php namespace Nht\Hocs\PostCategories;

use Nht\Hocs\Core\BaseRepository;

use Illuminate\Support\Collection;

class DbPostCategoryRepository extends BaseRepository implements PostCategoryRepository{
	public function __construct(PostCategory $model) {
		$this->model = $model;
	}

	public function getCategories($perPage = 25, $filterArray = array()) {
		$name = array_get($filterArray, 'name');
		$query = $this->model->whereRaw(1);

		if($name) {
			$query->where('name', 'LIKE', '%'. $name .'%');
		}

		$query->orderBy('updated_at', 'DESC');

		return $query->paginate($perPage);
	}

	public function getAllCategories(array $filter = array(), array $sort = array()) {
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
			$c = new PostCategory;
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
}