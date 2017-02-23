<?php

namespace Modules\Post\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Modules\Post\Repositories\PostRepository;
use Nht\Http\Controllers\FrontendController;

class PostController extends FrontendController
{
    public function __construct(PostRepository $post)
    {
        parent::__construct();
        $this->post = $post;
    }

    public function getIndex(Request $request)
    {
        return view('post::frontend/index');
    }
}