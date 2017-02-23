<?php

if( ! function_exists('get_order_halt') ) {
    /**
     * Get a halt string
     * @return str
     */
    function get_order_halt() {
        return '{-0123456789-{}-abcdefghijklmnpqwrty-}';
    }
}

if( ! function_exists('get_order_break_halt') ) {
    /**
     * Get a break halt string
     * @return string
     */
    function get_order_break_halt() {
        return '{-break-}';
    }
}

if( ! function_exists('generate_order_code') ) {
    function generate_order_code($orderId, $time = null) {
        $halt = get_order_halt();

        if(!$time) $time = time();
        $year = date('Y', $time);
        $month = date('m', $time);
        $day = date('d', $time);

        $unique = strtoupper($orderId.uniqid($orderId));

        // return 'DH/'. $year .'/'.$month.'/'.$day.'/'. $unique;
        return $unique;
    }
}


if( ! function_exists('get_order_status_options') ) {
    function get_order_status_options() {
        return [
            0 => 'Chờ duyệt',
            1 => 'Thành công'
        ];
    }
}

if( ! function_exists('get_order_type_options') ) {
    function get_order_type_options() {
        return [
            1 => 'Một chiều',
            2 => 'Hai chiều'
        ];
    }
}