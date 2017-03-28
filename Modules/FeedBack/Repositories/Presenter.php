<?php

namespace Modules\FeedBack\Repositories;

class Presenter {

    /**
     * @var \Modules\FeedBack\Repositories\Feedback
     */
    protected $model;

    public function __construct(Feedback $model)
    {
        $this->model = $model;
    }

    public function getAvatar($type = '')
    {
        return parse_image_url($type . $this->model->getAvatar());
    }
}