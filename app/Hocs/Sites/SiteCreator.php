<?php namespace Nht\Hocs\Sites;

class SiteCreator {

	public function __construct(SiteRepository $site) {
		$this->site = $site;
	}

	public function createSite(SiteCreatorListener $listener, array $data)
	{
		$site = $this->site->getInstance();

		$site->name      = array_get($data, 'name');
		$site->alias      = array_get($data, 'alias');
		$site->slug      = array_get($data, 'slug');
		$site->parent_id = array_get($data, 'parent_id');
		$site->address   = array_get($data, 'address');
		$site->phone     = array_get($data, 'phone');
		$site->fax       = array_get($data, 'fax');
		$site->latitude  = array_get($data, 'latitude');
		$site->longitude = array_get($data, 'longitude');

		if($site->save()) {
			return $listener->creationSuccess($site);
		}

		return $listener->creationFailed();
	}
}