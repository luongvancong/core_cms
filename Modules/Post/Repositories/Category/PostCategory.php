<?php

namespace Modules\Post\Repositories\Category;

use Modules\Category\Repositories\Category;

class PostCategory extends Category {

    public function presenter() {
        return new Presenter($this);
    }
}