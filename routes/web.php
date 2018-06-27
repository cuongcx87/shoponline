<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', 'Frontend\CategoryController@index');

Route::get('/loadgif', function(){
	return view('loadgif');
});

// Login with Facebook and Google
Route::get('login/facebook', 'Auth\LoginController@redirectToFacebook')->name('login.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookCallback');
Route::get('login/google', 'Auth\LoginController@redirectToGoogle')->name('login.google');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

Auth::routes();



Route::prefix('admin')->group(function () {
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'Backend\AdminController@index')->name('admin.dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@adminLogout')->name('admin.logout');
});



Route::middleware('admin')->namespace('Backend')->group(function () {
	// Category
	Route::prefix('admin/category')->group(function () {
		Route::get('/', 'CategoryController@index')->name('admin.category');
		Route::get('/show/{id}', 'CategoryController@show')->name('admin.category.show');
		Route::get('/create', 'CategoryController@create')->name('admin.category.create');
		Route::post('/create', 'CategoryController@store')->name('admin.category.store');
		Route::get('/edit/{id}', 'CategoryController@edit')->name('admin.category.edit');
		Route::post('/edit/{id}', 'CategoryController@update')->name('admin.category.update');
		Route::get('/delete/{id}', 'CategoryController@destroy')->name('admin.category.destroy');
	});

	// Company
	Route::prefix('admin/company')->group(function () {
		Route::get('/', 'CompanyController@index')->name('admin.company');
		Route::get('/show/{id}', 'CompanyController@show')->name('admin.company.show');
		Route::get('/create', 'CompanyController@create')->name('admin.company.create');
		Route::post('/create', 'CompanyController@store')->name('admin.company.store');
		Route::get('/edit/{id}', 'CompanyController@edit')->name('admin.company.edit');
		Route::post('/edit/{id}', 'CompanyController@update')->name('admin.company.update');
		Route::get('/delete/{id}', 'CompanyController@destroy')->name('admin.company.destroy');
	});

	// Product
	Route::prefix('admin/product')->group(function () {
		Route::get('/', 'ProductController@index')->name('admin.product');
		Route::get('/show/{id}', 'ProductController@show')->name('admin.product.show');
		Route::get('/create', 'ProductController@create')->name('admin.product.create');
		Route::post('/create', 'ProductController@store')->name('admin.product.store');
		Route::get('/edit/{id}', 'ProductController@edit')->name('admin.product.edit');
		Route::post('/edit/{id}', 'ProductController@update')->name('admin.product.update');
		Route::get('/delete/{id}', 'ProductController@destroy')->name('admin.product.destroy');
	});

	// ProductDetail
	Route::prefix('admin/product-detail')->group(function () {
		Route::get('/', 'ProductDetailController@index')->name('admin.productdetail');
		Route::get('/show/{id}', 'ProductDetailController@show')->name('admin.productdetail.show');
		Route::get('/{slug}/create', 'ProductDetailController@create')->name('admin.productdetail.create');
		Route::post('/{slug}/create', 'ProductDetailController@store')->name('admin.productdetail.store');
		Route::get('/edit/{id}', 'ProductDetailController@edit')->name('admin.productdetail.edit');
		Route::post('/edit/{id}', 'ProductDetailController@update')->name('admin.productdetail.update');
		Route::get('/delete/{id}', 'ProductDetailController@destroy')->name('admin.productdetail.destroy');
	});

	// Image
	Route::prefix('admin/image')->group(function () {
		Route::get('/', 'ImageController@index')->name('admin.image');
		Route::get('/show/{id}', 'ImageController@show')->name('admin.image.show');
		Route::get('/{slug}/create', 'ImageController@create')->name('admin.image.create');
		Route::post('/{slug}/create', 'ImageController@store')->name('admin.image.store');
		Route::get('/edit/{id}', 'ImageController@edit')->name('admin.image.edit');
		Route::post('/edit/{id}', 'ImageController@update')->name('admin.image.update');
		Route::get('/delete/{id}', 'ImageController@destroy')->name('admin.image.destroy');
	});

	// Comment
	Route::prefix('admin/comment')->group(function () {
		Route::get('/', 'CommentController@index')->name('admin.comment');
		Route::get('/show/{id}', 'CommentController@show')->name('admin.comment.show');
		Route::get('/create', 'CommentController@create')->name('admin.comment.create');
		Route::post('/create', 'CommentController@store')->name('admin.comment.store');
		Route::get('/edit/{id}', 'CommentController@edit')->name('admin.comment.edit');
		Route::post('/edit/{id}', 'CommentController@update')->name('admin.comment.update');
		Route::get('/delete/{id}', 'CommentController@destroy')->name('admin.comment.destroy');
	});

	// Coupon
	Route::prefix('admin/coupon')->group(function () {
		Route::get('/', 'CouponController@index')->name('admin.coupon');
		Route::get('/show/{id}', 'CouponController@show')->name('admin.coupon.show');
		Route::get('/create', 'CouponController@create')->name('admin.coupon.create');
		Route::post('/create', 'CouponController@store')->name('admin.coupon.store');
		Route::get('/edit/{id}', 'CouponController@edit')->name('admin.coupon.edit');
		Route::post('/edit/{id}', 'CouponController@update')->name('admin.coupon.update');
		Route::get('/delete/{id}', 'CouponController@destroy')->name('admin.coupon.destroy');
	});

	// Bill
	Route::prefix('admin/bill')->group(function () {
		Route::get('/', 'BillController@index')->name('admin.bill');
		Route::get('/show/{id}', 'BillController@show')->name('admin.bill.show');
		// Route::get('/create', 'BillController@create')->name('admin.bill.create');
		// Route::post('/create', 'BillController@store')->name('admin.bill.store');
		// Route::get('/edit/{id}', 'BillController@edit')->name('admin.bill.edit');
		// Route::post('/edit/{id}', 'BillController@update')->name('admin.bill.update');
		Route::get('/delete/{id}', 'BillController@destroy')->name('admin.bill.destroy');
	});

	// Order
	Route::prefix('admin/order')->group(function () {
		Route::get('/', 'OrderController@index')->name('admin.order');
		Route::get('/show/{id}', 'OrderController@show')->name('admin.order.show');
		// Route::get('/create', 'OrderController@create')->name('admin.order.create');
		// Route::post('/create', 'OrderController@store')->name('admin.order.store');
		Route::get('/edit/{id}', 'OrderController@edit')->name('admin.order.edit');
		Route::post('/edit/{id}', 'OrderController@update')->name('admin.order.update');
		Route::get('/delete/{id}', 'OrderController@destroy')->name('admin.order.destroy');
	});

	// Customer
	Route::prefix('admin/customer')->group(function () {
		Route::get('/', 'CustomerController@index')->name('admin.customer');
		Route::get('/show/{id}', 'CustomerController@show')->name('admin.customer.show');
		// Route::get('/create', 'CustomerController@create')->name('admin.customer.create');
		// Route::post('/create', 'CustomerController@store')->name('admin.customer.store');
		// Route::get('/edit/{id}', 'CustomerController@edit')->name('admin.customer.edit');
		// Route::post('/edit/{id}', 'CustomerController@update')->name('admin.customer.update');
		Route::get('/delete/{id}', 'CustomerController@destroy')->name('admin.customer.destroy');
	});

	// User
	Route::prefix('admin/user')->group(function () {
		Route::get('/', 'UserController@index')->name('admin.user');
		Route::get('/show/{id}', 'UserController@show')->name('admin.user.show');
		Route::get('/create', 'UserController@create')->name('admin.user.create');
		Route::post('/create', 'UserController@store')->name('admin.user.store');
		Route::get('/edit/{id}', 'UserController@edit')->name('admin.user.edit');
		Route::post('/edit/{id}', 'UserController@update')->name('admin.user.update');
		Route::get('/delete/{id}', 'UserController@destroy')->name('admin.user.destroy');
	});

	// Admin
	Route::prefix('admin/admin')->group(function () {
		Route::get('/', 'AdminController@index')->name('admin.admin');
		Route::get('/show/{id}', 'AdminController@show')->name('admin.admin.show');
		Route::get('/create', 'AdminController@create')->name('admin.admin.create');
		Route::post('/create', 'AdminController@store')->name('admin.admin.store');
		Route::get('/edit/{id}', 'AdminController@edit')->name('admin.admin.edit');
		Route::post('/edit/{id}', 'AdminController@update')->name('admin.admin.update');
		Route::get('/delete/{id}', 'AdminController@destroy')->name('admin.admin.destroy');
	});

	// Payment
	Route::prefix('admin/payment')->group(function () {
		Route::get('/', 'PaymentController@index')->name('admin.payment');
		Route::get('/show/{id}', 'PaymentController@show')->name('admin.payment.show');
		Route::get('/create', 'PaymentController@create')->name('admin.payment.create');
		Route::post('/create', 'PaymentController@store')->name('admin.payment.store');
		Route::get('/edit/{id}', 'PaymentController@edit')->name('admin.payment.edit');
		Route::post('/edit/{id}', 'PaymentController@update')->name('admin.payment.update');
		Route::get('/delete/{id}', 'PaymentController@destroy')->name('admin.payment.destroy');
	});

	// Province
	Route::prefix('admin/province')->group(function () {
		Route::get('/', 'ProvinceController@index')->name('admin.province');
		Route::get('/show/{id}', 'ProvinceController@show')->name('admin.province.show');
		Route::get('/create', 'ProvinceController@create')->name('admin.province.create');
		Route::post('/create', 'ProvinceController@store')->name('admin.province.store');
		Route::get('/edit/{id}', 'ProvinceController@edit')->name('admin.province.edit');
		Route::post('/edit/{id}', 'ProvinceController@update')->name('admin.province.update');
		Route::get('/delete/{id}', 'ProvinceController@destroy')->name('admin.province.destroy');
	});

	// District
	Route::prefix('admin/district')->group(function () {
		Route::get('/', 'DistrictController@index')->name('admin.district');
		Route::get('/show/{id}', 'DistrictController@show')->name('admin.district.show');
		Route::get('/create', 'DistrictController@create')->name('admin.district.create');
		Route::post('/create', 'DistrictController@store')->name('admin.district.store');
		Route::get('/edit/{id}', 'DistrictController@edit')->name('admin.district.edit');
		Route::post('/edit/{id}', 'DistrictController@update')->name('admin.district.update');
		Route::get('/delete/{id}', 'DistrictController@destroy')->name('admin.district.destroy');
	});

	// Ward
	Route::prefix('admin/ward')->group(function () {
		Route::get('/', 'WardController@index')->name('admin.ward');
		Route::get('/show/{id}', 'WardController@show')->name('admin.ward.show');
		Route::get('/create', 'WardController@create')->name('admin.ward.create');
		Route::post('/create', 'WardController@store')->name('admin.ward.store');
		Route::get('/edit/{id}', 'WardController@edit')->name('admin.ward.edit');
		Route::post('/edit/{id}', 'WardController@update')->name('admin.ward.update');
		Route::get('/delete/{id}', 'WardController@destroy')->name('admin.ward.destroy');
	});
});


