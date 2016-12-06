<?php

function justin_admin_scripts() {
    wp_enqueue_script('simple-md', get_template_directory_uri() . '/js/simplemde-markdown-editor/dist/simplemde.min.js');
    wp_enqueue_style('simple-md', get_template_directory_uri() . '/js/simplemde-markdown-editor/dist/simplemde.min.css');
    wp_enqueue_script('admin_js', get_template_directory_uri() . '/admin/assets/js/main.js');
    wp_enqueue_style('admin_css', get_template_directory_uri() . '/admin/assets/css/admin.css');
}

function justin_remove_editor_from_post_type() {
    remove_post_type_support( 'post', 'editor' );
    remove_post_type_support( 'page', 'editor' );
}

function justin_add_meta_boxes($post_type, $post) {
    add_meta_box('markdown_editor', 'Description', 'justin_show_markdown_editor');
}

function justin_show_markdown_editor($post) {
    $content = get_post_meta($post->ID, '_post_content', true);
    echo '<textarea id="md-editor" name="_post_content">'. $content .'</textarea>';
}

function justin_admin_save_post($post_id) {
    $content = isset($_REQUEST['_post_content']) ? $_REQUEST['_post_content'] : "";
    if($content) {
        update_post_meta($post_id, '_post_content', $content);
    }
}