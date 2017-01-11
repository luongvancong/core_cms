<?php

namespace Nht\Hocs\Pages;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

	protected $primaryKey = 'pag_id';
	protected $table      = "pages";
	public $timestamps    = false;

	/**
	 * PAGE_SITE_TYPE = 1 Page cho trong chủ
	 *	PAGE_DOMAIN_TYPE = 2 Page cho các cửa hàng, hoặc chi nhánh
	 */
	const PAGE_SITE_TYPE 	= 1;
	const PAGE_DOMAIN_TYPE 	= 2;

	const PAGE_ACTIVE 	= 1;
	const PAGE_DEACTIVE 	= 0;

	const POSITION_MENU      = 1;
	const POSITION_FOOTER    = 2;
	const POSITION_OTHER     = 4;
	const POSITION_HOME_PAGE = 5;

	// Loại trang tĩnh
	const PAGE_TYPE_NORMAL   = 0;

	// Loại dịch vụ
	const PAGE_TYPE_SERVICE     = 1;

	// Loại chính sách
	const PAGE_TYPE_POLICY      = 2;

	// Loại bảng giá
	const PAGE_TYPE_PRICE_BOARD = 3;

	public function getId() {
		return $this->pag_id;
	}

	public function getTitle() {
		return $this->pag_title;
	}

	public function getSlug() {
		return $this->pag_slug ? $this->pag_slug : removeTitle($this->getTitle());
	}

	public function getUrl() {
		return route('page.detail', [$this->getId(), $this->getSlug()]);
	}

	public function getPublicDateFormat() {
		return date('H:i - d/m/Y', $this->pag_update_time);
	}

	public function getTeaser() {
		return $this->pag_teaser;
	}

	public function getType()
	{
		return $this->pag_type;
	}

	public function getContent() {
		return $this->pag_content;
	}

	public function hasImage()
	{
		return $this->pag_image ? true : false;
	}

	public function getImage($type = 'sm_') {
		if(is_file(PATH_UPLOAD_IMAGE_PAGE . $type . $this->pag_image)) {
			return PATH_IMAGE_PAGE . $type . $this->pag_image;
		}

		return '/assets/img/grey.gif';
	}

	public function getImageAlt()
	{
		return $this->image_alt;
	}

	public function getPositionText() {
		switch ($this->pag_position) {
			case self::POSITION_OTHER:
				return 'Khác';

			case self::POSITION_MENU:
				return 'Menu';

			case self::POSITION_FOOTER:
				return 'Footer';

			case self::POSITION_HOME_PAGE:
				return 'Trang chủ';
		}
	}

	public function getMetaTitle()
	{
		return $this->meta_title;
	}

	public function getMetaKeyword()
	{
		return $this->meta_keyword;
	}

	public function getMetaDescription()
	{
		return $this->meta_description;
	}
}