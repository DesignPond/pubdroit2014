<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

use Carbon\Carbon;

Route::get('/', function()
{
	

	$data = array();
	
	Mail::send('emails.welcome', $data, function($message)
	{
	    $message->to('cindy.leschaud@gmail.com', 'Cindy Leschaud')->subject('Welcome to laravel!');
	});
	
/*
	$instance   = Carbon::createFromFormat('Y-m-d h:i:s', '2013-10-01 00:00:00');
	$formatDate = $instance->toDateString();
	
	echo '<pre>';
	//echo $formatDate;
	echo '</pre>';
	
	$event = Events::with( array('prices','eventsoptions') )->findOrFail(3);
	
	echo '<pre>';
	print_r($event);
	echo '</pre>';	
*/
});

        
/* ==================================
	Routes Common
==================================== */
		
	/* LOGIN */

	
	/* Newsletter */
	
	Route::post('newsletter', array( 'uses' => 'NewsletterController@add') );

        
/* ==================================
	BAIL Routes  
==================================== */ 

Route::group(array('prefix' => 'bail'), function()
{

    Route::get('/', array('uses' => 'BailController@index'));	 
  
    Route::get('lois', array('uses' => 'BailController@index'));	 
    
});


/* ========================================
	Publications-droit Routes  
=========================================== */ 

Route::group(array('prefix' => 'pubdroit'), function()
{

    Route::get('/', array('uses' => 'PublicationController@index'));
    
    Route::get('profil', array('before' => 'auth' , 'uses' => 'PublicationController@profil'));

	Route::get('event', array('uses' => 'PublicationController@event'));
		
	// Search and info API	
	Route::post('api', array('uses' => 'SearchController@index'));

});



/* ========================================
	Droit-matrimonial Routes  
=========================================== */ 


Route::group(array('prefix' => 'matrimonial'), function()
{
    Route::get('/', array('uses' => 'MatrimonialController@index'));
    
});


/* ========================================
	 Login for admin
=========================================== */ 

// Session Routes
Route::get('login',  array('as' => 'login', 'uses' => 'SessionController@create'));
Route::get('logout', array('as' => 'logout', 'uses' => 'SessionController@destroy'));
Route::resource('sessions', 'SessionController', array('only' => array('create', 'store', 'destroy')));

// User Routes
Route::get('register', 'UserController@create');
Route::get('users/{id}/activate/{code}', 'UserController@activate')->where('id', '[0-9]+');
Route::get('resend', array('as' => 'resendActivationForm', function()
{
	return View::make('users.resend');
}));

Route::post('resend', 'UserController@resend');
Route::get('forgot', array('as' => 'forgotPasswordForm', function()
{
	return View::make('users.forgot');
}));

Route::post('forgot', 'UserController@forgot');
Route::post('users/{id}/change', 'UserController@change');
Route::get('users/{id}/reset/{code}', 'UserController@reset')->where('id', '[0-9]+');
Route::get('users/{id}/suspend', array('as' => 'suspendUserForm', function($id)
{
	return View::make('users.suspend')->with('id', $id);
}));

Route::post('users/{id}/suspend', 'UserController@suspend')->where('id', '[0-9]+');
Route::get('users/{id}/unsuspend', 'UserController@unsuspend')->where('id', '[0-9]+');
Route::get('users/{id}/ban', 'UserController@ban')->where('id', '[0-9]+');
Route::get('users/{id}/unban', 'UserController@unban')->where('id', '[0-9]+');
Route::resource('users', 'UserController');

// Group Routes
Route::resource('groups', 'GroupController');


/* ========================================
	Administration Routes  
=========================================== */ 
	
// Route::group(array('prefix' => 'admin' , 'before' => 'sentryAuth'), function()
Route::group(array('prefix' => 'admin'), function()
{
	
	/* ========================================
		Routes   
	=========================================== */ 
	
    Route::get('/', array('uses' => 'AdminController@index'));
    
    // test
	Route::post('upload', array('uses' => 'UploadController@store'));
	Route::get('files', array('uses' => 'AdminController@files'));
    
    Route::group(array('prefix' => 'pubdroit'), function()
	{
	
	    Route::get('/', array('uses' => 'EventController@index'));	    
	    Route::get('lists', array('uses' => 'EventController@lists'));
	    Route::get('archives', array('uses' => 'EventController@archives'));
	    Route::get('event', array('uses' => 'EventController@index'));
	    Route::post('event/upload', array('uses' => 'EventController@upload'));
	    
	    Route::resource('event', 'EventController');
	    
	});
	
    Route::group(array('prefix' => 'bail'), function()
	{
	    //Route::get('/', array('uses' => 'BailController@index'));	    
	});
	
	Route::group(array('prefix' => 'matrimonial'), function()
	{

	});
        
});