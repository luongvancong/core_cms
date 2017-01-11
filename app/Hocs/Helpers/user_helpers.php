<?php

if ( ! function_exists('userRepository') ) {
    function userRepository() {
        return App::make('Nht\Hocs\Users\UserRepository');
    }
}