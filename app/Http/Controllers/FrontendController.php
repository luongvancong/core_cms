<?php

namespace Nht\Http\Controllers;

use App;
use Auth, Cookie;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Collection;
use Nht\Hocs\Advertise\AdsGenerate;
use Nht\Hocs\Tags\Tag;

class FrontendController extends BaseController
{
    use DispatchesJobs, ValidatesRequests, AdsGenerate;

    public function __construct() {
        $userLogged = Auth::user();
        view()->share('GLB_Login', $userLogged);

        $this->loggedUser = $userLogged;

        $categories = categoryRepository()->getAllCategories(['active' => 1, 'type' => [0,1]], ['sort' => 'ASC']);
        view()->share('GLB_Categories', $categories);

        $this->categories = $categories;

        $categoriesLevel1 = new Collection();
        foreach($categories as $cat) {
            if($cat->parent_id == 0) {
                $categoriesLevel1->push($cat);
            }
        }

        view()->share("GLB_Categories_Level1", $categoriesLevel1);
    }

}
