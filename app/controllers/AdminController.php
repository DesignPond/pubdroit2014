<?php

use Droit\Repo\Event\EventInterface;
use Droit\Service\Form\Event\EventForm;
use Droit\Service\File\FileInterface;

class AdminController extends BaseController {

	protected $event;
	
	protected $file;
	
	public function __construct(EventInterface $event,FileInterface $file){
		
		$this->event = $event;
		
		$this->file  = $file;
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
	
	
	public function upload(){
    	
    	$destination = Input::get('destination');
    	
    	return $this->file->upload( Input::file('file') , $destination );   	
    	
	}
	
	public function files(){
    
    	return View::make('admin.upload');
    
	}
	

}
