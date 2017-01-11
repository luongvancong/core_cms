<?php namespace Nht\Hocs\Sites;

use Illuminate\Database\Eloquent\Model;

/**
 * Model Cronjob
 */
class Cronjob extends Model
{

    protected $table = "site_cronjob";

    public function sites()
    {
        return $this->belongToMany('Nht\Hocs\Sites\Site', 'id');
    }

}
