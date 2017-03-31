<?php

namespace Modules\Product\Repositories\Image;

use Nht\Hocs\Core\BaseRepository;

class DbProductImageRepository extends BaseRepository implements ImageRepository {

    /**
     * Model
     * @var \Modules\Product\Repositories\Image\ProductImage
     */
    protected $model;

    public function __construct(ProductImage $model)
    {
        $this->model = $model;
    }
}