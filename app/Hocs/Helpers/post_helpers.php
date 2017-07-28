<?php

if ( ! function_exists('postRepository') ) {
    function postRepository() {
        return App::make('App\Hocs\Posts\PostRepository');
    }
}