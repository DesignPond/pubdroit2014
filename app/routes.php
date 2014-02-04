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

use Analyses as AN;

Route::get('/', function()
{
	
    	
	$ans = AN::where('pid','=',195)->with( array('analyses_categories') )->orderBy('pub_date', 'DESC')->get()->toArray();	
	
	
	echo '<pre>';
	print_r($ans);
	echo '</pre>';	
		
/*
	$instance   = Carbon::createFromFormat('Y-m-d h:i:s', '2013-10-01 00:00:00');
	$formatDate = $instance->toDateString();
	
	echo '<pre>';
	//echo $formatDate;
	echo '</pre>';
	
	$event = Events::with( array('prices','eventsoptions') )->findOrFail(3);
	
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
    Route::get('lois', array('uses' => 'BailController@lois'));	    
    Route::get('jurisprudence', array('uses' => 'BailController@jurisprudence'));	
    Route::get('doctrine', array('uses' => 'BailController@doctrine'));	       
    Route::get('calcul', array('uses' => 'BailController@calcul'));	    
    Route::post('loyer', array('uses' => 'BailController@loyer'));	   
    
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
    Route::get('jurisprudence', array('uses' => 'MatrimonialController@jurisprudence'));	
    Route::get('test', array('uses' => 'MatrimonialController@test'));
    
});


/* ========================================
	 Login 
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
	
	// Index administration
    Route::get('/', array('uses' => 'AdminController@index'));
    
    // Upload file
	Route::post('upload', array('uses' => 'UploadController@store'));
	Route::get('files', array('uses' => 'AdminController@files'));
    
    Route::group(array('prefix' => 'pubdroit'), function()
	{
		// Colloques
	    Route::get('/', array('uses' => 'EventController@index'));	    
	    Route::get('lists', array('uses' => 'EventController@lists'));
	    Route::get('archives', array('uses' => 'EventController@archives'));	    
	    Route::get('event', array('uses' => 'EventController@index'));
	    Route::post('event/upload', array('uses' => 'EventController@upload'));
	    Route::post('event/pivot', array('uses' => 'EventController@pivot'));	    
	    Route::resource('event', 'EventController');

		// Inscriptions
	    Route::get('inscription/event/{event}', array('uses' => 'InscriptionController@event'));	      
	    Route::resource('inscription', 'InscriptionController');
	    
	    // Options colloques
	    Route::get('option/{option}/delete', array('uses' => 'OptionController@destroy'));
	    Route::get('option/create/{event}', array('uses' => 'OptionController@create'));
	    Route::resource('option', 'OptionController');

	    // Prix colloques
	    Route::get('price/{price}/delete', array('uses' => 'PriceController@destroy'));
	    Route::get('price/create/{event}', array('uses' => 'PriceController@create'));
	    Route::resource('price', 'PriceController');
	    
	    // Spécialisations users and colloques
	    Route::get('specialisation/{specialisation}/delete', array('uses' => 'SpecialisationController@destroy'));
	    Route::get('specialisation/create/{event}', array('uses' => 'SpecialisationController@create'));
	    Route::post('specialisation/linkEvent', array('uses' => 'SpecialisationController@linkEvent'));
	    Route::get('specialisation/{id}/unlinkEvent', array('uses' => 'SpecialisationController@unlinkEvent'));
	    Route::resource('specialisation', 'SpecialisationController');
	    
	    // Membres users
	    Route::get('membre/{membre}/delete', array('uses' => 'MembreController@destroy'));
	    Route::resource('membre', 'MembreController');
	    
	    // Professions users
	    Route::get('profession/{profession}/delete', array('uses' => 'ProfessionController@destroy'));
	    Route::resource('profession', 'ProfessionController');
	    
	});
	
    Route::group(array('prefix' => 'bail'), function()
	{
	    //Route::get('/', array('uses' => 'BailController@index'));	    
	});
	
	Route::group(array('prefix' => 'matrimonial'), function()
	{

	});
        
});