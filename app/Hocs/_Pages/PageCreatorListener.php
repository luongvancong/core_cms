<?php

namespace Nht\Hocs\Pages;

interface PageCreatorListener {
	public function creationSuccess(Page $page);
	public function creationFailed();
}