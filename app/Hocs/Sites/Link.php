<?php

namespace Nht\Hocs\Sites;

use Illuminate\Database\Eloquent\Model;
use Xss;

class Link extends Model {
    protected $table = 'site_links';
    public $timestamps = false;

    public function getId() {
        return $this->id;
    }

    public function getLink()
    {
        return $this->link;
    }


    public function setLink($link)
    {
        $this->link = Xss::clean($link);
        return $this;
    }

    public function getMaxPage()
    {
        return $this->max_page;
    }

    public function setMaxPage($page)
    {
        $this->max_page = (int) $page;
        return $this;
    }


    public function isTablet()
    {
        return $this->is_tablet ? true : false;
    }

    public function isLaptop()
    {
        return $this->is_laptop ? true : false;
    }

    public function isPhone()
    {
        return $this->is_phone ? true : false;
    }

    public function getXpathLink()
    {
        return $this->xpath_detail_url;
    }

    public function getXpathPrice()
    {
        return $this->xpath_price;
    }

    public function getXpathName()
    {
        return $this->xpath_name;
    }

    public function getXpathId()
    {
        return $this->xpath_id;
    }

    public function getBrandId()
    {
        return $this->brand_id;
    }


    public function getHeader()
    {
        return $this->header;
    }

    public function getCookies()
    {
        return $this->cookies;
    }

    public function getFormData()
    {
        return $this->form_data;
    }

    public function getParamPage()
    {
        return $this->param_page;
    }

    public function getJsonKey()
    {
        return $this->json_key;
    }

    public function getResponseType()
    {
        return $this->response_type;
    }

    public function getStepPage()
    {
        return $this->step_page;
    }

    public function getRequestMethod()
    {
        return $this->request_method;
    }

    public function presenter()
    {
        return new LinkPresenter($this);
    }


    public function brands()
    {
        return $this->belongsTo('Nht\Hocs\Brands\Brand', 'brand_id');
    }


    public function xpath()
    {
        return $this->belongsTo('Nht\Hocs\Sites\Meta', 'xpath_id');
    }

}
