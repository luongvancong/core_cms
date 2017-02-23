<?php namespace Nht\Hocs\Sites;

class SiteDeleter {

	public function __construct(SiteRepository $site) {
		$this->site = $site;
	}

	public function deleteSite(SiteDeleterListener $listener, Site $site)
	{
		if($site->delete()) {
			return $listener->deletionSuccess($site);
		}

		return $listener->deletionFailed();
	}
}