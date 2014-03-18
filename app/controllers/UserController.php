<?php

use Droit\Repo\User\UserInfoInterface;
use Droit\Repo\Adresse\AdresseInterface;
use Droit\Service\Inscription\InscriptionServiceInterface;

class UserController extends BaseController {

	protected $inscription;	
	
	protected $user;
	
	protected $adresse;


	/**
	 * Instantiate a new UserController
	 */
	public function __construct( UserInfoInterface $user , AdresseInterface $adresse , InscriptionServiceInterface $inscription )
	{
			
		$this->user        = $user;
		
		$this->adresse     = $adresse;
		
		$this->inscription = $inscription;
		
	    $civilites   = \Civilites::all()->lists('title','id');
	    $professions = \Professions::all()->lists('titreProfession','id');
		$cantons     = \Cantons::all()->lists('titreCanton','id');
		$pays        = \Pays::all()->lists('titrePays','id');
		
		View::share( array( 'civilites' => $civilites , 'professions' => $professions , 'cantons' => $cantons , 'pays' => $pays ) );
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
		
		// Adresses and apprtenances
		$membres          = array();
		$specialisations  = array();
		$data             = array();

        $user             = $this->user->find($id);
        $contact          = $this->user->findAdresseContact($id , true); // return only id with true
        
        if($contact)
        {
	        $membres         = $this->adresse->members($contact);
			$specialisations = $this->adresse->specialisations($contact); 
        }
        
        $data['user']            = $user;
        $data['membres']         = $membres;
        $data['specialisations'] = $specialisations;
        
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
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		if ($this->user->destroy($id))
		{
			Session::flash('success', 'User Deleted');
            return Redirect::to('/users');
        }
        else 
        {
        	Session::flash('error', 'Unable to Delete User');
            return Redirect::to('/users');
        }
	}

}

	
