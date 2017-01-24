<?php

namespace Modules\Page\Repositories;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

	protected $primaryKey = 'id';
	protected $table      = "pages";

	const PAGE_ACTIVE   = 1;
	const PAGE_DEACTIVE = 0;

	public function getId() {
		return $this->id;
	}

	public function getTitle() {
		return $this->title;
	}

	public function getSlug() {
		return $this->slug ? $this->slug : removeTitle($this->getTitle());
	}

	public function getUrl() {
		return route('page.detail', [$this->getId(), $this->getSlug()]);
	}

	public function getTeaser() {
		return $this->teaser;
	}

	public function getActive()
	{
		return $this->active;
	}


	public function getContent() {
		return $this->content;
	}

	public function hasImage()
	{
		return $this->image ? true : false;
	}

	public function getImage($type = 'sm_') {
		return parse_image_url($type . $this->image);
	}

	public function getImageAlt()
	{
		return $this->image_alt;
	}

	public function getMetaTitle()
	{
		return $this->meta_title;
	}

	public function getMetaKeyword()
	{
		return $this->meta_keyword;
	}

	public function getMetaDescription()
	{
		return $this->meta_description;
	}
}