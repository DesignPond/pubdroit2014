<?php

use Droit\Repo\Analyse\AnalyseInterface;
use Droit\Repo\Arret\ArretInterface;
use Droit\Repo\Categorie\CategorieInterface;

class AnalysesController extends BaseController {

	protected $categorie;
	
	protected $analyse;
	
	protected $arret;
	
	public function __construct( ArretInterface $arret , CategorieInterface $categorie , AnalyseInterface $analyse ){
		
		$this->categorie  = $categorie;
		
		$this->analyse    = $analyse;

		$this->arret      = $arret;
							
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($pid)
	{
		$categories = $this->categorie->getAll($pid);
		$arrets     = $this->arret->getAllList( $pid, 'reference' );
		
        return View::make('admin.analyses.create')->with( array( 'pid' => $pid , 'categories' => $categories , 'arrets' => $arrets  ) );
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
        $analyse    = $this->analyse->find($id)->first();
        $pid        = $analyse->pid;
		$categories = $this->categorie->getAll($pid);
		
        return View::make('admin.analyses.show')->with( array( 'analyse' => $analyse , 'categories' => $categories) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
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