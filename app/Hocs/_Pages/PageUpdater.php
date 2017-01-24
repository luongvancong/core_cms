<?php

namespace Nht\Hocs\Pages;

use Xss, App, Config, Input;
use Request;

class PageUpdater {

	public function __construct(PageRepository $page) {
		$this->page = $page;
		$this->image = App::make('ImageFactory');
		$configImage = Config::get('image');
		$this->configThumbs = $configImage['array_resize_image'];
	}

	public function updatePage(PageUpdaterListener $listener, Page $page, array $data) {
		$page->pag_title       = Xss::clean(array_get($data, 'pag_title'));
		$page->pag_slug        = clean(array_get($data, 'pag_slug'));
		$page->pag_content     = array_get($data, 'pag_content');
		$page->pag_position    = (int) array_get($data, 'pag_position');
		$page->image_alt       = clean(array_get($data, 'image_alt'));
		$page->pag_type        = (int) array_get($data, 'pag_type');
		$page->pag_active      = Page::PAGE_ACTIVE;
		$page->pag_update_time = time();
		$page->meta_title       = clean(array_get($data, 'meta_title'));
		$page->meta_keyword     = clean(array_get($data, 'meta_keyword'));
		$page->meta_description = clean(array_get($data, 'meta_description'));

		if(Request::hasFile('pag_image')) {
			$resultUpload = $this->image->upload('pag_image', PATH_UPLOAD_IMAGE_PAGE, $this->configThumbs, 'resize');
			if($resultUpload['status'] > 0) {
				$page->pag_image = $resultUpload['filename'];
			}
		}

		if($page->save()) {
			return $listener->updationSuccess($page);
		}

		return $listener->updationFailed();
	}

	public function toggleStatus(PageUpdaterListener $listener, Page $page) {
		$page->pag_active = !$page->pag_active;
		if($page->save()) {
			return $listener->toggleStatusSuccess($page);
		}

		return $listener->toggleStatusFailed();
	}
}