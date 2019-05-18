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

Route::get('/', 'User\UserHomePageController@index');

Route::get('/about' , 'User\UserAboutController@show');

Route::get('/menu' ,'User\UserMenuController@index');

Route::get('/blog' , 'User\BlogController@blogs' );
Route::get('/blog/{id}/Details' , 'User\BlogController@blogdetails' );
Route::post('/blog/{blog}/comment' , 'User\BlogController@createcomment');



//                 start Contact Routes
Route::get('/contact' ,'User\UserContactController@contact');
Route::Post('contact/send_message' , 'User\UserContactController@send_message');
//                 End Contact Routes

//                 start Booking Routes
Route::get('/event' ,function(){return view('user.pages.event');});
Route::get('/table' ,function(){return view('user.pages.table');});

Route::post('/table/booking' , 'User\BookingController@booktable');
Route::post('/event/booking' , 'User\BookingController@bookevent');


//                 End Booking Routes





