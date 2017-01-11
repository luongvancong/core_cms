<?php

namespace Nht\Http\Controllers\Frontend\Page;

use Illuminate\Http\Request;
use Nht\Hocs\Pages\PageRepository;
use Nht\Http\Controllers\FrontendController;

class PageController extends FrontendController
{
    public function __construct(PageRepository $page)
    {
        parent::__construct();
        $this->page = $page;
    }

    public function getDetail($slug, Request $request)
    {
        $page = $this->page->getBySlug($slug);

        return view('frontend/page/detail', compact('page'));
    }
}