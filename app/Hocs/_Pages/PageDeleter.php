<?php

namespace Nht\Hocs\Pages;

class PageDeleter {

	public function __construct(PageRepository $page) {
		$this->page = $page;
	}

	public function deletePage(PageDeleterListener $listener, Page $page) {
		if($page->delete()) {
			return $listener->deletionSuccess($page);
		}

		return $listener->deletionFailed();
	}
}