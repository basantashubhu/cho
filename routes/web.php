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

Route::get('/','pagesController@index')->name('home');
Route::get('/services','pagesController@services');

Route::get('/logo/{filename}', 'ImageController@returnLogo')->name('logo');
Route::get('/cover-pic/{filename}', 'ImageController@returnCover')->name('cover');
Route::get('/member/{filename}', 'ImageController@returnMemberPhoto')->name('member');
Route::get('/milestone/{filename}', 'ImageController@returnMilestone')->name('milestone');


Route::resource('posts','postsController');
Auth::routes();

Route::get('/admin-dashboard', 'AdminDashboardController@index'); 
Route::get('/admin-dashboard/{id}','AdminDashboardController@publish');
Route::post('/change-logo', 'AdminDashboardController@changeLogo');
Route::get('/subscribers', 'AdminDashboardController@subscribers');
Route::get('/all-posts', 'AdminDashboardController@allPosts');

//search
Route::get('/search', 'SearchController@index');

//team
Route::get('/team-member', 'TeamMemberController@index')->name('team-member.index');
Route::post('/team-member', 'TeamMemberController@store')->name('team-member.store');
Route::get('/team-member/create', 'TeamMemberController@create')->name('team-member.create');
Route::post('/team-member/{id}', 'TeamMemberController@update')->name('team-member.update');

//notifications

Route::resource('notifications', 'NotificationController');

//admin2
Route::get('/add-admin', 'AdminController@addAdmin');
Route::post('/add-new-admin', 'AdminController@storeAdmin');