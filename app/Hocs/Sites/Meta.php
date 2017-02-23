<?php

namespace Nht\Hocs\Sites;

use Illuminate\Database\Eloquent\Model;
use Xss;

class Meta extends Model {

    protected $table = 'site_metas';

    public $timestamps = false;

    public function getId() {
        return $this->id;
    }

    public function getSiteId() {
        return $this->site_id;
    }

    public function setSiteId($id) {
        $this->site_id = (int) $id;
    }

    public function getXpathName() {
        return $this->xpath_name;
    }

    public function setXpathName($name) {
        $this->xpath_name = Xss::clean($name);
    }

    public function getXpathPrice() {
        return $this->xpath_price;
    }

    public function setXpathPrice($price) {
        $this->xpath_price = Xss::clean($price);
    }

    public function getXpathLinkDetail() {
        return $this->xpath_link_detail;
    }

    public function setXpathLinkDetail($link) {
        $this->xpath_link_detail = Xss::clean($link);
    }

    public function isJson()
    {
        return $this->is_json ? true : false;
    }

    public function setJson($value)
    {
        $this->is_json = $value;
    }

    public function getJsonKey()
    {
        return $this->json_key;
    }

    public function setJsonKey($value)
    {
        $this->json_key = $value;
    }

    public function site() {
        return $this->belongsTo('Nht\Hocs\Sites\Site', 'site_id');
    }
}
