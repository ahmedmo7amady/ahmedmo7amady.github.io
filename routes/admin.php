<?php

Route::group(['prefix'=>'admin' , 'namespace' =>'Admin'] , function(){

    Config::set('auth.defines','admin');
    Route::get('login' , 'AdminAuthController@login');
    Route::post('login' , 'AdminAuthController@dologin');


    Route::group(['middleware'=>'admin:admin'] , function(){

        Route::get('/' , 'DashboardController@index');


        Route::get('/about' , 'AdminAboutController@Edit');
        Route::get('/about/update' , 'AdminAboutController@update');

        Route::resource('chef' , 'AdminChefsController');
        // start contact page routes
        Route::get('/contact' , 'AdminContactController@contact');
        Route::post('/contact/info/insert' , 'AdminContactController@update');
        Route::get('/contact/message/{id}' ,'AdminContactController@contact');
        Route::delete('/contact/message/{id}/delete' , 'AdminContactController@destroy');
        // End contact page routes



        // Start Booking page routes  
        //Event
        Route::get('/event' , 'BookingController@showevent');
        Route::post('/event/{id}/show' , 'BookingController@showevent');
        Route::delete('/event/{id}/delete' , 'BookingController@eventdestroy');
        //Table
        Route::get('/table' , 'BookingController@showtable');
        Route::delete('/table/{id}/delete' , 'BookingController@tabledestroy');
        // End Booking page routes  


        // Start Blog page routes
        Route::resource('blog' , 'AdminBlogController');
        // End Blog page routes

        // Start Comment page routes
        Route::delete('blog/comment/{comment}' , 'AdminCommentController@destroy');
         // End Comment page routes

        Route::resource('menu/categories' , 'AdminMenuController' );


        Route::Get('menu/categories/{id}/create' ,'AdminMenuSectionController@create' );
        Route::POST('menu/categories/{id}/sections' ,'AdminMenuSectionController@store' );
        Route::GET('menu/categories/section/{id}/edit' ,'AdminMenuSectionController@edit' );
        Route::PATCH('menu/categories/section/{id}/edit' ,'AdminMenuSectionController@update' );
        Route::DELETE('menu/categories/section/{id}/delete' ,'AdminMenuSectionController@destroy' );




        Route::any('logout', 'AdminAuthController@logout');

        
    });


    
});

