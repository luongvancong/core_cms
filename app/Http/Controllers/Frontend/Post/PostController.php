<?php

namespace Nht\Http\Controllers\Frontend\Post;

use Illuminate\Http\Request;
use Nht\Hocs\Posts\PostRepository;
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
        # code...
    }
}