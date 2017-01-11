<?php

namespace Nht\Hocs\Products;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public $timestamp = false;
    protected $guarded = array('id');

    // Sản phẩm thường
    const NORMAL = 0;

    // Sản phẩm thiết kế
    const DESIGN = 1;

    // Sản phẩm tư vấn
    const ADVISORY = 2;

    protected $PATH_STATIC = '/';
    // protected $PATH_STATIC = '/'

    public function getId()
    {
        return $this->id;
    }

    public function getImage($thumb = 'xlg_')
    {
        return $this->PATH_STATIC . 'uploads/products/' . $thumb . $this->image;
    }

    public function getImageAlt()
    {
        return $this->image_alt;
    }


    public function getKeyword()
    {
        return $this->keyword ? $this->keyword : $this->getName();
    }

    public function getArrayKeyword()
    {
        return explode(',', $this->keyword);
    }

    public function getIgnoreKeyword() {
        return $this->ignore_keyword;
    }

    public function getArrayIgnoreKeyword() {
        return explode(',', $this->getIgnoreKeyword());
    }

    public function getOriginalKeyword()
    {
        return $this->original_keyword;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getSlug()
    {
        return $this->slug ? $this->slug : removeTitle($this->getName());
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getPromotionPrice()
    {
        return $this->promotion_price;
    }

    public function getMinPrice()
    {
        return $this->min_price;
    }

    public function getAvgPrice()
    {
        return $this->avg_price;
    }

    public function getUrl()
    {
        switch ($this->getType()) {
            case self::NORMAL:
            case self::DESIGN:
            default:
                return route('product.detail', array(
                    $this->getId(),
                    $this->getSlug()
                ));

            case self::ADVISORY:
                return route('product.detail.advisory', array(
                    $this->getId(),
                    $this->getSlug()
                ));
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

    public function hasImage()
    {
        return $this->image ? true : false;
    }


    public function getContent()
    {
        return $this->content;
    }


    public function getShortDescription()
    {
        return $this->short_description;
    }


    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getSort()
    {
        return $this->sort;
    }

    public function getCustomerName()
    {
        return $this->customer_name;
    }

    public function hasImageHomePage()
    {
        return $this->image_homepage ? true : false;
    }

    public function getImageHomePage($type = 'sm_')
    {
        return PATH_IMAGE_PRODUCT . $type . $this->image_homepage;
    }

    public function getImageHomePageAlt()
    {
        return $this->image_homepage_alt;
    }

    public function presenter() {
        return new HtmlPresenter($this);
    }


    public function category()
    {
        return $this->belongsTo('Nht\Hocs\Categories\Category', 'category_id', 'id');
    }


    public function tags()
    {
        return $this->belongsToMany('Nht\Hocs\Tags\Tag', 'products_tags');
    }

    public function images()
    {
        return $this->hasMany('Nht\Hocs\Products\ProductImage', 'product_id');
    }

}

