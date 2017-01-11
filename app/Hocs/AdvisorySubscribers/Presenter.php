<?php

namespace Nht\Hocs\AdvisorySubscribers;

class Presenter {
    public function __construct(AdvisorySubscriber $model)
    {
        $this->model = $model;
    }

    public function getCategory()
    {
        $category = $this->model->category()->first();
        return $category ? $category->getName() : '--';
    }
}