// Frontend
Route::get('/', 'Frontend\CategoryController@index')->name('home');

Route::middleware('web')->namespace('Frontend')->group(function () {
	// Category
	Route::prefix('cate')->group(function () {
		// Route::get('/', 'CategoryController@index')->name('home');
		Route::get('/{category}', 'CategoryController@show')->name('category.show');
		Route::get('/{category}/page', 'CategoryController@pagePagination')->name('category.pagePagination');
		Route::get('/{category}/{company}', 'CategoryController@showCompany')->name('category.company.show');
		Route::get('/{category}/{company}/page', 'CategoryController@pageCompany')->name('category.company.page');
		
		Route::get('/{category}/price/p', 'CategoryController@showPriceAjax')->name('category.price.show_ajax');

		// Product
		Route::get('/{category}/{company}/{product}', 'ProductController@show')->name('product.show');
		// Comments
		Route::get('/{category}/{company}/{product}/pagi-comment', 'ProductController@loadPage')->name('product.commentPagination');
		Route::get('/{category}/{company}/{product}/form-comment', 'ProductController@createComment')->name('product.formcomment');
		Route::post('/{category}/{company}/{product}/post-comment', 'ProductController@storeComment')->name('product.storeComment');
	});

	// Comment Rating
	Route::prefix('comment')->group(function () {
		Route::get('/{product}/pagi-rating', 'CommentController@loadRatingPage')->name('product.ratingPagination');
		Route::get('/{product}/form-rating', 'CommentController@createRating')->name('product.formrating');
		Route::post('/{product}/post-rating', 'CommentController@storeRating')->name('product.storerating');
	});

	// ReplyComment
	Route::prefix('replycomment')->group(function () {
		Route::get('/loadpage-replycomment/{comment}', 'ReplyCommentController@showReplyComment')->name('replycomment.loadpage');
		Route::get('/loadpage-rating-replycomment/{comment}', 'ReplyCommentController@showRatingReplyComment')->name('rating.replycomment.loadpage');
		Route::get('/load-replycomment-count/{comment}', 'ReplyCommentController@loadRatingReplyCommentCount')->name('load.replycomment.count');
		Route::get('/{comment}/form-replycomment', 'ReplyCommentController@create')->name('replycomment.create');
		Route::post('/{comment}/post-replycomment', 'ReplyCommentController@store')->name('replycomment.store');
	});


	// Order
	Route::prefix('order')->group(function () {
		// Route::get('/gio-hang', 'OrderController@index')->name('gio-hang');
		Route::get('/show/{id}', 'OrderController@show')->name('order.show');
		Route::get('/gio-hang', 'OrderController@index')->name('cart');
		Route::get('/check-out', 'OrderController@create')->name('order.create');
		Route::post('/check-out', 'OrderController@store')->name('order.store');
		Route::get('/check-outed', 'OrderController@stored')->name('order.stored');
		Route::post('/select-address', 'OrderController@show_districts')->name('order.showdistrict');
		Route::get('/edit/{id}', 'OrderController@edit')->name('order.edit');
		Route::post('/edit/{id}', 'OrderController@update')->name('order.update');
		Route::get('/delete/{id}', 'OrderController@destroy')->name('order.destroy');
	});

	// Add to Cart
	Route::prefix('cart')->group(function () {
		
		// Route::get('/show/{id}', 'CartController@show')->name('cart.show');
		// Route::get('/create', 'CartController@create')->name('cart.create');
		// Route::post('/create', 'CartController@store')->name('cart.store');
		Route::get('/edit/{id}', 'CartController@edit')->name('cart.edit');
		// Route::post('/update/{id}', 'CartController@update')->name('cart.update');
		Route::post('/update/{id}', 'CartController@autoupdate')->name('cart.autoupdate');
		Route::get('/click_qty/{id}', 'CartController@click_qty')->name('cart.click_qty');
		Route::get('/remove/{id}', 'CartController@remove')->name('cart.romove');
		Route::get('/destroy', 'CartController@destroy')->name('cart.destroy');
	});

	// Coupon
	Route::prefix('coupon')->group(function () {
		Route::post('/checkcoupon', 'CouponController@checkcoupon')->name('coupon.checkcoupon');
		Route::get('/infoCart', 'CouponController@loadPage')->name('coupon.infoCart');
	});
	
	// User
	Route::prefix('user')->group(function () {
		Route::get('/', 'UserController@index')->name('admin.user');
		Route::get('/show/{id}', 'UserController@show')->name('user.show');
		Route::get('/create', 'UserController@create')->name('user.create');
		Route::post('/create', 'UserController@store')->name('user.store');
		Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
		Route::post('/edit/{id}', 'UserController@update')->name('user.update');
		Route::get('/delete/{id}', 'UserController@destroy')->name('user.destroy');
	});

	// Contact
	Route::prefix('contact')->group(function () {
		// Route::get('/', 'ContactController@index')->name('admin.user');
		// Route::get('/show/{id}', 'ContactController@show')->name('user.show');
		Route::get('/create', 'ContactController@create')->name('contact.create');
		Route::post('/create', 'ContactController@store')->name('contact.store');
		// Route::get('/edit/{id}', 'ContactController@edit')->name('user.edit');
		// Route::post('/edit/{id}', 'ContactController@update')->name('user.update');
		// Route::get('/delete/{id}', 'ContactController@destroy')->name('user.destroy');
	});
	// Searech products
	Route::prefix('tim-kiem')->group(function () {
		Route::get('/', 'SearchController@search')->name('search');
		// Route::get('/autocomplete','SearchController@autoComplete');  
		Route::get('/autocompleteajax','SearchController@autoCompleteAjax')->name('ajaxsearch');
	});
	
});