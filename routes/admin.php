<?php

use Illuminate\Support\Facades\Route;

Route::group(['as' => 'admin.', 'prefix' => 'admin',  'namespace' => 'Admin'], function () {

    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login')->name('login.post');
    Route::post('logout', 'LoginController@logout')->name('logout');

    Route::group(['middleware' => ['auth:admin']], function (){
        Route::get('/', 'DashboardController@index')->name('dashboard');

        // Routes for Admin User
        Route::resource('/admin_users', 'AdminController');
        Route::post('/admin_users/active/{admin_user}', 'AdminController@active')->name('admin_users.active');
        Route::post('/admin_users/inactive/{admin_user}', 'AdminController@inactive')->name('admin_users.inactive');
        Route::DELETE('/admin_users-massDelete', 'AdminController@massDelete');

        // Routes for Roles
        Route::resource('/role', 'RoleController');
        Route::DELETE('/role-massDelete', 'RoleController@massDelete');

        // Routes for Permissions
        Route::resource('/permission', 'PermissionController');
        Route::DELETE('/permission-massDelete', 'PermissionController@massDelete');

        // Routes for Categories
        Route::resource('/category', 'CategoryController');
        Route::DELETE('/category-massDelete', 'CategoryController@massDelete');
        Route::post('/category/active/{category}', 'CategoryController@categoryActive')->name('category.active');
        Route::post('/category/inactive/{category}', 'CategoryController@categoryInactive')->name('category.inactive');

        // Routes for Sub-Category
        Route::resource('/sub-category', 'SubCategoryController');
        Route::DELETE('/sub-category-massDelete', 'SubCategoryController@massDelete');
        Route::post('/sub-category/active/{sub_category}', 'SubCategoryController@subcategoryActive')->name('subcategory.active');
        Route::post('/sub-category/inactive/{sub_category}', 'SubCategoryController@subcategoryInactive')->name('subcategory.inactive');

        // Routes for Child Sub-Category
        Route::resource('child-sub-category', 'ChildSubCategoryController');
        Route::DELETE('/child-sub-category-massDelete', 'ChildSubCategoryController@massDelete');
        Route::post('/child-sub-category/active/{child_sub_category}', 'ChildSubCategoryController@active')->name('childsubcategory.active');
        Route::post('/child-sub-category/inactive/{child_sub_category}', 'ChildSubCategoryController@inactive')->name('childsubcategory.inactive');

        // Routes for Brand
        Route::resource('/brand', 'BrandController');
        Route::DELETE('/brand-massDelete', 'BrandController@massDelete');
        Route::post('/brand/active/{brand}', 'BrandController@active')->name('brand.active');
        Route::post('/brand/inactive/{brand}', 'BrandController@inactive')->name('brand.inactive');

        // Routes for Supplier
        Route::resource('/supplier', 'SupplierController');
        Route::DELETE('/supplier-massDelete', 'SupplierController@massDelete');
        Route::post('/supplier/active/{supplier}', 'SupplierController@active')->name('supplier.active');
        Route::post('/supplier/inactive/{supplier}', 'SupplierController@inactive')->name('supplier.inactive');

        // Routes for Size
        Route::resource('/size', 'SizeController');
        Route::DELETE('/size-massDelete', 'SizeController@massDelete');

        // Route for Color
        Route::resource('/color', 'ColorController');
        Route::DELETE('/color-massDelete', 'ColorController@massDelete');

        // Route for Color
        Route::resource('/unit', 'UnitController');
        Route::DELETE('/unit-massDelete', 'UnitController@massDelete');

        // Routes for Currency
        Route::resource('/currency', 'CurrencyController');
        Route::DELETE('/currency-massDelete', 'CurrencyController@massDelete');
        Route::post('/currency/active/{currency}', 'CurrencyController@active')->name('currency.active');
        Route::post('/currency/inactive/{currency}', 'CurrencyController@inactive')->name('currency.inactive');

        // Routes for Coupon
        Route::resource('/coupon', 'CouponController');
        Route::DELETE('/coupon-massDelete', 'CouponController@massDelete');
        Route::post('/coupon/active/{coupon}', 'CouponController@active')->name('coupon.active');
        Route::post('/coupon/inactive/{coupon}', 'CouponController@inactive')->name('coupon.inactive');
    });
});
