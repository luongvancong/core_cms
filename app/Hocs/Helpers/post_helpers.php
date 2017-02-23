<?php

if ( ! function_exists('postRepository') ) {
    function postRepository() {
        return App::make('Nht\Hocs\Posts\PostRepository');
    }
}