<?php

namespace Modules\Product\Repositories\Image;

use Nht\Hocs\Core\BaseRepository;

class DbImageRepository extends BaseRepository implements ImageRepository {

    /**
     * Model
     * @var \Modules\Product\Repositories\Image\Image
     */
    protected $model;

    public function __construct(Image $model)
    {
        $this->model = $model;
    }
}