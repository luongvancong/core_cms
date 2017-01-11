<?php

namespace Modules\Category\Repositories;

class Presenter {
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function getType()
    {
        $options = category_get_type_options();
        return array_key_exists($this->model->getType(), $options) ? $options[$this->model->getType()] : "--";
    }

    public function getUrl()
    {
        return ;
    }
}