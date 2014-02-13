<?php

use Droit\Repo\Event\EventInterface;
use Droit\Repo\Compte\CompteInterface;
use Droit\Repo\Option\OptionInterface;
use Droit\Repo\Price\PriceInterface;
use Droit\Repo\Specialisation\SpecialisationInterface;
use Droit\Repo\File\FileInterface;

use Droit\Service\Form\Event\EventForm;
use Droit\Service\Form\File\FileForm;
use Droit\Service\Upload\UploadInterface;

use Droit\Service\Form\Attestation\AttestationValidator as AttestationValidator;
use Droit\Service\Form\Event\EmailEventValidator as EmailEventValidator;

class EventController extends BaseController {

	protected $event;
	
	protected $file;
	
	protected $validator;
	
	protected $compte;
	
	protected $upload;
	
	protected $option;
	
	protected $specialisation;
	
	protected $price;
	
	public function __construct(
		EventInterface $event, 
		EventForm $validator , 
		CompteInterface $compte, 
		UploadInterface $upload , 
		FileForm $filevalidator, 
		FileInterface $file,
		OptionInterface $option,
		PriceInterface $price,
		SpecialisationInterface $specialisation
	)
	{
		
		$this->event          = $event;
		
		$this->file           = $file;
		
		$this->validator      = $validator;
		
		$this->filevalidator  = $filevalidator;
		
		$this->compte         = $compte;
		
		$this->option         = $option;
		
		$this->upload         = $upload;
		
		$this->specialisation = $specialisation;
		
		$this->price          = $price;

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('admin.index');
	}
	
	/**
	 * Display a listing of the events actifs
	 *
	 * @return Response
	 */
	public function lists()
	{
		$events = $this->event->getActifs();

        return View::make('admin.event.event')->with( array('events' => $events , 'title' => 'En cours'));
	}
	
	
	/**
	 * Display a listing of the events archived
	 *
	 * @return Response
	 */
	public function archives()
	{
		$events = $this->event->getArchives();	

        return View::make('admin.event.event')->with( array('events' => $events , 'title' => 'Archives'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.event.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if( $this->validator->save( Input::all() ) )
		{	
			// Get last inserted
			$event  = $this->event->getLast(1);
			$id     = $event->first()->id;
			
			return Redirect::to('admin/pubdroit/event/'.$id.'/edit');
		}
		else
		{	
			return Redirect::to('admin/pubdroit/event/create')->withErrors($this->validator->errors())->withInput( Input::all() ); 
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$event = $this->event->find($id);	
		
        return View::make('event.show')->with( array('event' => $event ));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$event       = $this->event->find($id);
		$email       = $this->event->getEmail('inscription',$id);
		$attestation = $this->event->getAttestation($id);
		$comptes     = $this->compte->getAll()->lists('motifCompte', 'id');
		
		$root        = getcwd().'/centers';
		$centers     = $this->file->directory_map( $root , array('png','jpg') );
		
		// Uploads 
		$documents = array(
			'images' => array('carte','vignette','badge'),
			'docs'   => array('programme','pdf','document')
		);
		
		$allfiles = $this->event->setFiles($event,$documents);
		
        return View::make('admin.event.edit')
        		->with( array( 'event' => $event, 'centers' => $centers , 'comptes' => $comptes , 'attestation' => $attestation, 'email' => $email , 'documents' => $documents , 'allfiles' => $allfiles ));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{	
					
		if( $this->validator->update(Input::all()) )
		{	
			return Redirect::to('admin/pubdroit/event/'.$id.'/edit')->with( array('status' => 'success', 'message' => 'Mise à jour ok') );
		}
		else
		{				
			//return Redirect::to('admin/pubdroit/event/'.$id.'/edit')->withInput( Input::all() )->withErrors( $this->validator->errors() );
			return Redirect::to('admin/pubdroit/event/'.$id.'/edit')->with( array('status' => 'danger') )->withInput( Input::all() )->withErrors( $this->validator->errors() );
		}		
	}
	
	public function email(){
			
		$event_id  = Input::get('event_id');
		
		$emailEventValidator = EmailEventValidator::make(Input::all());
		
		if ($emailEventValidator->passes()) 
		{
			$this->event->createEmail( Input::all() );
			
			return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'success' , 'message' => 'Mise à jour ok') ); 
		}
		
		return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->withErrors( $emailEventValidator->errors() )->withInput( Input::all() ); 
		
	}
	
	public function attestation(){
	
		$event_id  = Input::get('event_id');
		
		$attestationValidator = AttestationValidator::make(Input::all());
		
		if ($attestationValidator->passes()) 
		{
			$this->event->createAttestation( Input::all() );
			
			return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'success' , 'message' => 'Mise à jour ok') ); 
		}
		
		return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->withErrors( $attestationValidator->errors() )->withInput( Input::all() ); 
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
	
	/**
	 * Upload file for event
	 *
	 * @param  int  $id
	 * @return Response
	 */
	 public function upload()
	 {
		 $destination = Input::get('destination');
		 $id = Input::get('event_id');
		 
		 $data = false;
		 
		 if( Input::file('file') )
		 {
			 $data = $this->upload->upload( Input::file('file') , $destination );
		 }
		 	
	 	 if($data)
	 	 {
	 	 	$file = array(
	 	 		'filename' => $data['name'],
	 	 		'typeFile' => Input::get('typeFile'),
	 	 		'event_id' => Input::get('event_id')
	 	 	);
	 	 	
	 		if( $this->filevalidator->save( $file ) )
			{				 	 	 	 
				return Redirect::to('admin/pubdroit/event/'.$id.'/edit')->with( array('status' => 'success' , 'message' => 'Fichier ajouté') );
			} 
			else
			{
				return Redirect::to('admin/pubdroit/event/'.$id.'/edit')->with( array('status' => 'error' , 'message' => 'Fichier ajouté') )->withErrors( $this->filevalidator->errors() );
			} 
		 }

		 return Redirect::to('admin/pubdroit/event/'.$id.'/edit')->with( array('status' => 'danger' , 'message' => 'Aucun fichier') ); 
	 }
	 
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy_file($id)
	{
		
		$event_id = $this->file->find($id)->event_id;

		if( $this->file->delete($id) )
		{
			return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'success' , 'message' => 'Le fichier a été supprimé') );
		}
		
		return Redirect::to('admin/pubdroit/event/'.$event_id.'/edit')->with( array('status' => 'error' , 'message' => 'Problème avec la suppression') );
	}

}
