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

/* ==================================
	Routes tests
==================================== */

Route::get('/', function()
{
	return View::make('hello');
});

/* ==================================
	Routes Common
==================================== */
		
	/* LOGIN */
	
	Route::get('login', function()
	{
	
		if(Auth::check())
		{
			return Redirect::to('pubdroit/profil');
		}
		else
		{
			return View::make('pubdroit.login');
		}
	  
	});
	
	Route::post('login', function()
	{
	
		if( Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password') )) )
		{
			return Redirect::to('pubdroit/profil');
		}
		else
		{
			return Redirect::to('login');
		}
	     
	});
	
	/* Newsletter */
	
	Route::post('newsletter', array( 'uses' => 'NewsletterController@add') );
 
/* ==================================
	Routes publications-droit
==================================== */ 

Route::group(array('prefix' => 'pubdroit'), function()
{

    Route::get('/', function()
    {
        return View::make('pubdroit.index');
    });
    
    Route::get('profil', array('before' => 'auth', function()
	{
	    return View::make('pubdroit.profil');
	}));
	
});


/* ==================================
	Routes droitmatrimonial
==================================== */

Route::group(array('prefix' => 'matrimonial'), function()
{

    Route::get('/', function()
    {
        return View::make('matrimonial.index');
    });

});


/* ==================================
	Routes bail
==================================== */

Route::group(array('prefix' => 'bail'), function()
{

    Route::get('/', array('uses' => 'BailController@index'));
    Route::get('lois', array('uses' => 'BailController@lois'));
    Route::get('autorites', array('uses' => 'BailController@autorites'));
    Route::get('jurisprudence', array('uses' => 'BailController@jurisprudence'));
    
    Route::post('search', array('uses' => 'BailController@search'));

});