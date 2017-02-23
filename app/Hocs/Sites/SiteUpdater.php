<?php namespace Nht\Hocs\Sites;

use App;

class SiteUpdater {

	protected $site;

	protected $upload;

	public function __construct(SiteRepository $site) {
		$this->site = $site;
		$this->upload = App::make('Upload');
	}

	public function updateSite(SiteUpdaterListener $listener, Site $site, array $data)
	{
		$site->name = array_get($data, 'name', $site->getName());

		if(\Input::hasFile('logo')) {
			$filename = $this->upload->upload('logo', PATH_UPLOAD_IMAGE_SITE);
		}

		if(isset($filename)) {
			$site->logo = $filename;
		}

		$site->alias      = array_get($data, 'alias');
		$site->slug      = array_get($data, 'slug');
		$site->parent_id = array_get($data, 'parent_id');
		$site->address   = array_get($data, 'address');
		$site->phone     = array_get($data, 'phone');
		$site->fax       = array_get($data, 'fax');
		$site->latitude  = array_get($data, 'latitude');
		$site->longitude = array_get($data, 'longitude');

		if($site->save()) {
			return $listener->updationSuccess($site);
		}

		return $listener->updationFailed();
	}

}