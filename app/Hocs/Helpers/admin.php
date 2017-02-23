<?php


if(! function_exists('admin_sidebar')) {
    /**
     * Get admin sidebar
     * @return array
     */
    function admin_sidebar() {
        return config('admin.nav');
    }
}
