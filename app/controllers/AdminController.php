<?php

use Droit\Repo\Event\EventInterface;
use Droit\Repo\User\UserInfoInterface;
use Droit\Service\Form\Event\EventForm;
use Droit\Repo\Inscription\InscriptionInterface;

use Droit\Service\Generate\GenerateInterface;

class AdminController extends BaseController {

	protected $event;
	
	protected $user;
	
	protected $generate;
	
	public function __construct(EventInterface $event , UserInfoInterface $user ,  InscriptionInterface $inscription , GenerateInterface $generate){
		
		$this->event    = $event;
		
		$this->user     = $user;
		
		$this->generate = $generate;
		
		$this->inscription = $inscription;
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

	public function pdf(){
		
		$event   = $this->event->find(4);
		$infos   = \Event_config::where('event_id','=',0)->get();
		$user    = $this->user->findWithInscription(1,4);
		$options = $this->user->eventOptions(1,4);
		$att     = $this->event->getAttestation(4);
		
		$attestation = ( !empty($att) ? $att : NULL );
		
		$data = $this->generate->arrange($event,$user,$infos,$options,$attestation);
				
		$view = 'pdf.bon';
		$name = 'bon';
		
		return $this->generate->generate($view , array( 'data' => $data ) , $name , 'bon' , FALSE );
	}
	
	public function files(){
	
		$event   = $this->event->find(4);
		$inscriptions = $this->inscription->getEvent(4);
			
    	return View::make('pdf.test')->with( array( 'data' => $inscriptions ) );    
	}	
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admins.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('admins.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('admins.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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

	

}
