<?php

use Droit\Repo\User\UserInfoInterface;
use Droit\Repo\Adresse\AdresseInterface;
use Droit\Service\Inscription\InscriptionServiceInterface;


class UserController extends BaseController {

	protected $inscription;	
	
	protected $user;
	
	protected $adresse;
	
	/* Inject dependencies */
	public function __construct( UserInfoInterface $user,AdresseInterface $adresse,InscriptionServiceInterface $inscription )
	{
			
		$this->user               = $user;
		
		$this->adresse            = $adresse;
		
		$this->inscription        = $inscription;
				
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
   
        return View::make('admin.users.index');
	}

	/**
	 * Show the form for creating a new user.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.users.create');
	}

	/**
	 * Store a newly created user.
	 *
	 * @return Response
	 */
	public function store()
	{
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		/**
		 * User, adresses and memberships
		*/		

        $user             = $this->user->find($id);
        $contact          = $this->user->findAdresseContact($id , true); // return only id with true
        
        if($contact)
        {
	        $membres         = $this->adresse->members($contact);
			$specialisations = $this->adresse->specialisations($contact); 
        }
        
        $data['user']            = $user;
        $data['adresse_id']      = $contact;
        $data['membres']         = ( $membres ? $membres : array() );
        $data['specialisations'] = ( $specialisations ? $specialisations : array() );
        
		/**
		 *  Get essentials infos for inscription list
		 *  and all inscription for user
		*/		
        $inscriptions = $this->inscription->inscriptionsForUser($id);
        
        $result = array_merge($inscriptions,$data);

        return View::make('admin.users.show')->with( $result );
       
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	
	}
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function active($id)
	{
		
		if ( $this->user->activate($id) )
		{			
			return Redirect::to('admin/users/'.$id)->with( array('status' => 'success' , 'message' => 'L\'etat du compte à bien été modifié')); 		
		}	
		
		return Redirect::to('admin/users/'.$id)->with( array('status' => 'error' , 'message' => 'Problème avec la modification') ); 
        		
	}	

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		if ($this->user->delete($id))
		{
            return Redirect::to('users')->with( array('status' => 'success' , 'message' => 'L\'etat du compte à bien été modifié')); 
        }

        return Redirect::back()->with( array('status' => 'error' , 'message' => 'Problème avec la modification') );
      
	}

}

	
