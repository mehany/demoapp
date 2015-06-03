<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('about', 'PagesController@about');
Route::get('contact', 'PagesController@contact');

Route::pattern('id', '[0-9]+');
Route::get('news/{id}', 'ArticlesController@show');
Route::get('video/{id}', 'VideoController@show');
Route::get('photo/{id}', 'PhotoController@show');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'], function() {
    Route::pattern('id', '[0-9]+');
    Route::pattern('id2', '[0-9]+');

    # Admin Dashboard
    Route::get('dashboard', 'DashboardController@index');

    # Language
    Route::get('language', 'LanguageController@index');
    Route::get('language/create', 'LanguageController@getCreate');
    Route::post('language/create', 'LanguageController@postCreate');
    Route::get('language/{id}/edit', 'LanguageController@getEdit');
    Route::post('language/{id}/edit', 'LanguageController@postEdit');
    Route::get('language/{id}/delete', 'LanguageController@getDelete');
    Route::post('language/{id}/delete', 'LanguageController@postDelete');
    Route::get('language/data', 'LanguageController@data');
    Route::get('language/reorder', 'LanguageController@getReorder');

    
    # Customers
    Route::get('customers', 'CustomerController@index');
    Route::get('customers/create', 'CustomerController@getCreate');
    Route::post('customers/create', 'CustomerController@postCreate');
    Route::get('customers/{id}/edit', 'CustomerController@getEdit');
    Route::post('customers/{id}/edit', 'CustomerController@postEdit');
    Route::get('customers/{id}/delete', 'CustomerController@getDelete');
    Route::post('customers/{id}/delete', 'CustomerController@postDelete');
    Route::get('customers/data', 'CustomerController@data');
    Route::get('customers/reorder', 'CustomerController@getReorder');
    
    
    # Tenders
    Route::get('tenders', 'TenderController@index');
    Route::get('tenders/create', 'TenderController@getCreate');
    Route::post('tenders/create', 'TenderController@postCreate');
    Route::get('tenders/{id}/edit', 'TenderController@getEdit');
    Route::post('tenders/{id}/edit', 'TenderController@postEdit');
    Route::get('tenders/{id}/delete', 'TenderController@getDelete');
    Route::post('tenders/{id}/delete', 'TenderController@postDelete');
    Route::get('tenders/data', 'TenderController@data');
    Route::get('tenders/reorder', 'TenderController@getReorder');
    
    # Missions
    Route::get('missions', 'MissionController@index');
    Route::get('missions/create', 'MissionController@getCreate');
    Route::post('missions/create', 'MissionController@postCreate');
    Route::get('missions/{id}/edit', 'MissionController@getEdit');
    Route::post('missions/{id}/edit', 'MissionController@postEdit');
    Route::get('missions/{id}/delete', 'MissionController@getDelete');
    Route::post('missions/{id}/delete', 'MissionController@postDelete');
    Route::get('missions/data', 'MissionController@data');
    Route::get('missions/reorder', 'MissionController@getReorder');
    
    
    # Expenses
    Route::get('expenses', 'ExpensesController@index');
    Route::get('expenses/create', 'ExpensesController@getCreate');
    Route::post('expenses/create', 'ExpensesController@postCreate');
    Route::get('expenses/{id}/edit', 'ExpensesController@getEdit');
    Route::post('expenses/{id}/edit', 'ExpensesController@postEdit');
    Route::get('expenses/{id}/delete', 'ExpensesController@getDelete');
    Route::post('expenses/{id}/delete', 'ExpensesController@postDelete');
    Route::get('expenses/data', 'ExpensesController@data');
    Route::get('expenses/reorder', 'ExpensesController@getReorder');
    
    # Expenses category
    Route::get('expensescategory', 'ExpenseCategoriesController@index');
    Route::get('expensescategory/create', 'ExpenseCategoriesController@getCreate');
    Route::post('expensescategory/create', 'ExpenseCategoriesController@postCreate');
    Route::get('expensescategory/{id}/edit', 'ExpenseCategoriesController@getEdit');
    Route::post('expensescategory/{id}/edit', 'ExpenseCategoriesController@postEdit');
    Route::get('expensescategory/{id}/delete', 'ExpenseCategoriesController@getDelete');
    Route::post('expensescategory/{id}/delete', 'ExpenseCategoriesController@postDelete');
    Route::get('expensescategory/data', 'ExpenseCategoriesController@data');
    Route::get('expensescategory/reorder', 'ExpenseCategoriesController@getReorder');
    
    
    # Expenses Sub category
    Route::get('expensessubcategory', 'ExpenseSubCategoriesController@index');
    Route::get('expensessubcategory/create', 'ExpenseSubCategoriesController@getCreate');
    Route::post('expensessubcategory/create', 'ExpenseSubCategoriesController@postCreate');
    Route::get('expensessubcategory/{id}/edit', 'ExpenseSubCategoriesController@getEdit');
    Route::post('expensessubcategory/{id}/edit', 'ExpenseSubCategoriesController@postEdit');
    Route::get('expensessubcategory/{id}/delete', 'ExpenseSubCategoriesController@getDelete');
    Route::post('expensessubcategory/{id}/delete', 'ExpenseSubCategoriesController@postDelete');
    Route::get('expensessubcategory/data', 'ExpenseSubCategoriesController@data');
    Route::get('expensessubcategory/reorder', 'ExpenseSubCategoriesController@getReorder');
    
    
    
    
    
    # News category
    Route::get('newscategory', 'ArticleCategoriesController@index');
    Route::get('newscategory/create', 'ArticleCategoriesController@getCreate');
    Route::post('newscategory/create', 'ArticleCategoriesController@postCreate');
    Route::get('newscategory/{id}/edit', 'ArticleCategoriesController@getEdit');
    Route::post('newscategory/{id}/edit', 'ArticleCategoriesController@postEdit');
    Route::get('newscategory/{id}/delete', 'ArticleCategoriesController@getDelete');
    Route::post('newscategory/{id}/delete', 'ArticleCategoriesController@postDelete');
    Route::get('newscategory/data', 'ArticleCategoriesController@data');
    Route::get('newscategory/reorder', 'ArticleCategoriesController@getReorder');

    # News
    Route::get('news', 'ArticlesController@index');
    Route::get('news/create', 'ArticlesController@getCreate');
    Route::post('news/create', 'ArticlesController@postCreate');
    Route::get('news/{id}/edit', 'ArticlesController@getEdit');
    Route::post('news/{id}/edit', 'ArticlesController@postEdit');
    Route::get('news/{id}/delete', 'ArticlesController@getDelete');
    Route::post('news/{id}/delete', 'ArticlesController@postDelete');
    Route::get('news/data', 'ArticlesController@data');
    Route::get('news/reorder', 'ArticlesController@getReorder');

    # Photo Album
    Route::get('photoalbum', 'PhotoAlbumController@index');
    Route::get('photoalbum/create', 'PhotoAlbumController@getCreate');
    Route::post('photoalbum/create', 'PhotoAlbumController@postCreate');
    Route::get('photoalbum/{id}/edit', 'PhotoAlbumController@getEdit');
    Route::post('photoalbum/{id}/edit', 'PhotoAlbumController@postEdit');
    Route::get('photoalbum/{id}/delete', 'PhotoAlbumController@getDelete');
    Route::post('photoalbum/{id}/delete', 'PhotoAlbumController@postDelete');
    Route::get('photoalbum/data', 'PhotoAlbumController@data');
    Route::get('photoalbum/reorder', 'PhotoAlbumController@getReorder');

    # Photo
    Route::get('photo', 'PhotoController@index');
    Route::get('photo/create', 'PhotoController@getCreate');
    Route::post('photo/create', 'PhotoController@postCreate');
    Route::get('photo/{id}/edit', 'PhotoController@getEdit');
    Route::post('photo/{id}/edit', 'PhotoController@postEdit');
    Route::get('photo/{id}/delete', 'PhotoController@getDelete');
    Route::post('photo/{id}/delete', 'PhotoController@postDelete');
    Route::get('photo/{id}/itemsforalbum', 'PhotoController@itemsForAlbum');
    Route::get('photo/{id}/{id2}/slider', 'PhotoController@getSlider');
    Route::get('photo/{id}/{id2}/albumcover', 'PhotoController@getAlbumCover');
    Route::get('photo/data/{id}', 'PhotoController@data');
    Route::get('photo/reorder', 'PhotoController@getReorder');

    # Video
    Route::get('videoalbum', 'VideoAlbumController@index');
    Route::get('videoalbum/create', 'VideoAlbumController@getCreate');
    Route::post('videoalbum/create', 'VideoAlbumController@postCreate');
    Route::get('videoalbum/{id}/edit', 'VideoAlbumController@getEdit');
    Route::post('videoalbum/{id}/edit', 'VideoAlbumController@postEdit');
    Route::get('videoalbum/{id}/delete', 'VideoAlbumController@getDelete');
    Route::post('videoalbum/{id}/delete', 'VideoAlbumController@postDelete');
    Route::get('videoalbum/data', 'VideoAlbumController@data');
    Route::get('video/reorder', 'VideoAlbumController@getReorder');

    # Video
    Route::get('video', 'VideoController@index');
    Route::get('video/create', 'VideoController@getCreate');
    Route::post('video/create', 'VideoController@postCreate');
    Route::get('video/{id}/edit', 'VideoController@getEdit');
    Route::post('video/{id}/edit', 'VideoController@postEdit');
    Route::get('video/{id}/delete', 'VideoController@getDelete');
    Route::post('video/{id}/delete', 'VideoController@postDelete');
    Route::get('video/{id}/itemsforalbum', 'VideoController@itemsForAlbum');
    Route::get('video/{id}/{id2}/albumcover', 'VideoController@getAlbumCover');
    Route::get('video/data/{id}', 'VideoController@data');
    Route::get('video/reorder', 'VideoController@getReorder');

    # Users
    Route::get('users/', 'UserController@index');
    Route::get('users/create', 'UserController@getCreate');
    Route::post('users/create', 'UserController@postCreate');
    Route::get('users/{id}/edit', 'UserController@getEdit');
    Route::post('users/{id}/edit', 'UserController@postEdit');
    Route::get('users/{id}/delete', 'UserController@getDelete');
    Route::post('users/{id}/delete', 'UserController@postDelete');
    Route::get('users/data', 'UserController@data');

});
