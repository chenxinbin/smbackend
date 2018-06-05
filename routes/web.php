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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/backend', 'DashboardController@index')->name('backend');
Route::get('/backend/cms/', 'CmsController@index')->name('backend.cms.index');
Route::any('/backend/cms/add', 'CmsController@add')->name('backend.cms.add');
Route::any('/backend/cms/edit/{post_id}', 'CmsController@edit')->name('backend.cms.edit');

Route::get('/backend/cms/category', 'CmsController@category')->name('backend.cms.category');
Route::any('/backend/cms/category_add', 'CmsController@category_add')->name('backend.cms.category_add');
Route::any('/backend/cms/category_edit/{category_id}', 'CmsController@category_edit')->name('backend.cms.category_edit');

Route::any('/backend/upload/ueditor', 'UploadController@UEditor')->name('backend.upload.ueditor');


Route::get('/frontend', 'FrontendController@index')->name('frontend');
Route::get('/frontend/category-{category_id}/', 'FrontendController@index')->name('frontend.category');
Route::get('/frontend/{post_id}.html', 'FrontendController@view')->name('frontend.view');
