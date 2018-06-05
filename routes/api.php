<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//APP基本信息
Route::get('/app/setting', 'Client\AppController@setting')->name('app.setting');
Route::get('/app/about', 'Client\AppController@about')->name('app.about');
Route::get('/app/banner', 'Client\AppController@banner')->name('app.banner');

//用户认证相关
Route::post('/customer/login', 'Client\AuthController@login')->name('customer.login');
Route::post('/customer/register', 'Client\AuthController@register')->name('customer.register');

Route::group(['namespace' => 'Client', 'middleware' => ['auth:api','throttle:60,1']], function () {

	#客户资料相关
	Route::get('/customer/profile', 'AuthController@profile')->name('customer.profile');
	Route::post('/customer/certification', 'AuthController@saveCertification')->name('customer.savecertification');
	Route::get('/customer/certification', 'AuthController@getCertification')->name('customer.getcertification');

	#课堂
	Route::get('/cms/category', 		'CmsController@listCategory')->name('cms.category');
	Route::get('/cms/postbycategory', 	'CmsController@listPost')->name('cms.postbycategory');
	Route::get('/cms/postbyid', 		'CmsController@viewPost')->name('cms.postbyid');

	#推荐
	Route::get('/auth/invite', 		'AuthController@invite')->name('auth.invite');

	#联盟
	Route::get('/union/members', 	'UnionController@listMember')->name('union.members');
	Route::get('/union/today', 		'UnionController@todayStat')->name('union.today');



});