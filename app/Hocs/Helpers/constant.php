<?php
$root = realpath(dirname(__FILE__) . '/../../../');

$app_path = $root . '/app/';

$public_path = $root . '/public/';

// Base path
define('BASE_PATH', realpath(rtrim($app_path, '/') . '/..') . '/');


define('PATH_STATIC', '/');
// define('PATH_STATIC', '/');

// Path assets
define('PATH_ASSETS', '/assets/');


// Path upload logo settings
define('LOGO_SETTING_PATH_UPLOAD', rtrim($public_path, '/') . '/uploads/settings/');
define('LOGO_SETTING', PATH_STATIC . 'uploads/settings/');

// Path upload user avatar
define('PATH_UPLOAD_USER_AVATAR', rtrim($public_path, '/') . '/uploads/users/');
define('PATH_USER_AVATAR', PATH_STATIC . 'uploads/users/');

// Category
define('PATH_UPLOAD_IMAGE_CATEGORY', rtrim($public_path, '/') . '/uploads/categories/');
define('PATH_IMAGE_CATEGORY', PATH_STATIC . 'uploads/categories/');

// Page
define('PATH_UPLOAD_IMAGE_PAGE', rtrim($public_path, '/') . '/uploads/pages/');
define('PATH_IMAGE_PAGE', PATH_STATIC . 'uploads/pages/');

// Banner
define('PATH_UPLOAD_BANNER', rtrim($public_path, '/') . '/uploads/banners/');
define('PATH_BANNER', PATH_STATIC . 'uploads/banners/');

define('PATH_UPLOAD', rtrim($public_path, '/') . '/uploads/');


define('PATH_UPLOAD_IMAGE_POST', rtrim($public_path, '/') . '/uploads/posts/');
define('PATH_IMAGE_POST', PATH_STATIC . 'uploads/posts/');

define('PATH_UPLOAD_IMAGE_SITE', rtrim($public_path, '/') . '/uploads/sites/');
define('PATH_IMAGE_SITE', PATH_STATIC . 'uploads/sites/');

// Upload image product
define('PATH_UPLOAD_IMAGE_PRODUCT', rtrim($public_path, '/') . '/uploads/products/');
define('PATH_IMAGE_PRODUCT', PATH_STATIC . 'uploads/products/');

// Upload image advertise
define('PATH_UPLOAD_IMAGE_ADVERTISE', rtrim($public_path, '/') . '/uploads/advertise/');
define('PATH_IMAGE_ADVERTISE', PATH_STATIC . 'uploads/advertise/');


// Position Advertise
define('TOP_PAGE', 1);
define('CENTER_PAGE_1', 2);
define('CENTER_PAGE_2', 3);
define('END_PAGE', 4);
// define('POSITION_ADS', [
// 	TOP_PAGE => 'Đầu trang',
// 	CENTER_PAGE_1 => 'Thân trang 1',
// 	CENTER_PAGE_2 => 'Thân trang 2',
// 	END_PAGE => 'Cuối trang'
// ]);
