<?php

use Droit\Repo\Event\EventInterface;
use Droit\Service\Form\Event\EventForm;

use Droit\Repo\Compte\CompteInterface;

class EventController extends BaseController {

	protected $event;
	
	protected $validator;
	
	protected $compte;
	
	public function __construct(EventInterface $event, EventForm $validator , CompteInterface $compte){
		
		$this->event     = $event;
		
		$this->validator = $validator;
		
		$this->compte    = $compte;

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
		$event   = $this->event->find($id);
		$comptes = $this->compte->getAll()->lists('motifCompte', 'id');
		
        return View::make('admin.event.edit')->with( array( 'event' => $event, 'comptes' => $comptes ));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{	
					
		if( $this->validator->update( Input::all() ) )
		{	
			return Redirect::to('admin/pubdroit/event/'.$id.'/edit')->with('status', 'success');
		}
		else
		{				
			//return Redirect::to('admin/pubdroit/event/'.$id.'/edit')->withInput( Input::all() )->withErrors( $this->validator->errors() );
			return Redirect::to('admin/pubdroit/event/'.$id.'/edit')->withInput( Input::all() )->withErrors( $this->validator->errors() );
		}
		
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
