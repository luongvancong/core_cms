<?php

namespace Nht\Hocs\Brands;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model {

	protected $guarded = ['id'];

	const STATUS_ACTIVATE   = 1;
	const STATUS_DEACTIVATE = 0;

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function getUrl() {
		return ;
	}

	public function getSlug()
	{
		return $this->slug ? $this->slug : removeTitle($this->getName());
	}

	public function getTotalProducts()
	{
		return (int) $this->total_products;
	}

	public function jsonPresenter()
	{
		return new JsonPresenter($this);
	}

	public function htmlPresenter()
	{
		return new HtmlPresenter($this);
	}
}