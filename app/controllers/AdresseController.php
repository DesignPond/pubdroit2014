<?php

use Droit\Repo\User\UserInfoInterface;
use Droit\Repo\Adresse\AdresseInterface;

use Droit\Service\Form\Adresse\AdresseValidator as AdresseValidator;

class AdresseController extends BaseController {

	protected $user;
	
	protected $adresse;

	/**
	 * Instantiate a new UserController
	 */
	public function __construct( UserInfoInterface $user , AdresseInterface $adresse  )
	{

		$this->user      = $user;
		
		$this->adresse   = $adresse;
		
		$this->custom    = new \Custom;
		
	    $civilites   = \Civilites::all()->lists('title','id');
	    $professions = \Professions::all()->lists('titreProfession','id');
		$cantons     = \Cantons::all()->lists('titreCanton','id');
		$pays        = \Pays::all()->lists('titrePays','id');

		$professions = $this->custom->insertFirstInArray( 0 , 'Choix' , $professions );
		$cantons     = $this->custom->insertFirstInArray( 0 , 'Choix' , $cantons );
		$pays        = $this->custom->insertFirstInArray( 0 , 'Choix' , $pays );
		
		View::share( array( 'civilites' => $civilites , 'professions' => $professions , 'cantons' => $cantons , 'pays' => $pays ) );
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	
        return View::make('admin.adresses.index');
	}
	
	/**
	 * Display a listing of all adresses.
	 *
	 * @return Response
	 */
	public function getAllAdresse()
	{

        $columns = array('email','prenom','nom','adresse','ville'); 
        $sSearch = NULL;
        
        if(Input::get('sSearch'))
        {
	        $sSearch = Input::get('sSearch');
        }

        $sEcho          = Input::get('sEcho');      
        $iDisplayStart  = Input::get('iDisplayStart');
        $iDisplayLength = Input::get('iDisplayLength');
        
        return $this->adresse->get_ajax( $columns , $sEcho , $iDisplayStart , $iDisplayLength , $sSearch );
        
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function create($id = null)
	{
		// creation is used for new simple adress and new user adress
		
		$infos = $this->adresse->infosIfUser($id);	
		
		return View::make('admin.adresses.create')->with( $infos );
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function store()
	{
				
		$redirectTo       = Input::get('redirectTo');
		
		$adresseValidator = AdresseValidator::make( Input::all() );
		
		if ($adresseValidator->passes()) 
		{
			$this->adresse->create( Input::all() );
			
			if($redirectTo)
			{
				return Redirect::to('admin/'.$redirectTo)->with( array('status' => 'success' , 'message' => 'Adresse crée') ); 
			}
			
			// Get last inserted
			$adresse  = $this->adresse->getLast(1);
			$id       = $adresse->first()->id;
			
			return Redirect::to('admin/adresse/'.$id)->with( array('status' => 'success' , 'message' => 'Adresse crée') ); 
		}
		
		return Redirect::back()->withErrors( $adresseValidator->errors() )->withInput( Input::all() ); 
	}

	/**
	 * Show the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $adresse = $this->adresse->find($id);
        $type    = $this->adresse->typeAdresse($id);
    
        // test if the adresse is linked to user
        $user_id = $this->adresse->isUser($id); 
      
        $membres         = array();
        $specialisations = array();
        $user            = array();
        
        if($user_id != 0)
        {
	        $user = $this->user->find($user_id); 
        }
        
        if($type == 1)
        {
       	 	$membres          = $this->adresse->members($id);
	   	 	$specialisations  = $this->adresse->specialisations($id);	        
        }
        else
        {
	        $contact          = $this->user->findAdresseContact($id , true); // return only id with true
	        
	        if($contact)
	        {
		        $membres         = $this->adresse->members($contact);
				$specialisations = $this->adresse->specialisations($contact); 
	        }
        }

        return View::make('admin.adresses.show')->with( array( 'adresse' => $adresse , 'user' => $user , 'membres' => $membres , 'specialisations' => $specialisations ));
	}
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$redirectTo       = Input::get('redirectTo');
		
		$adresseValidator = AdresseValidator::make( Input::all() );
		
		if ($adresseValidator->passes()) 
		{
			$this->adresse->update( Input::all() );
			
			if($redirectTo)
			{
				return Redirect::to('admin/'.$redirectTo)->with( array('status' => 'success' , 'message' => 'Adresse mise à jour') ); 
			}
			
			return Redirect::to('admin/adresses/'.$id)->with( array('status' => 'success' , 'message' => 'Adresse mise à jour') ); 
		}
		
		return Redirect::back()->withErrors( $adresseValidator->errors() )->withInput( Input::all() ); 
	}	

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id,$user)
	{
		
		$redirectTo = ( $user ? 'admin/users/'.$user : 'admin/adresses' );
		
		if ($this->adresse->delete($id))
		{			
			return Redirect::to($redirectTo)->with( array('status' => 'success' , 'message' => 'Adresse supprimé') ); 		
		}	
		
		return Redirect::to($redirectTo)->with( array('status' => 'error' , 'message' => 'Problème avec la suppression') ); 
        
	}

}
