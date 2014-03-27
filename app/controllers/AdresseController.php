<?php

use Droit\Repo\User\UserInfoInterface;
use Droit\Repo\Adresse\AdresseInterface;

use Droit\Service\Form\Adresse\AdresseValidator as AdresseValidator;

use Droit\Repo\UserSpecialisation\UserSpecialisationInterface;
use Droit\Repo\UserMembre\UserMembreInterface;

class AdresseController extends BaseController {

	protected $user;
	
	protected $adresse;
	
	/*  Members and specialisations  */	
	protected $userspecialisation;
	
	protected $usermembre;

	/* Inject dependencies */
	public function __construct( UserInfoInterface $user , AdresseInterface $adresse , UserSpecialisationInterface $userspecialisation , UserMembreInterface $usermembre )
	{

		$this->user        = $user;
		
		$this->adresse     = $adresse;
		
		$this->usermembre  = $usermembre;		
		
		$this->userspecialisation = $userspecialisation;
				
		// Custom helper				
		$this->custom      = new \Custom;
		
		// shared variables and list for selects	
		$shared = $this->custom->sharedVariables();
		
		View::share( $shared );
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

        $sSearch = NULL;
        
        if(Input::get('sSearch'))
        {
	        $sSearch = Input::get('sSearch');
        }

        $sEcho          = Input::get('sEcho');      
        $iDisplayStart  = Input::get('iDisplayStart');
        $iDisplayLength = Input::get('iDisplayLength');
        
        return $this->adresse->get_ajax( $sEcho , $iDisplayStart , $iDisplayLength , $sSearch );
        
	}
	
	
	/**
	 * change livraison adresse
	*/		
	public function changeLivraison(){
		
		echo '<pre>';
		print_r(Input::all());
		echo '</pre>';
		exit();
		
		if ($this->adresse->changeLivraison($id,$type))
		{			
			return Redirect::to($redirectTo)->with( array('status' => 'success' , 'message' => 'Adresse supprimé') ); 		
		}	
		
		return Redirect::to($redirectTo)->with( array('status' => 'danger' , 'message' => 'Problème avec la suppression') ); 
		
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
		
		return Redirect::to($redirectTo)->with( array('status' => 'danger' , 'message' => 'Problème avec la suppression') ); 
        
	}

	/**
	 * Add specialisation for user
	 *
	 * @param  int  $user_id , specialisation_id
	 * @return Response
	 */	
	public function specialisation(){
	
		$adresse_id = Input::get('adresse_id');
		
		if( !empty( $adresse_id ) && ($adresse_id != 0))
		{					
			$already = $this->userspecialisation->find( Input::get('specialisation_id') , Input::get('adresse_id')  );
			
			if( $already->isEmpty() )
			{				
				if( $this->userspecialisation->addToUser(Input::get('specialisation_id') , Input::get('adresse_id')) )
				{
					$status = array('status' => 'success' , 'message' => 'La spécialisation a été ajouté');
				}
				
				$status = array('status' => 'danger' , 'message' => 'Problème avec l\'ajout');	
			}
			
			$status = array('status' => 'danger' , 'message' => 'L\'utilisateur à déjà la spécialisation');
		}
		
		$status = array('status' => 'danger' , 'message' => 'Veuillez créer un adresse pour l\'utilisateur d\'abord ');

		return Redirect::back()->with( $status );		
	}

	/**
	 *  Add membre for user
	 *
	 * @param  int  $user_id , $membre_id
	 * @return Response
	 */	
	public function membre(){
		
		$adresse_id = Input::get('adresse_id');
		
		if( !empty( $adresse_id ) && ($adresse_id != 0))
		{		
			$already = $this->usermembre->find( Input::get('membre_id') , Input::get('adresse_id')  );
			
			if( $already->isEmpty() )
			{				
				if( $this->usermembre->addToUser(Input::get('membre_id') , Input::get('adresse_id')) )
				{
					$status = array('status' => 'success' , 'message' => 'L\'appartenance comme membre a été ajouté'); 
				}
				
				$status = array('status' => 'danger' , 'message' => 'Problème avec l\'ajout');
			}
			
			$status = array('status' => 'danger' , 'message' => 'L\'utilisateur à déjà l\'appartenance comme membre');
		}	
		
		$status = array('status' => 'danger' , 'message' => 'Veuillez créer un adresse pour l\'utilisateur d\'abord ');
		
		return Redirect::back()->with( $status );				
	}
	
	/**
	 * Remove specialisation for user
	 *
	 * @param  int  $user_id , specialisation_id
	 * @return Response
	 */	
	public function removeSpecialisation($id){
	
		if ( $this->userspecialisation->remove($id) )
		{
            return Redirect::back()->with( array('status' => 'success' , 'message' => 'La spécialisation a été supprimé')); 
        }

        return Redirect::back()->with( array('status' => 'danger' , 'message' => 'Problème avec la suppression') );				
	}

	/**
	 * Remove membre for user
	 *
	 * @param  int  $user_id , $membre_id
	 * @return Response
	 */	
	public function removeMembre($id){

		if ( $this->usermembre->remove($id) )
		{
            return Redirect::back()->with( array('status' => 'success' , 'message' => 'Le membre a été supprimé')); 
        }

        return Redirect::back()->with( array('status' => 'danger' , 'message' => 'Problème avec la suppression') );			
	}	
	
}
