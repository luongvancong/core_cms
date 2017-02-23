<?php

namespace Nht\Http\Controllers\Frontend\Home;

use Illuminate\Http\Request;
use Nht\Http\Controllers\FrontendController;

class HomeController extends FrontendController
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('welcome');
    }
}
