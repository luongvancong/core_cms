<?php

require_once dirname(__FILE__) . '/functions.php';

// Js, css
add_action('admin_enqueue_scripts', 'justin_admin_scripts');

// Remove default editor
add_action('init', 'justin_remove_editor_from_post_type');

// Add metaboxes
add_action('add_meta_boxes', 'justin_add_meta_boxes', 10, 2);

// Save metaboxes
add_action('save_post', 'justin_admin_save_post', 10, 2);