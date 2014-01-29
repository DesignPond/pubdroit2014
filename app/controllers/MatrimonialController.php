<?php

use Droit\Repo\Arret\ArretInterface;
use Droit\Repo\Analyse\AnalyseInterface;
use Droit\Repo\Categorie\CategorieInterface;


class MatrimonialController extends BaseController {

	protected $arret;
	
	protected $categorie;
	
	protected $analyse;
	
	public function __construct( ArretInterface $arret, CategorieInterface $categorie, AnalyseInterface $analyse )
	{
		
		$this->arret      = $arret;

		$this->categorie  = $categorie;

		$this->analyse    = $analyse;

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('matrimonial.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('matrimonial.create');
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
	
	public function test()
	{
		$arrets       = $this->arret->getAll(207);
		$categories   = $this->categorie->getAll(207);
		$allanalyses  = $this->analyse->getAll(207);
		
		$arrArrange   = $this->arret->isMain($arrets);
			
		$categories   = $this->categorie->categories($categories);
		
		//return $allarrets;
   
    	return View::make('matrimonial.test')->with( array( 'arrets' => $arrArrange , 'categories' => $categories) );	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('matrimonial.show');
	}
	
		
	public function jurisprudence(){

		$allarrets    = $this->arret->getAll(207);
		$categories   = $this->categorie->getAll(207);
		$allanalyses  = $this->analyse->getAll(207);
   
    	return View::make('matrimonial.jurisprudence')->with( array( 'arrets' => $allarrets , 'allanalyses' => $allanalyses , 'categories' => $categories));	
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('matrimonials.edit');
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
