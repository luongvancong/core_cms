<?php

namespace Modules\Post\Repositories\Category;

class Presenter {
    public function __construct (PostCategory $model)
    {
        $this->model = $model;
    }

    public function getUrl()
    {
        return '';
    }
}