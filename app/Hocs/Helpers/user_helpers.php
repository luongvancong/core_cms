<?php

if ( ! function_exists('userRepository') ) {
    function userRepository() {
        return App::make('App\Hocs\Users\UserRepository');
    }
}