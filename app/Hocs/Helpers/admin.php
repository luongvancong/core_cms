<?php


if(! function_exists('admin_sidebar')) {
    /**
     * Get admin sidebar
     * @return array
     */
    function admin_sidebar() {
        $sidebar = config('admin.nav');
        uasort($sidebar, function($a, $b) {
            return array_get($a, 'order') < array_get($b, 'order');
        });

        return $sidebar;
    }
}
