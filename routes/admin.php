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
    });
});
