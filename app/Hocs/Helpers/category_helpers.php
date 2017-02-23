<?php

if( !function_exists('getCategoriesHtmlSelectOption') ) {
    function getCategoriesHtmlSelectOption($categories, $selectedId = null, $args = array()) {
        $defaultArgs = [
            'id'    => 'category_id',
            'name'  => 'category_id',
            'class' => 'select-category-id form-control'
        ];

        $attrStr = mergeAttributes($defaultArgs, $args);

        $html = '<select '. makeAttributes($attrStr) .'>';
        $html .= '<option value="">Vui lòng chọn danh mục</option>';

        foreach($categories as $category) {
            $selected = '';
            $char = '';
            if($selectedId !== null &&  (int) $selectedId === (int) $category->getId()) {
                $selected = 'selected="selected"';
            }

            for($i = 1; $i < $category->level; $i ++) {
                $char .= '--';
            }

            $html .= '<option value="'. $category->getId() .'" '. $selected .'>'. $char . $category->getName() .'</option>';
        }

        $html .= '</select>';

        return $html;
    }
}


if( !function_exists('category_product_count') ) {
    function category_product_count(Nht\Hocs\Categories\Category $category) {
        return App::make('Nht\Hocs\Products\ProductRepository')->countProductsByCategory($category);
    }
}


if( !function_exists('categoryRepository') ) {
    function categoryRepository() {
        return App::make('Nht\Hocs\Categories\CategoryRepository');
    }
}


if( !function_exists('category_count_child_by_id') ) {
    function category_count_child_by_id($id, $categories) {
        $tempCountChilds = array();

        foreach($categories as $cat) {
            if($cat->parent_id == $id) {
                $tempCountChilds[] = $cat;
            }
        }

        return count($tempCountChilds);
    }
}


if( !function_exists('category_get_by_id_from_list') ) {
    function category_get_by_id_from_list($id, $categories) {
        foreach($categories as $cat) {
            if($id == $cat->getId()) {
                return $cat;
            }
        }
    }
}


if( !function_exists('category_getOneChildThietKeByParentId') ) {
    function category_getOneChildThietKeByParentId($parentId) {
        return categoryRepository()->getOneChildThietKeByParentId($parentId);
    }
}


if( ! function_exists('category_get_all_childs') ) {
    function category_get_all_childs($parentId, $categories) {
        $childs = array();
        foreach($categories as $category) {
            if($category->parent_id == $parentId) {
                $childs[] = $category->getId();
                _debug($parentId . '::' .$category->parent_id);
                category_get_all_childs($category->getId(), $categories);
            }
        }

        return $childs;
    }
}


if( ! function_exists('category_get_level_by_id') ) {
    function category_get_level_by_id($id, $categories) {
        foreach($categories as $category) {
            if($category->getId() == $id) {
                return $category->level;
            }
        }

        return 0;
    }
}


if( ! function_exists('category_get_root_parent_by_id') ) {
    function category_get_root_parent_by_id($id, $categories) {
        foreach($categories as $category) {
            if($category->getId() == $id) {
                if($category->getParentId() > 0) {
                    $id = category_get_root_parent_by_id($category->getParentId(), $categories);
                }
            }
        }

        return $id;
    }
}


if( ! function_exists('category_get_type_options') ) {
    function category_get_type_options() {
        return [
            Nht\Hocs\Categories\Category::NORMAL   => 'Nội thất chi tiết',
            Nht\Hocs\Categories\Category::DESIGN   => 'Thiết kế trọn bộ',
            Nht\Hocs\Categories\Category::ADVISORY => 'Tư vấn thiết kế'
        ];
    }
}