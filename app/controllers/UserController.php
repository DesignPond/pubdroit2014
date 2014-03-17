<?php

use Droit\Repo\User\UserInfoInterface;
use Droit\Repo\Adresse\AdresseInterface;
use Droit\Repo\Inscription\InscriptionInterface;
use Droit\Repo\Option\OptionInterface;
use Droit\Repo\File\FileInterface;

class UserController extends BaseController {

	protected $inscription;	
	
	protected $user;
	
	protected $adresse;
	
	protected $options;
	
	protected $file;

	/**
	 * Instantiate a new UserController
	 */
	public function __construct( UserInfoInterface $user , FileInterface $file , AdresseInterface $adresse , InscriptionInterface $inscription, OptionInterface $options )
	{
	
		$this->inscription = $inscription;
			
		$this->user        = $user;
		
		$this->adresse     = $adresse;
		
		$this->option      = $options;
		
		$this->file        = $file;
		
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
		// Inscriptions
		
		$inscriptions = $this->inscription->getForUser($id);
		$options      = $this->option->findForUser($id);
		
		$events       = $inscriptions->lists('event_id','id');
		$vignettes    = $this->file->getFilesEvent($events,'vignette')->lists('filename','event_id');
		
		// Adresses and apprtenances
		$membres          = array();
		$specialisations  = array();
		
		$docs = array(
			'Bon'         => 'pdfbon',
			'Facture'     => 'pdffacture',
			'BV'          => 'bv',
			'Rappel'      => 'pdfrappel',
			'Attestation' => 'attestation',
		);
		
        $user             = $this->user->find($id);
        $contact_id       = $this->user->findAdresseContact($id);
        
        if($contact_id)
        {
        	$contact         = $contact_id->first()->id;
	        $membres         = $this->adresse->members($contact);
			$specialisations = $this->adresse->specialisations($contact); 
        }

        if($user == null || !is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

        return View::make('admin.users.show')->with( 
       		 array(
	        	'user'            => $user,
	        	'contact_id'      => $contact_id,
	        	'membres'         => $membres ,
	        	'specialisations' => $specialisations,
	        	'inscriptions'    => $inscriptions,
	        	'options'         => $options,
	        	'docs'            => $docs,
	        	'vignettes'       => $vignettes 
        	)
        );
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
        if(!is_numeric($id))
        {
            // @codeCoverageIgnoreStart
            return \App::abort(404);
            // @codeCoverageIgnoreEnd
        }

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

	
