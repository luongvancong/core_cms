<?php namespace Nht\Hocs\Sites;

interface SiteDeleterListener {
	public function deletionSuccess(Site $site);
	public function deletionFailed();
}