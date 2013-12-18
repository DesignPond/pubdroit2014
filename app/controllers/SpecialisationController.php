<?php

use Droit\Repo\Specialisation\SpecialisationInterface;
use Droit\Service\Form\Specialisation\SpecialisationValidator as SpecialisationValidator;

class SpecialisationController extends BaseController {

	protected $specialisation;
	
	// Class expects an Eloquent model
	public function __construct(SpecialisationInterface $specialisation)
	{
		$this->specialisation = $specialisation;	
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$specialisations = $this->specialisation->getAll();
		
        return View::make('admin.specialisation.index')->with( array('specialisations' => $specialisations ));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('admin.specialisation.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$specialisationValidator = SpecialisationValidator::make(Input::all());
		
		if ($specialisationValidator->passes()) 
		{
			$this->specialisation->create(Input::all());
			
			return Redirect::to('admin/pubdroit/specialisation')->with( array('status' => 'success' , 'message' => 'La spécialisation à été crée' ) );
		}
		
		return Redirect::to('admin/pubdroit/specialisation/create')->withErrors( $specialisationValidator->errors() )->withInput( Input::all() ); 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('admin.specialisation.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$specialisation = $this->specialisation->find($id);
		
        return View::make('admin.specialisation.edit')->with( array('specialisation' => $specialisation ));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$specialisationValidator = SpecialisationValidator::make(Input::all());
		
		if ($specialisationValidator->passes()) 
		{
			$this->specialisation->update(Input::all());
			
			return Redirect::to('admin/pubdroit/specialisation')->with( array('status' => 'success' , 'message' => 'La spécialisation a été modifiée' ) );
		}
		
		return Redirect::to('admin/pubdroit/specialisation/'.$id.'/edit')->withErrors( $specialisationValidator->errors() )->withInput( Input::all() ); 
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if( $this->specialisation->delete($id) )
		{
			return Redirect::to('admin/pubdroit/specialisation')->with( array('status' => 'success' , 'message' => 'La spécialisation a été supprimée') );
		}
		
		return Redirect::to('admin/pubdroit/specialisation')->with( array('status' => 'error' , 'message' => 'Problème avec la suppression') );
	}

}
