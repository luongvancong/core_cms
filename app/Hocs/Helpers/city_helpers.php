<?php

if( ! function_exists('city_get_city_options') ) {
    /**
     * Get city options
     * @return array
     */
    function city_get_city_options () {
        $cities = DB::table('cities')->where('cit_parent', 0)->get();
        $data = [];
        foreach($cities as $city) {
            $data[$city->cit_id] = $city->cit_name;
        }

        return $data;
    }
}