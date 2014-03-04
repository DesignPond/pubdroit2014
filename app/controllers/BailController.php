<?php

use Droit\Repo\Arret\ArretInterface;
use Droit\Repo\Analyse\AnalyseInterface;
use Droit\Repo\Seminaire\SeminaireInterface;
use Droit\Repo\Subject\SubjectInterface;
use Droit\Repo\Categorie\CategorieInterface;
use Droit\Repo\Calculette\CalculetteInterface;

class BailController extends BaseController {


	protected $arret;
	
	protected $categorie;
	
	protected $analyse;
	
	protected $calculette;
	
	protected $seminaire;
	
	protected $subject;
	
	
	public function __construct(ArretInterface $arret,CategorieInterface $categorie,AnalyseInterface $analyse,CalculetteInterface $calculette,SeminaireInterface $seminaire,SubjectInterface $subject)
	{
		
		$this->arret      = $arret;

		$this->categorie  = $categorie;
		
		$this->analyse    = $analyse;
		
		$this->calculette = $calculette;
		
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
        return View::make('bail.index');
	}
	
	public function lois(){
	
		return View::make('bail.lois');	
	}
	
	public function autorites(){
	
		return View::make('bail.autorites');	
	}
	
	public function jurisprudence(){

		$allarrets    = $this->arret->getAll(195);
		$categories   = $this->categorie->getAll(195);
		$allanalyses  = $this->analyse->getAll(195);
   
    	return View::make('bail.jurisprudence')->with( array( 'arrets' => $allarrets , 'analyses' => $allanalyses));	
	}
	
	public function doctrine(){

		$subjects   = $this->subject->getAll();
		$categories = $this->subject->arrangeCategories($subjects);
		$seminaires = $this->seminaire->getAll();
   
    	return View::make('bail.doctrine')->with( array( 'seminaires' => $seminaires ,'subjects' => $categories ));	
	}
	
	public function search(){
    	
    	$query = Request::get('q');
    	
    	$resultats = array();
    	
    	return View::make('bail.search')->with( array( 'resultats' => $query ));	
	}
	
	public function calcul(){
		
		return View::make('bail.calcul')->with( array( ));			
	}
	
	public function loyer(){
	
		$calcul = array();
		$data   = Input::all();
		
		if(!empty( $data ))
		{
			$canton = Input::get('canton');
			$date   = strtotime(Input::get('date'));
			$loyer  = Input::get('loyer');
			
			$calcul = $this->calculette->calculer($canton, $date , $loyer);
		}
		
		return $calcul;
	}

	/*==============================================
		ADMINISTRATION FUNCTIONS
	===============================================*/

	/**
	 * Show list of arrets for admin
	 *
	 * @return Response
	 */
	public function arrets()
	{
		$arrets     = $this->arret->getAll(195);
		$categories = $this->categorie->getAll(195);
		$analyses   = $this->analyse->getAll(195);
   
    	return View::make('admin.arrets.index')->with( array( 'arrets' => $arrets , 'categories' => $categories , 'analyses' => $analyses , 'pid' => 195 ) );	
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
