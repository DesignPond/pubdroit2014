<?php

use Droit\Repo\Arret\ArretInterface;
use Droit\Repo\Analyse\AnalyseInterface;
use Droit\Repo\Seminaire\SeminaireInterface;
use Droit\Repo\Subject\SubjectInterface;
use Droit\Repo\Categorie\CategorieInterface;

class ArretsController extends BaseController {

	protected $arret;
	
	protected $categorie;
	
	protected $analyse;
	
	protected $seminaire;
	
	protected $subject;	
	
	public function __construct(ArretInterface $arret , CategorieInterface $categorie , AnalyseInterface $analyse , SeminaireInterface $seminaire , SubjectInterface $subject){
		
		$this->arret      = $arret;

		$this->categorie  = $categorie;
		
		$this->analyse    = $analyse;
		
		$this->seminaire  = $seminaire;
		
		$this->subject    = $subject;					
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		
		$allarrets    = $this->arret->getAll(195);
		$categories   = $this->categorie->getAll(195);
		$allanalyses  = $this->analyse->getAll(195);
			
		return View::make('admin.arrets.index');
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($pid)
	{
		$categories = $this->categorie->getAll($pid);
		
        return View::make('admin.arrets.create')->with( array( 'pid' => $pid , 'categories' => $categories ) );
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
		$arret      = $this->arret->find($id)->first();
		$categories = $this->categorie->getAll(207);
		
        return View::make('admin.arrets.show')->with( array( 'arret' => $arret , 'categories' => $categories) );
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
