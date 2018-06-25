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
/**
 *后台路由设置
 */
Route::group(['prefix' => 'admin','namespace'=>'Admin'], function () {
    Route::any('login', 'LoginController@login');
    Route::get('code', 'LoginController@code');
});
Route::group(['prefix' => 'admin','namespace'=>'Admin','middleware'=>'admin.auth'], function () {
    Route::get('index', 'IndexController@index');
    Route::get('/', 'IndexController@index');
    Route::get('info', 'IndexController@info');
    Route::get('layout', 'IndexController@layout');
    Route::any('pass', 'IndexController@pass');
    Route::post('category/changeorder', 'CategoryController@changeorder');
    Route::resource('category', 'CategoryController');
    Route::post('article/changeorder', 'ArticleController@changeorder');
    Route::post('article/set_recom/{id}', 'ArticleController@set_recom');
    Route::get('article/recom', 'ArticleController@recom');
    Route::resource('article', 'ArticleController');
    Route::get('recom', 'IndexController@recom');
    Route::any('upload', 'BaseController@upload');
    Route::post('links/changeorder', 'LinksController@changeorder');
    Route::resource('links', 'LinksController');
    Route::post('navs/changeorder', 'NavsController@changeorder');
    Route::resource('navs', 'NavsController');
    Route::get('config/putfile', 'ConfigController@putFile');
    Route::post('config/changecontent', 'ConfigController@changeContent');
    Route::post('config/changeorder', 'ConfigController@changeOrder');
    Route::resource('config', 'ConfigController');
});

Route::group(['namespace'=>'Home'], function () {
    Route::get('/', 'IndexController@index');
    Route::get('/art/{id}', 'IndexController@artical');
    Route::get('/cat/{id}', 'IndexController@artical_list');
    Route::get('/link', 'IndexController@link');
    Route::get('/liuyan', 'IndexController@liuyan');
    Route::post('/search', 'IndexController@search');
    Route::get('/like', 'IndexController@like');
    Route::post('/ajax_article', 'IndexController@ajax_article');
    Route::post('/ajax_cat_article', 'IndexController@ajax_cat_article');
    Route::get('/tag/{tag}', 'IndexController@tag');
});
