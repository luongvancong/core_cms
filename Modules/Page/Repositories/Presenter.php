<?php

namespace Modules\Page\Repositories;

class Presenter {

    public function __construct(Page $model)
    {
        $this->model = $model;
    }

    public function getPublicDateFormat() {
        return date('H:i - d/m/Y', strtotime($this->model->getCreatedAt()));
    }

    public function getUrl() {
        return route('page.detail', [$this->model->getId(), $this->model->getSlug()]);
    }
}