<?php

namespace Modules\Setting\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Model Setting
 * @author SaturnLai - daolvcntt@gmail.com
 */
class Setting extends Model
{
   /**
	* The database table used by the model.
	*
	* @var string
	*/
	public $timestamps 	= false;


	public function getLogo($type = 'md_')
	{
		return parse_image_url($type . $this->logo);
	}
}
