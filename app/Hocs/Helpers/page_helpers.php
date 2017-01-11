<?php

if( ! function_exists('page_get_all_types') ) {
    /**
     * Lấy tất cả các loại trang
     * @return array
     */
    function page_get_all_types() {
        return [
            Nht\Hocs\Pages\Page::PAGE_TYPE_NORMAL      => 'Trang tĩnh',
            Nht\Hocs\Pages\Page::PAGE_TYPE_SERVICE     => 'Dịch vụ',
            Nht\Hocs\Pages\Page::PAGE_TYPE_POLICY      => 'Chính sách',
            Nht\Hocs\Pages\Page::PAGE_TYPE_PRICE_BOARD => 'Bảng giá'
        ];
    }
}

if ( ! function_exists('page_type_to_text') ) {
    /**
     * Lấy loại trang dạng chữ
     * @param  int $type
     * @return str
     */
    function page_type_to_text($type)
    {
        $types = page_get_all_types();
        if(array_key_exists($type, $types)) {
            return $types[$type];
        }
    }
}

if ( ! function_exists('page_repository') ) {
    /**
     * Get page repository
     * @return PageRepository
     */
    function page_repository() {
        return App::make('Nht\Hocs\Pages\PageRepository');
    }
}

if ( ! function_exists('page_get_by_id') ) {
    /**
     * Page get by id
     * @param  int $id
     * @return Page
     */
    function page_get_by_id($id) {
        return page_repository()->getPageById($id);
    }
}

