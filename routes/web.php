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

Route::get('/email-test1','EmailTestController@emailtest1');
Route::get('/email-test2','EmailTestController@emailtest2');
Route::get('/monthly','EmailTestController@monthly');
Route::get('/viewtest', 'EmailTestController@viewtest');
Route::post('/test',"EmailTestController@testpost");
Route::get('/hightlight','EmailTestController@highlight');

Route::get('/', 'HomeController@index')->name('home');

Route::post('/preregister','HomeController@preregister');

Route::get('request-access','HomeController@requestaccessview')->name('request-access');
Route::post('requestaccess','HomeController@requestaccess')->name('requestaccess');

Route::get('/refer-member','HomeController@refermemberview');
Route::get('/refer-member/{user}','HomeController@refermemberview')->name('refer-member');

Route::post('/refermember','HomeController@refermember');

Route::get('/apply-membership/{code}','HomeController@applymembershipview')->name('apply-membership');
Route::post('/applymembership','HomeController@applymembership');

Route::get('/follow-me/{link}','HomeController@Referral');

Route::get('/monthly-email/{year}/{month}/{memberid}/{code}','MonthlyEmailController@gatherview')->name('monthly-email');
Route::post('monthly-email','MonthlyEmailController@gatherinfo')->name('answer-monthly-email');

Route::group(['prefix'=>'member','namespace'=>'member'],function(){
	Route::get('/','HomeController@index');
	Route::get('dashboard','HomeController@index')->name('member.dashboard');
	Route::get('faq','HomeController@faqview')->name('member.faq');

	Route::get('profile','HomeController@profileview')->name('member.profile');
	Route::post('edit-profile','EditProfileController@editapplicantinfo')->name('member.edit-profile');
	Route::post('edit-investment','EditProfileController@editinvestmentobjective')->name('member.edit-investment');

	Route::get('refer-member','ReferController@refermemberview')->name('member.refer-member-view');
	Route::post('refer-member','ReferController@refermember')->name('member.refer-member');

	Route::get('dealroom','DealRoomController@dealroomview')->name('member.dealroom');

	Route::get('submit-opportunity','OpportunityController@requestview')->name('member.submit-opportunity');
	Route::post('request-opportunity','OpportunityController@request')->name('member.requestopportunity');

	Route::get('investment-questionnaire-form/{code}','OpportunityController@submitopportunityformview')->name('member.investment-questionnaire-form');
	Route::post('submit-opportunity-form','OpportunityController@submitopportunityform')->name('member.submit-coinvestment-opportunity');
	Route::get('verified-opportunity','OpportunityController@verifiedopportunityview')->name('member.verified-opportunity');
	Route::get('opportunity-detail/{id}','OpportunityController@detailopportunity')->name('member.opportunity-detail');
	Route::post('interest-opportunity','OpportunityController@interestopportunity')->name('member.interest-opportunity');
	Route::post('no-interest-opportunity','OpportunityController@nointerestopportunity')->name('member.no-interest-opportunity');
	Route::get('view-referrals','HomeController@viewreferral')->name('member.view-referrals');
	Route::get('view-opportunities','OpportunityController@viewall')->name('member.view-opportunities');
	Route::get('view-opportunity-detail/{id}','OpportunityController@detailrequestopportunity')->name('member.requestopportunity-detail');
	// Route::get('lock-screen','HomeController@lockscreen')->name('member.lock-screen');
	// Route::get('keep-alive','HomeController@keepalive')->name('member.keep-alive');
});

Route::group(['prefix'=>'admin','namespace'=>'admin'],function(){

	Route::get('/','HomeController@index');
	Route::get('dashboard','HomeController@dashboardview')->name('admin.dashboard');

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
	Route::get('check-all-members-membership',"HomeController@checkallmembership")->name('admin.check.membership');

	Route::get('edit-faq','EditController@faqview')->name('admin.edit-faq-view');
	Route::post('edit-faq','EditController@faqedit')->name('admin.edit-faq');

	Route::get('check-request-opportunity','OpportunityController@checkrequest')->name('admin.check-request-opportunity');
	Route::get('members-request-opportunity','OpportunityController@checkallrequest')->name('admin.check-allrequest-opportunity');
	Route::get('request-opportunity-detail/{id}','OpportunityController@detailrequestopportunity')->name('admin.requestopportunity-detail');
	Route::post('allow-requestopportunity-detail','OpportunityController@allowusersumitopportunity')->name('admin.allow-submit-opportunity');
	Route::post('deny-requestopportunity-detail','OpportunityController@denyusersumitopportunity')->name('admin.deny-submit-opportunity');
	Route::get('opportunity-analytics', 'OpportunityController@analyticsview')->name('admin.opportunity-analytics');
	Route::get('opportunity-detail/{id}','OpportunityController@detailopportunity')->name('admin.opportunity-detail');
	Route::get('check-member-opportunity-match/{id}','OpportunityController@checkmatch')->name('admin.check-member-opportunity-match');
	Route::post('approve-opportunity-match','OpportunityController@approveopportunitymatch')->name('admin.approve-opportunity-match');

	Route::get('member-visit-detail/{date}','HomeController@visitdetail')->name('admin.member-visit-detail');

	Route::get('member-activity-detail/{id}','HomeController@memberactivity')->name('admin.member-activity-detail');

	Route::get('staff-management','StaffController@staffmanageview')->name('admin.staff-management');
	Route::get('staff-account', 'StaffController@staffaccountview')->name('admin.staff-account');
	Route::post('admin.new-staff', 'StaffController@newstaff')->name('admin.new-staff');
	Route::post('edit-admin-staff', 'StaffController@editadminstaff')->name('admin.edit-admin-staff');
	Route::post('edit-staff', 'StaffController@editstaffaccount')->name('admin.edit-staff');
	Route::post('del-staff', 'StaffController@delstaff')->name('admin.del-staff');
});