<?php

namespace Modules\Product\Repositories;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $table = 'products';

    protected $guarded = ['id', '_token'];

    public function getId()
    {
        return $this->id;
    }

    public function getImage()
    {
        return $this->image;
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

    public function presenter() {
        return new ProductPresenter($this);
    }


    public function category()
    {

    }

    public function tags()
    {
        return $this->belongsToMany('Modules\Tag\Repositories\Tag', 'products_tags');
    }

    public function images()
    {
        return $this->hasMany('Nht\Hocs\Products\ProductImage', 'product_id');
    }
}