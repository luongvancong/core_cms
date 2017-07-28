<?php
namespace App\Hocs\Core\Metadata;

trait MetadataTrait {

	public function __construct() {
		$this->metadata   = \App::make('App\Hocs\Core\Metadata\Metadata');
		$this->domain     = \App::make('App\Hocs\Sites\SiteRepository');
		//Category Youdo
		$this->categories = \App::make('App\Hocs\SiteResources\SiteResourceRepository');

		view()->share('setting', $this->metadata);
		view()->share('categories', $this->categories->getCategoryHaveDomailCurrent($this->domain->getDomaiByServerName()));
	}

}