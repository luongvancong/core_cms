<?php namespace Nht\Hocs\Sites;

interface SiteCreatorListener {
	public function creationSuccess(Site $site);
	public function creationFailed();
}