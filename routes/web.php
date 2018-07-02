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



Auth::routes();

Route::get('/', 'HomeController@index');

Route::post('/preregister','HomeController@preregister');

Route::get('request-access','HomeController@requestaccessview')->name('request-access');
Route::post('requestaccess','HomeController@requestaccess')->name('requestaccess');

Route::get('/refer-member','HomeController@refermemberview');
Route::get('/refer-member/{user}','HomeController@refermemberview')->name('refer-member');

Route::post('/refermember','HomeController@refermember');

Route::get('/apply-membership/{code}','HomeController@applymembershipview')->name('apply-membership');
Route::post('/applymembership','HomeController@applymembership');

Route::get('/follow-me/{link}','HomeController@Referral');

Route::group(['prefix'=>'member','namespace'=>'member'],function(){
	Route::get('/','HomeController@index');
	Route::get('dashboard','HomeController@index')->name('member.dashboard');
	Route::get('faq','HomeController@faqview')->name('member.faq');

	Route::get('profile','HomeController@profileview')->name('member.profile');
	Route::post('edit-profile','EditProfileController@editapplicantinfo')->name('member.edit-profile');

	Route::get('refer-member','ReferController@refermemberview')->name('member.refer-member-view');
	Route::post('refer-member','ReferController@refermember')->name('member.refer-member');

	Route::get('dealroom','DealRoomController@dealroomview')->name('member.dealroom');

	Route::get('request-opportunity','OpportunityController@requestview')->name('member.request-opportunity');
	Route::post('request-opportunity','OpportunityController@request')->name('member.requestopportunity');

	Route::get('submit-opportunity-form/{code}','OpportunityController@submitopportunityformview')->name('member.submit-opportunity-form');

	// Route::get('lock-screen','HomeController@lockscreen')->name('member.lock-screen');
	// Route::get('keep-alive','HomeController@keepalive')->name('member.keep-alive');
});

Route::group(['prefix'=>'admin','namespace'=>'admin'],function(){

	Route::get('/','HomeController@index');

	Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'LoginController@login')->name('admin.login.submit');
	Route::get('logout', 'LoginController@logout');

	Route::get('password/reset','AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('password/email', 'AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('password/reset/{token}','AdminResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('password/reset', 'AdminResetPasswordController@reset');

	Route::get('check-membership','HomeController@checkmembershipview')->name('admin.check-membership');
	Route::get('user-membership-detail/{id}','HomeController@membershipdetailview')->name('admin.membership-detail');
	Route::post('allow-user-membership','HomeController@allowusermembership')->name('admin.allow-user-membership');
	Route::post('deny-user-membership',"HomeController@denyusermembership")->name('admin.deny-user-membership');

	Route::get('allow-apply-membership', "HomeController@allowapplymembershipview")->name('admin.allow-apply-membership');
	Route::post('allow-apply-membership',"HomeController@allowapplymembership")->name('admin.allow.apply');
	Route::post('deny-apply-membership',"HomeController@denyapplymembership")->name('admin.deny.apply');


	Route::get('edit-faq','EditController@faqview')->name('admin.edit-faq-view');
	Route::post('edit-faq','EditController@faqedit')->name('admin.edit-faq');

	Route::get('check-request-opportunity','OpportunityController@checkrequest')->name('admin.check-request-opportunity');
	Route::get('request-opportunity-detail/{id}','OpportunityController@detailrequestopportunity')->name('admin.requestopportunity-detail');
	Route::post('allow-requestopportunity-detail','OpportunityController@allowusersumitopportunity')->name('admin.allow-submit-opportunity');
	Route::post('deny-requestopportunity-detail','OpportunityController@denyusersumitopportunity')->name('admin.deny-submit-opportunity');
});