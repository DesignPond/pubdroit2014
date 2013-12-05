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

Route::get('/', function()
{
	$pdf = App::make('dompdf');
	$pdf->loadHTML('<h1>Test</h1>');
	return $pdf->stream();
});


Route::get('login', function()
{
	if(Auth::check()){
		return Redirect::to('pubdroit/profil');
	}
	else{
		return View::make('pubdroit.login');
	}
});

Route::post('login', function()
{
    // Validation later - for now let’s just get the creds
   if( Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password') )) )
   {
	   return Redirect::to('pubdroit/profil');
   }
   else
   {
	   return Redirect::to('login');
   }
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

 

Route::group(array('prefix' => 'bail'), function()
{

    Route::get('/', function()
    {
        return View::make('bail.index');
    });
    
    Route::get('lois', function()
    {
        return View::make('bail.index');
    });
    
});

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

	Route::get('event', array('uses' => 'EventController@index'));
		
	// Search and info API
	
	Route::post('api', array('uses' => 'SearchController@index'));

});

Route::group(array('prefix' => 'matrimonial'), function()
{
    Route::get('/', function()
    {
        return View::make('matrimonial.index');
    });
});