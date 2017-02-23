<?php namespace Nht\Hocs\Sites;

interface SiteUpdaterListener {
	public function updationSuccess(Site $site);
	public function updationFailed();
}