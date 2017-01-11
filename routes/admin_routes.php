<?php
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {

	/**
	 * Admin auth page
	 */
	Route::get('login', [
		'as' => 'admin.login',
		'uses' => 'AuthController@login'
	]);

	Route::post('login', [
		'as' => 'admin.doLogin',
		'uses' => 'AuthController@authenticate'
	]);

	Route::get('logout', [
		'as' => 'admin.logout',
		'uses' => 'AuthController@logout'
	]);

	Route::group(['middleware' => ['admin', 'acl']], function() {
		/**
		 * Dashboard
		 */
		Route::get('dashboard', [
			'as'          => 'dashboard',
			'uses'        => 'AuthController@dashboard',
			'permissions' => 'dashboard.view'
		]);

		/**
		 * Users module
		 */
		Route::group(['prefix' => 'users'], function() {
			Route::get('/', [
				'as' => 'user.index',
				'uses' => 'UserController@index',
				'permissions' => 'user.view',
			]);

			Route::get('create', [
				'as' => 'user.create',
				'uses' => 'UserController@create',
				'permissions' => 'user.create',
			]);

			Route::post('/', [
				'as' => 'user.store',
				'uses' => 'UserController@store',
				'permissions' => 'user.store',
			]);

			Route::get('{users}/edit', [
				'as' => 'user.edit',
				'uses' => 'UserController@edit',
				'permissions' => 'user.edit',
			]);

			Route::post('{user}/edit', [
				'as' => 'user.update',
				'uses' => 'UserController@update',
				'permissions' => 'user.update',
			]);

			Route::get('{user}/delete', [
				'as' => 'user.destroy',
				'uses' => 'UserController@destroy',
				'permissions' => 'user.destroy',
			]);
		});

		/**
		 * Roles module
		 */
		Route::group(['prefix' => 'roles'], function() {
			Route::get('/', [
				'as'          => 'role.index',
				'uses'        => 'RoleController@index',
				'permissions' => 'role.view',
			]);

			Route::get('create', [
				'as'          => 'role.create',
				'uses'        => 'RoleController@create',
				'permissions' => 'role.create',
			]);

			Route::post('/', [
				'as'          => 'role.store',
				'uses'        => 'RoleController@store',
				'permissions' => 'role.store',
			]);

			Route::get('{role}/edit', [
				'as'          => 'role.edit',
				'uses'        => 'RoleController@edit',
				'permissions' => 'role.edit',
			]);

			Route::post('{role}/edit', [
				'as'          => 'role.update',
				'uses'        => 'RoleController@update',
				'permissions' => 'role.update',
			]);

			Route::get('{role}/delete', [
				'as'          => 'role.destroy',
				'uses'        => 'RoleController@destroy',
				'permissions' => 'role.destroy',
			]);
		});

		/**
		 * Permissions module
		 */
		Route::group(['prefix' => 'permissions'], function() {
			Route::get('/', [
				'as'          => 'permission.index',
				'uses'        => 'PermissionController@index',
				'permissions' => 'permission.view',
			]);

			Route::get('create', [
				'as'          => 'permission.create',
				'uses'        => 'PermissionController@create',
				'permissions' => 'permission.create',
			]);

			Route::post('/', [
				'as'          => 'permission.store',
				'uses'        => 'PermissionController@store',
				'permissions' => 'permission.store',
			]);

			Route::get('{permission}/edit', [
				'as'          => 'permission.edit',
				'uses'        => 'PermissionController@edit',
				'permissions' => 'permission.edit',
			]);

			Route::post('{permission}/edit', [
				'as'          => 'permission.update',
				'uses'        => 'PermissionController@update',
				'permissions' => 'permission.update',
			]);

			Route::get('{permission}/delete', [
				'as'          => 'permission.destroy',
				'uses'        => 'PermissionController@destroy',
				'permissions' => 'permission.destroy',
			]);
		});

		/**
		 * Settings Moduler
		 */
		Route::group(['prefix' => 'settings'], function() {
			Route::get('website', [
				'as'          => 'website.edit',
				'uses'        => 'SettingController@edit',
				'permissions' => 'setting.view',
			]);

			Route::post('website', [
				'as'          => 'website.update',
				'uses'        => 'SettingController@update',
				'permissions' => 'setting.edit',
			]);

			Route::get('metadata', [
				'as'   => 'metadata.show',
				'uses' => 'SettingController@metadata',
				'permissions' => 'setting.view',
			]);

			Route::post('metadata', [
				'as'   => 'metadata.post.edit',
				'uses' => 'SettingController@postMetadata',
				'permissions' => 'setting.edit',
			]);

			Route::get('social', [
				'as'   => 'social.show',
				'uses' => 'SettingController@social',
				'permissions' => 'setting.view',
			]);

			Route::post('social', [
				'as'   => 'social.post.edit',
				'uses' => 'SettingController@postSocial',
				'permissions' => 'setting.edit',
			]);
		});


		// Route::group(['prefix' => 'categories'], function() {
		// 	Route::get('/', ['as' => 'admin.category.index', 'permissions' => 'category.view' ,'uses' => 'CategoryController@index']);

		// 	Route::get('/create', ['as' => 'admin.category.create', 'uses' => 'CategoryController@create']);
		// 	Route::post('/create', 'CategoryController@store');

		// 	Route::get('/{id}/edit', ['as' => 'admin.category.edit', 'uses' => 'CategoryController@edit']);
		// 	Route::post('/{id}/edit', 'CategoryController@update');

		// 	Route::get('/{id}/delete', ['as' => 'admin.category.delete', 'uses' => 'CategoryController@destroy']);

		// 	Route::get('/{id}/active', ['as' => 'admin.category.toggleActive', 'uses' => 'CategoryController@toggleActive']);

		// 	// Xử lý ajax editable - bootstrap editable
		// 	Route::post('/ajax/editable', ['as' => 'admin.category.ajax.editable', 'uses' => 'CategoryController@ajaxEditAble']);

		// });

		// QUAN LY THIET KE
		Route::group(['prefix' => 'advisory-design'], function() {
			Route::group(['prefix' => 'categories'], function() {
				Route::get('/', ['as' => 'admin.advisory_design.categories', 'uses' => 'AdvisoryDesignController@categories']);
				Route::get('/create', ['as' => 'admin.advisory_design.categories.create', 'uses' => 'AdvisoryDesignController@createCategory']);
				Route::post('/create', 'AdvisoryDesignController@storeCategory');

				Route::get('/{id}/edit', ['as' => 'admin.advisory_design.categories.edit', 'uses' => 'AdvisoryDesignController@editCategory']);
				Route::post('/{id}/edit', 'AdvisoryDesignController@updateCategory');

				Route::get('/{id}/destroy', ['as' => 'admin.advisory_design.categories.destroy', 'uses' => 'AdvisoryDesignController@destroyCategory']);

				Route::get('/{id}/toggleActive', ['as' => 'admin.advisory_design.categories.toggleActive', 'uses' => 'AdvisoryDesignController@toggleActiveCategory']);
			});

			Route::get('/products', ['as' => 'admin.advisory_design.products', 'uses' => 'AdvisoryDesignController@products']);
		});

		/**
		 * Products Moduler
		 */

		Route::group(['prefix' => 'products'], function() {
			Route::get('/', [
				'as'          => 'admin.product.index',
				'uses'        => 'ProductController@index',
				'permissions' => 'product.view'
        	]);

        	Route::get('/create',  [
				'as'          => 'admin.product.create',
				'uses'        => 'ProductController@create',
				'permissions' => 'product.create'
			]);

			Route::post('/create', [
				'as'          => 'admin.product.store',
				'uses'        =>'ProductController@store',
				'permissions' => 'product.create'
			]);

        	Route::get('{id}/edit',  [
				'as'          => 'admin.product.edit',
				'uses'        => 'ProductController@edit',
				'permissions' => 'product.edit'
			]);

			Route::post('{id}/edit', [
				'as'          => 'admin.product.update',
				'uses'        => 'ProductController@update',
				'permissions' => 'product.edit'
			]);

			Route::get('{id}/delete', [
				'as'          => 'admin.product.destroy',
				'uses'        => 'ProductController@destroy',
				'permissions' => 'product.delete'
			]);

			Route::get("/{id}/toggleActive", ['as' => 'admin.product.toggleActive', 'permissions' => 'product.edit', 'uses' => 'ProductController@toggleActive']);

			// Tích chọn sp hot nhất
			Route::get('/{id}/toggleHot', ['as' => 'admin.product.hot', 'permissions' => 'product.edit' ,'uses' => 'ProductController@toggleHot']);

			// Tích chọn sp mới nhất
			Route::get('/{id}/toggleNewest', ['as' => 'admin.product.newest', 'permissions' => 'product.edit' ,'uses' => 'ProductController@toggleNewest']);

			Route::get('/{id}/toggleBanner', ['as' => 'admin.product.is_banner', 'permissions' => 'product.edit' ,'uses' => 'ProductController@toggleBanner']);

			// Editable
			Route::post('/ajax/editable', ['as' => 'admin.product.editable', 'permissions' => 'product.edit' ,'uses' => 'ProductController@ajaxEditable']);

			// Change avatar
			Route::post('/changeAvatar', ['as' => 'admin.product.changeAvatar', 'permissions' => 'product.edit' ,'uses' => 'ProductController@changeAvatar']);

			// Tags autocomplete
			Route::get('autocomplete', ['as' => 'admin.product.tagAutoComplete', 'permissions' => 'product.edit' ,'uses' => 'ProductController@autocomplete']);

			Route::get('/{productId}/tags', ['as' => 'admin.product.tag.index', 'permissions' => 'product.edit' ,'uses' => 'ProductController@tagIndex']);
			Route::get('/{productId}/tags/{tagId}/delete', ['as' => 'admin.product.tag.delete', 'permissions' => 'product.edit' ,'uses' => 'ProductController@tagDelete']);

			Route::get('/{productId}/tags/create', ['as' => 'admin.product.tag.create', 'permissions' => 'product.edit' ,'uses' => 'ProductController@tagCreate']);
			Route::post('/{productId}/tags/create', ['permissions' => 'product.edit', 'uses' => 'ProductController@tagCreateStore']);

			// Quick edit từ khóa
			Route::post('/ajax-change-all-keyword', ['as' => 'admin.product.ajax.editAllKeyword', 'uses' => 'ProductController@ajaxQuickEditAllKeyword']);

			// Quick delete items
			Route::post('/ajax/quick-delete-multiple', ['as' => 'admin.products.deleteMulti', 'uses' => 'ProductController@ajaxQuickDeleteMultiple']);

			// Ảnh sản phẩm
			Route::group(['prefix' => '{productId}/images'], function() {
				Route::get('/', ['as' => 'admin.product.images', 'uses' => 'ProductController@images']);
				Route::get('/create', ['as' => 'admin.product.images.create', 'uses' => 'ProductController@createImage']);
				Route::post('/create', 'ProductController@storeImage');
				Route::get('/{id}/destroy', ['as' => 'admin.product.images.destroy', 'uses' => 'ProductController@destroyImage']);

				// Ajax editable
				Route::post('/ajax/editable', ['as' => 'admin.product.images.editable', 'uses' => 'ProductController@imagesAjaxEditAble']);

				// Quick delete items
				Route::post('/ajax/quick-delete-multiple', ['as' => 'admin.products.images.deleteMulti', 'uses' => 'ProductController@ajaxImageQuickDeleteMultiple']);
			});
		});


		// Posts
		// Route::group(['prefix' => 'post'], function() {
		// 	Route::get('/index', ['as' => 'admin.post.index', 'permissions' => 'post.view' ,'uses' => 'PostController@getIndex']);

		// 	Route::get('/create', ['as' => 'admin.post.create', 'permissions' => 'post.create' ,'uses' => 'PostController@getCreate']);
		// 	Route::post('/create', ['permissions' => 'post.create', 'uses' => 'PostController@postCreate']);

		// 	Route::get('/{postId}/edit', ['as' => 'admin.post.edit', 'permissions' => 'post.view' ,'uses' => 'PostController@getEdit']);
		// 	Route::post('/{postId}/edit', ['permissions' => 'post.edit', 'uses' => 'PostController@postEdit']);

		// 	Route::get('/{postId}/active', ['as' => 'admin.post.active', 'PostController@getActive']);

		// 	Route::get('/{postId}/delete', ['as' => 'admin.post.delete', 'permissions' => 'post.delete' ,'uses' => 'PostController@getDelete']);

		// 	Route::get('/{postId}/tag', ['as' => 'admin.post.tag.index', 'permissions' => 'post.edit' ,'uses' => 'PostController@tagIndex']);

		// 	Route::get('/{postId}/tag/create', ['as' => 'admin.post.tag.create', 'permissions' => 'post.edit' ,'uses' => 'PostController@tagCreate']);
		// 	Route::post('/{postId}/tag/create', ['permissions' => 'post.edit', 'uses' => 'PostController@tagCreateStore']);

		// 	Route::get('/{postId}/tag/{tagId}/delete', ['as' => 'admin.post.tag.delete', 'permissions' => 'post.edit' ,'uses' => 'PostController@tagDelete']);
		// });

		// Post Categories
		// Route::group(['prefix' => 'post-category'], function() {
		// 	Route::get('/index', ['as' => 'admin.post_category.index', 'permissions' => 'post_category.view' ,'uses' => 'PostCategoryController@getIndex']);
		// 	Route::get('/create', ['as' => 'admin.post_category.create', 'permissions' => 'post_category.view' ,'uses' => 'PostCategoryController@getCreate']);
		// 	Route::post('/create', ['permissions' => 'post_category.create', 'uses' => 'PostCategoryController@postCreate']);

		// 	Route::get('/{id}/edit', ['as' => 'admin.post_category.edit', 'permissions' => 'post_category.view' ,'uses' => 'PostCategoryController@getEdit']);
		// 	Route::post('/{id}/edit', ['permissions' => 'post_category.edit', 'uses' => 'PostCategoryController@postEdit']);

		// 	Route::get('/{id}/delete', ['as' => 'admin.post_category.delete', 'permissions' => 'post_category.delete' ,'uses' => 'PostCategoryController@getDelete']);
		// });


		// Banners
		Route::group(['prefix' => 'banners'], function() {

			Route::get('/', [
				'as'          => 'admin.banner.index',
				'uses'        => 'BannerController@index',
				'permissions' => 'banner.view'
			]);

			Route::get('/create',  [
				'as'          => 'admin.banner.create',
				'uses'        => 'BannerController@create',
				'permissions' => 'banner.create'
			]);

			Route::post('/create', [
				'as'          => 'admin.banner.store',
				'uses'        =>'BannerController@store',
				'permissions' => 'banner.create'
			]);

			Route::get('{id}/edit',  [
				'as'          => 'admin.banner.edit',
				'uses'        => 'BannerController@edit',
				'permissions' => 'banner.edit'
			]);

			Route::post('{id}/edit', [
				'as'          => 'admin.banner.update',
				'uses'        =>'BannerController@update',
				'permissions' => 'banner.edit'
			]);

			Route::get('{id}/active', [
				'as'          => 'admin.banner.active',
				'uses'        => 'BannerController@active',
				'permissions' => 'banner.edit'
			]);

			Route::get('{id}/delete', [
				'as'          => 'admin.banner.destroy',
				'uses'        => 'BannerController@destroy',
				'permissions' => 'banner.destroy'
			]);


			// Ajax editable
			Route::post('/ajax/editable', ['as' => 'admin.banner.ajax.editable', 'uses' => 'BannerController@ajaxEditAble']);
		});



		// Tags
		Route::group(['prefix' => 'tag'], function() {
			Route::get('/index', ['as' => 'admin.tag.index', 'permissions' => 'tag.view' ,'uses' => 'TagController@index']);
			Route::get('/create', ['as' => 'admin.tag.create', 'permissions' => 'tag.create' ,'uses' => 'TagController@create']);
			Route::post('/create', ['permissions' => 'tag.create', 'uses' => 'TagController@store']);
			Route::get('/{id}/edit', ['as' => 'admin.tag.edit', 'permissions' => 'tag.edit' ,'uses' => 'TagController@edit']);
			Route::post('/{id}/edit', ['permissions' => 'tag.edit', 'uses' => 'TagController@update']);
			Route::get('/{id}/delete', ['as' => 'admin.tag.delete', 'permissions' => 'tag.delete' ,'uses' => 'TagController@destroy']);

			Route::get('/ajaxSearchTag', ['as' => 'admin.tag.ajax.search', 'permissions' => 'tag.edit' ,'uses' => 'TagController@ajaxTag']);
		});


		// Page
		Route::group(['prefix' => 'page'], function() {
			Route::get('/', ['as' => 'admin.page.index', 'permissions' => 'page.view', 'uses' => 'PageController@getIndex']);
			// Page Create
			Route::get('/create', ['as' => 'admin.page.create', 'permissions' => 'page.create', 'uses' => 'PageController@getCreate']);
			Route::post('/create', ['permissions' => 'page.create', 'uses' => 'PageController@postCreate']);
			// Page edit
			Route::get('/{id}/edit', ['as' => 'admin.page.edit', 'permissions' => 'page.edit', 'uses' => 'PageController@getEdit']);
			Route::post('/{id}/edit', ['permissions' => 'page.edit', 'uses' => 'PageController@postEdit']);
			// Page delete
			Route::get('/{id}/delete', ['as' => 'admin.page.delete', 'permissions' => 'page.delete', 'uses' => 'PageController@getDelete']);

			// Page active
			Route::get('/{id}/active', ['as' => 'admin.page.active', 'permissions' => 'page.active', 'uses' => 'PageController@getActive']);
		});


		// Car
		Route::group(['prefix' => 'car'], function() {
			Route::get('/index', ['as' => 'admin.car.index', 'permissions' => 'car.view', 'uses' => 'CarController@getIndex']);

			Route::get('/create', ['as' => 'admin.car.create', 'permissions' => 'car.create', 'uses' => 'CarController@getCreate']);
			Route::post('/create', 'CarController@postCreate');

			Route::get('/{id}/edit', ['as' => 'admin.car.edit', 'permissions' => 'car.edit', 'uses' => 'CarController@getEdit']);
			Route::post('/{id}/edit', 'CarController@postEdit');

			Route::get('/{id}/delete', ['as' => 'admin.car.delete', 'permissions' => 'car.delete', 'uses' => 'CarController@getDelete']);

			Route::get('/{id}/position-seat', ['as' => 'admin.car.position_seat.index', 'permissions' => 'car.edit', 'uses' => 'CarController@getPositionSeat']);
			Route::post('/{id}/position-seat', ['as' => 'admin.car.position_seat.update', 'permissions' => 'car.edit', 'uses' => 'CarController@postPositionSeat']);
		});


		// Transporters
		Route::group(['prefix' => 'transporter'], function() {
			Route::get('/index', ['as' => 'admin.transporter.index', 'permissions' => 'transporter.view', 'uses' => 'TransporterController@getIndex']);

			Route::get('/create', ['as' => 'admin.transporter.create', 'permissions' => 'transporter.create', 'uses' => 'TransporterController@getCreate']);
			Route::post('/create', 'TransporterController@postCreate');

			Route::get('/{id}/edit', ['as' => 'admin.transporter.edit', 'permissions' => 'transporter.edit', 'uses' => 'TransporterController@getEdit']);
			Route::post('/{id}/edit', 'TransporterController@postEdit');

			Route::get('/{id}/delete', ['as' => 'admin.transporter.delete', 'permissions' => 'transporter.delete', 'uses' => 'TransporterController@getDelete']);

			Route::get('/{id}/active', ['as' => 'admin.transporter.active', 'permissions' => 'transporter.active', 'uses' => 'TransporterController@getActive']);

			// Images
			Route::get('/{id}/images', ['as' => 'admin.transporter.images', 'permissions' => 'transporter.edit', 'uses' => 'TransporterController@getImages']);
			Route::get('/{id}/images/create', ['as' => 'admin.transporter.images.create', 'permissions' => 'transporter.edit', 'uses' => 'TransporterController@getCreateImages']);
			Route::post('/{id}/images/create', 'TransporterController@postCreateImages');
			Route::get('{id}/images/{imgId}/delete', ['as' => 'admin.transporter.images.delete', 'permissions' => 'transporter.edit', 'uses' => 'TransporterController@deleteImage']);

			// Address
			Route::get('/{id}/address', ['as' => 'admin.transporter.address', 'permissions' => 'transporter.edit', 'uses' => 'TransporterAddressController@getIndex']);
			Route::get('/{id}/address/create', ['as' => 'admin.transporter.address.create', 'permissions' => 'transporter.edit', 'uses' => 'TransporterAddressController@getCreate']);
			Route::post('/{id}/address/create', 'TransporterAddressController@postCreate');

			Route::get('/{id}/address/{addrId}/edit', ['as' => 'admin.transporter.address.edit', 'permissions' => 'transporter.edit', 'uses' => 'TransporterAddressController@getEdit']);
			Route::post('/{id}/address/{addrId}/edit', 'TransporterAddressController@postEdit');

			Route::get('/{id}/address/delete', ['as' => 'admin.transporter.address.delete', 'permissions' => 'transporter.delete', 'uses' => 'TransporterAddressController@getDelete']);
		});


		// Trip
		Route::group(['prefix' => 'trip'], function() {
			Route::get('/index', ['as' => 'admin.trip.index', 'permissions' => 'trip.view', 'uses' => 'TripController@getIndex']);
			Route::get('/create', ['as' => 'admin.trip.create', 'permissions' => 'trip.create', 'uses' => 'TripController@getCreate']);
			Route::post('/create', 'TripController@postCreate');

			Route::get('/{id}/edit', ['as' => 'admin.trip.edit', 'permissions' => 'trip.edit', 'uses' => 'TripController@getEdit']);
			Route::post('/{id}/edit', 'TripController@postEdit');

			Route::get('/{id}/active', ['as' => 'admin.trip.active', 'permissions' => 'trip.active', 'uses' => 'TripController@getActive']);

			Route::get('/{id}/delete', ['as' => 'admin.trip.delete', 'permissions' => 'trip.delete', 'uses' => 'TripController@getDelete']);

			// Schedule
			Route::get('/{id}/schedule', ['as' => 'admin.trip.schedule', 'permissions' => 'trip.schedule', 'uses' => 'TripScheduleController@getIndex']);
			Route::get('/{id}/schedule/create', ['as' => 'admin.trip.schedule.create', 'permissions' => 'trip.schedule.create', 'uses' => 'TripScheduleController@getCreate']);
			Route::post('/{id}/schedule/create', 'TripScheduleController@postCreate');
			Route::get('/{id}/schedule/{sId}/edit', ['as' => 'admin.trip.schedule.edit', 'permissions' => 'trip.schedule.edit', 'uses' => 'TripScheduleController@getEdit']);
			Route::post('/{id}/schedule/{sId}/edit', 'TripScheduleController@postEdit');
			Route::get('/{id}/schedule/{sid}/delete', ['as' => 'admin.trip.schedule.delete', 'permissions' => 'trip.schedule.delete', 'uses' => 'TripScheduleController@getDelete']);

			// Images
			Route::get('/{id}/images', ['as' => 'admin.trip.images', 'permissions' => 'trip.images', 'uses' => 'TripImageController@getIndex']);
			Route::get('/{id}/images/create', ['as' => 'admin.trip.images.create', 'permissions' => 'trip.images.create', 'uses' => 'TripImageController@getCreate']);
			Route::post('/{id}/images/create', 'TripImageController@postCreate');
			Route::get('/{id}/images/{imgId}/edit', ['as' => 'admin.trip.images.edit', 'permissions' => 'trip.images.edit', 'uses' => 'TripImageController@getEdit']);
			Route::post('/{id}/images/{imgId}/edit', 'TripImageController@postEdit');
			Route::get('/{id}/images/{imgId}/delete', ['as' => 'admin.trip.images.delete', 'permissions' => 'trip.images.delete', 'uses' => 'TripImageController@getDelete']);
		});

		// Trip order
		Route::group(['prefix' => 'trip-order'], function() {
			Route::get('/index', ['as' => 'admin.tripOrder.index', 'permissions' => 'tripOrder.view', 'uses' => 'TripOrderController@getIndex']);
			Route::get('/{id}/detail', ['as' => 'admin.tripOrder.detail', 'permissions' => 'tripOrder.view', 'uses' => 'TripOrderController@getDetail']);
		});

	});
});
