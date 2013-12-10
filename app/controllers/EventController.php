<?php

use Droit\Repo\Event\EventInterface;
use Droit\Services\Form\Event\EventForm;

class EventController extends BaseController {

	protected $event;
	
	public function __construct(EventInterface $event, EventForm $validator ){
		
		$this->event = $event;
		
		$this->validator = $validator;

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

        return View::make('admin.event')->with( array('events' => $events , 'title' => 'En cours'));
	}
	
	
	/**
	 * Display a listing of the events archived
	 *
	 * @return Response
	 */
	public function archives()
	{
		$events = $this->event->getArchives();	

        return View::make('admin.event')->with( array('events' => $events , 'title' => 'Archives'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.create');
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
        return View::make('events.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('events.edit');
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
