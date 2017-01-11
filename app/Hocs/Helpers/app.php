<?php

if( ! function_exists('parse_image_url') ) {
    /**
     * Lấy url của ảnh
     * @param  str $image
     * @return url
     */
    function parse_image_url($image) {
        $explode = explode('___', $image);
        if(isset($explode[1])) {
            return '/uploads/' . date('Y/m/d', $explode[1]) . '/' . $image;
        }
    }
}


if( ! function_exists('setting') ) {
    /**
     * Setting metadata
     * @return Nht\Hocs\Core\Metadata\Metadata
     */
    function setting() {
        return resolve('Setting');
    }
}