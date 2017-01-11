<?php

namespace Nht\Hocs\Pages;

interface PageUpdaterListener {
	public function updationSuccess(Page $page);
	public function updationFailed();
	public function toggleStatusSuccess(Page $page);
	public function toggleStatusFailed();
}