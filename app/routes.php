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
	View composer
==================================== */

        
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
	Administration Routes  
=========================================== */ 
	
// Route::group(array('prefix' => 'admin' , 'before' => 'sentryAuth'), function()
Route::group(array('prefix' => 'admin'), function()
{
	
	/* ========================================
		Routes common admin
	=========================================== */ 
	
	// Index administration
    Route::get('/', array('uses' => 'AdminController@index'));
   
    // Arrets for bail and droit matrimonial
    Route::get('arrets/create/{pid}', array('uses'  => 'ArretsController@create'));
    Route::resource('arrets', 'ArretsController');
    
    // Analyse for bail and droit matrimonial
    Route::get('analyses/create/{pid}', array('uses'  => 'AnalysesController@create'));
    Route::resource('analyses', 'AnalysesController');
    
    Route::get('search', array('uses'  => 'SearchController@index'));
    Route::post('search', array('uses' => 'SearchController@index'));
    
    // Upload file
	Route::post('upload', array('uses' => 'UploadController@store'));
	Route::get('files',  array('uses'  => 'AdminController@files'));
	Route::get('pdf',  array('uses'    => 'AdminController@pdf'));
		
	// Users and adresses
	Route::get('users', 'AdminUserController@index');
	Route::post('users/changeUsername', 'UserController@changeUsername');
	
	Route::get('users/{user}', 'UserController@show');
	Route::get('users/{user}/edit', 'UserController@edit');
	Route::get('users/{user}/active', 'UserController@active');

	/* member and specialisation */
	Route::get('adresses/removeMembre/{id}', 'AdresseController@removeMembre');
	Route::get('adresses/removeSpecialisation/{id}', 'AdresseController@removeSpecialisation');
	Route::post('adresses/membre', 'AdresseController@membre');
	Route::post('adresses/specialisation', 'AdresseController@specialisation');
	
	Route::get('adresses/user/{id}/adresse', 'AdresseController@create');
	Route::get('adresses/delete/{id}/{user?}', 'AdresseController@destroy');	
	
	Route::resource('adresses', 'AdresseController');
	
	Route::get('getAllUser',    'AdminUserController@getAllUser');
	Route::get('getAllAdresse', 'AdresseController@getAllAdresse');
	
	//Route::resource('users', 'AdminUserController');
    
    // Pubdroit in admin
    Route::group(array('prefix' => 'pubdroit'), function()
	{
		// Colloques
	    Route::get('/', array('uses' => 'EventController@index'));	    
	    Route::get('lists', array('uses' => 'EventController@lists'));
	    Route::get('archives', array('uses' => 'EventController@archives'));	    
	    Route::get('event', array('uses' => 'EventController@index'));
	    Route::post('event/upload', array('uses' => 'EventController@upload'));
	    Route::get('event/{id}/destroy_file', array('uses' => 'EventController@destroy_file')); 
	    Route::post('event/pivot', array('uses' => 'EventController@pivot'));	
	    Route::post('event/email', array('uses' => 'EventController@email'));
	    Route::post('event/attestation', array('uses' => 'EventController@attestation'));	    
	    Route::resource('event', 'EventController');

		// Inscriptions
	    Route::get('inscription/event/{event}', array('uses' => 'InscriptionController@event'));	      
	    Route::resource('inscription', 'InscriptionController');

		// Invoices
	    Route::get('invoice/event/{event}', array('uses' => 'InvoiceController@event'));	      
	    Route::resource('invoice', 'InvoiceController');
	    	    
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
	    Route::get('arrets' , array('uses'  => 'BailController@arrets'));	 
	    Route::get('analyses', array('uses' => 'BailController@analyses'));	    
	});
	
	Route::group(array('prefix' => 'matrimonial'), function()
	{
		Route::get('arrets',  array('uses'  => 'MatrimonialController@arrets'));
		Route::get('analyses', array('uses' => 'MatrimonialController@analyses'));		
	});
	
	
	// User Routes
/*
	Route::get('register', 'AdminUserController@create');
	Route::get('users/{id}/activate/{code}', 'AdminUserController@activate')->where('id', '[0-9]+');
	Route::get('resend', array('as' => 'resendActivationForm', function()
	{
		return View::make('users.resend');
	}));
	
	Route::post('resend', 'AdminUserController@resend');
	Route::get('forgot', array('as' => 'forgotPasswordForm', function()
	{
		return View::make('users.forgot');
	}));
	
	Route::post('forgot', 'AdminUserController@forgot');
	Route::post('users/{id}/change', 'AdminUserController@change');
	Route::get('users/{id}/reset/{code}', 'AdminUserController@reset')->where('id', '[0-9]+');
	Route::get('users/{id}/suspend', array('as' => 'suspendUserForm', function($id)
	{
		return View::make('users.suspend')->with('id', $id);
	}));
	 
	Route::post('users/{id}/suspend',  'AdminUserController@suspend')->where('id', '[0-9]+');
	Route::get('users/{id}/unsuspend', 'AdminUserController@unsuspend')->where('id', '[0-9]+');
	Route::get('users/{id}/ban',   'AdminUserController@ban')->where('id', '[0-9]+');
	Route::get('users/{id}/unban', 'AdminUserController@unban')->where('id', '[0-9]+');
*/


        
});