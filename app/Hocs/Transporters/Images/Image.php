<?php

namespace Nht\Hocs\Transporters\Images;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {
    protected $table = 'transporter_images';

    protected $guarded = ['id'];

    public function getId() {
        return $this->id;
    }

    public function getImage() {
        return $this->image;
    }
}