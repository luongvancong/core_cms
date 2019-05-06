<?php

namespace App\Hocs\Core;

/**
 * An abstract class for repository.
 *
 * @author	AlvinTran
 */
abstract class BaseRepository
{
    /**
     * @return \Illuminate\Database\Eloquent\Model
     */
    abstract public function getModel();

	/**
	 * Get all items of model
	 * @return \Illuminate\Support\Collection
	 */
	public function getAll()
	{
		return $this->getModel()->all();
	}

	/**
	 * Get item of model. If model not exist then it will throw an exception
	 * @param  int $id Model ID
	 * @return Model
	 */
	public function getById($id)
	{
		return $this->getModel()->findOrFail($id);
	}

	/**
	 * Get item of model
	 * @param  int $id Model ID
	 * @return Model
	 */
	public function find($id)
	{
		return $this->getModel()->find($id);
	}

	/**
	 * Get items with filter & paginate
	 * @param  array  $filter
	 * @param  integer $pageSize
	 * @return \Illuminate\Support\Collection
	 */
	public function getAllWithPaginate($filter = [], $pageSize = 20)
	{
		if ( ! empty($filter))
		{
			foreach ($filter as $key => $value)
			{
				if ($value == '')
				{
					unset($filter[$key]);
				}
			}
			return $this->getModel()->where($filter)->paginate($pageSize);
		}
		return $this->getModel()->paginate($pageSize);
	}

	/**
	 * Create a new model
	 * @param  array $attributes
	 * @return Bool
	 */
	public function create($attributes)
	{
		return $this->getModel()->create($attributes);
	}

	/**
	 * Update an exist model
	 * @param  array $attributes
	 * @param  array $condition
	 * @return Bool
	 */
	public function update($attributes, $condition = [])
	{
		if ( ! empty($condition))
		{
			return $this->getModel()->where($condition)->update($attributes);
		}
		return $this->getModel()->update($attributes);
	}

	/**
	 * Delete an exist model
	 * @return Bool
	 */
	public function delete($id)
	{
		$user = $this->getById($id);
		return $user->delete();
	}

	public function getInstance() {
	    $model = $this->getModel();
		return new $model;
	}

	public function count() {
		return $this->getModel()->count();
	}

	public function insert($data) {
		return $this->getModel()->insert($data);
	}

	public function _getByIds(array $ids) {
		return $this->getModel()->whereIn($this->getModel()->getKeyName(), $ids)->get();
	}

	public function countByIds(array $ids) {
		return $this->getModel()->whereIn($this->getModel()->getKeyName(), $ids)->count();
	}
}
