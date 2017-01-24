<?php

namespace Nht\Hocs\Posts;

class Presenter {
    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function getDate()
    {
        return date('d/m/Y', strtotime($this->model->updated_at));
    }

    public function getTime()
    {
        return date('H:i', strtotime($this->model->updated_at));
    }

    public function getAuthor()
    {
        return $this->model->author->getName();
    }
}