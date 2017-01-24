<?php

namespace Nht\Hocs\Pages;

interface PageDeleterListener {
	public function deletionSuccess(Page $page);
	public function deletionFailed();
}