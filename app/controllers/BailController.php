<?php

class BailController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('bail.index');
	}
	
	public function lois(){
	
		return View::make('bail.lois');	
	}
	
	public function autorites(){
	
		return View::make('bail.autorites');	
	}
	
	public function jurisprudence(){
    
    	return View::make('bail.jurisprudence');	
	}
	
	public function doctrine(){
    
    	return View::make('bail.doctrine');	
	}
	
	public function search(){
    	
    	$query = Request::get('q');
    	
    	$resultats = array();
    	
    	return View::make('bail.search')->with( array( 'resultats' => $query ));	
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('bails.create');
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
        return View::make('bails.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('bails.edit');
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
