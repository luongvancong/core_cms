<?php

namespace Modules\Post\Repositories;

use Modules\Post\Repositories\Post;
use Nht\Hocs\Core\BaseRepository;

/**
 * Class DbUserRepository.
 *
 * @author Justin
 */
class DbPostRepository extends BaseRepository implements PostRepository
{
	protected $model;

	public function __construct(Post $model)
	{
		$this->model = $model;
	}


	public function getRelatePosts($post, $take = 10) {

	}

	public function getPosts($perPage = 20, $filterArray = array(), array $sortArray = array(), $paginate = true) {
		$q     = array_get($filterArray, 'q');
		$title = array_get($filterArray, 'title');
		$status = array_get($filterArray, 'status');
		$categoryId = (array) array_get($filterArray, 'category_id');

		// Lọc những giá trị rỗng
		$categoryId = array_filter($categoryId, function($value) {
			return $value != "";
		});

		$query = $this->model->with('author', 'category')->orderBy('updated_at', 'DESC');

		if(empty($sortArray)) $sortArray = ['updated_at' => 'DESC'];

		if($q) {
			$query->where('title', 'LIKE', '%'. clean($q) .'%');
		}

		if($title) {
			$query->where('title', 'LIKE', '%'. clean($title) .'%');
		}

		if($categoryId) {
			$query->whereIn('category_id', $categoryId);
		}

		if(!is_null($status)) {
			$query->where('active', $status);
		}

		foreach($sortArray as $key => $value) {
			$query->orderBy($key, $value);
		}

		return $paginate ? $query->paginate($perPage) : $query->get();
	}


	public function getPostByCategoryId($categoryId, $take = 10) {
		return $this->model->where('category_id', $categoryId)
							->orderBy('updated_at', 'DESC')
							->take($take)
							->get();
	}


	public function countAllPosts() {
		return $this->model->count();
	}
}