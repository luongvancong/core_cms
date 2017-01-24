<?php

namespace Nht\Hocs\Pages;

use App, Xss, Config, Input;

class PageCreator {
	public function __construct(PageRepository $page) {
		$this->page = $page;
		$this->image = App::make('ImageFactory');
		$configImage = Config::get('image');
		$this->configThumbs = $configImage['array_resize_image'];
	}

	public function createPage(PageCreatorListener $listener, array $data) {
		$page = $this->page->getInstance();
		$page->pag_title        = Xss::clean(array_get($data, 'pag_title'));
		$page->pag_slug         = clean(array_get($data, 'pag_slug'));
		$page->pag_content      = array_get($data, 'pag_content');
		$page->pag_position     = (int) array_get($data, 'pag_position');
		$page->pag_type         = (int) array_get($data, 'pag_type');
		$page->pag_active       = Page::PAGE_ACTIVE;
		$page->image_alt        = clean(array_get($data, 'image_alt'));
		$page->meta_title       = clean(array_get($data, 'meta_title'));
		$page->meta_keyword     = clean(array_get($data, 'meta_keyword'));
		$page->meta_description = clean(array_get($data, 'meta_description'));
		$page->pag_create_time = time();
		$page->pag_update_time = time();

		if(Input::hasFile('pag_image')) {
			$resultUpload = $this->image->upload('pag_image', PATH_UPLOAD_IMAGE_PAGE, $this->configThumbs, 'resize');
			if($resultUpload['status'] > 0) {
				$page->pag_image = $resultUpload['filename'];
			}
		}

		if($page->save()) {
			return $listener->creationSuccess($page);
		}

		return $listener->creationFailed();
	}
}