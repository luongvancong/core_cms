<?php

namespace Nht\Hocs\Sites;

use Illuminate\Database\Eloquent\Model;

class Site extends Model {

	protected $primaryKey = 'id';

	protected $PATH_STATIC = 'http://static.giaca.org/';

	public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getRank()
	{
		return format_number($this->alexa_rank_vn);
	}

	public function getTeaser()
	{
		return $this->sit_teaser;
	}

	public function getImage()
	{
		if($this->is_craw) {
			return PATH_STATIC . 'uploads/thumbs/big/' . $this->logo;
		}

		return PATH_IMAGE_SITE . $this->logo;
	}

	public function getHot()
	{
		return $this->hot;
	}

	public function getUpdatedAtStr()
	{
		return $this->updated_at;
	}

	public function getUrl()
	{
		return $this->url;
	}

	public function getUrlPath() {
		return route('shop.detail', [$this->getId()]);
	}

	public function getSlug()
	{
		return $this->slug;
	}

	public function getAlias()
	{
		return $this->alias;
	}

	public function getEnvTesting()
	{
		return $this->env_testing;
	}

	public function getEnvQuick()
	{
		return $this->env_quick;
	}

	public function getTotalLinks()
	{
		return $this->total_links;
	}

	public function getAddress()
	{
		return $this->address;
	}

	public function getFax()
	{
		return $this->fax;
	}

	public function getPhone()
	{
		return $this->phone;
	}

	public function getLatitude()
	{
		return $this->latitude;
	}

	public function getLongitude()
	{
		return $this->longitude;
	}

	public function links() {
		return $this->hasMany('Nht\Hocs\Sites\Link', 'site_id');
	}

	public function meta() {
		return $this->hasMany('Nht\Hocs\Sites\Meta', 'site_id');
	}

	public function cronjob()
	{
		return $this->hasMany('Nht\Hocs\Sites\Cronjob', 'site_id');
	}

	public function productXpath()
	{
		return $this->hasMany('Nht\Hocs\ProductXpaths\ProductXpath', 'site_id');
	}

	public function productLink()
	{
		return $this->hasMany('Nht\Hocs\ProductLinks\ProductLink', 'site_id');
	}

	public function products()
	{
		return $this->belongsToMany('Nht\Hocs\Products\Product', 'products_shops', 'shop_id', 'product_id');
	}

	public function branchs() {
		return $this->hasMany('Nht\Hocs\Sites\Site', 'parent_id');
	}

}
