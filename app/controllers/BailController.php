<?php

use Droit\Repo\Arret\ArretInterface;
use Droit\Repo\Categorie\CategorieInterface;
use Droit\Repo\Calculette\CalculetteInterface;

class BailController extends BaseController {

	protected $arret;
	
	public function __construct( ArretInterface $arret, CategorieInterface $categorie, CalculetteInterface $calculette )
	{
		
		$this->arret      = $arret;
		
		$this->categorie  = $categorie;
		
		$this->calculette = $calculette;

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
	
		$allarrets  = $this->arret->getAll(195);
		$categories = $this->categorie->getAll(195);
    
    	return View::make('bail.jurisprudence')->with( array( 'arrets' => $allarrets ));	
	}
	
	public function doctrine(){
    
    	return View::make('bail.doctrine');	
	}
	
	public function search(){
    	
    	$query = Request::get('q');
    	
    	$resultats = array();
    	
    	return View::make('bail.search')->with( array( 'resultats' => $query ));	
	}
	
	public function calcul(){
		
		$taux_depart = $this->calculette->taux_depart(1225494000,'be');
		$taux_actuel = $this->calculette->taux_actuel();
		
		$ipc_depart  = $this->calculette->ipc_depart(1225494000);
		$ipc_actuel  = $this->calculette->ipc_actuel();
		
		$calcul      = $this->calculette->calcul('be', 1225494000 , 620); 
		
		return View::make('bail.calcul')->with( array('taux_depart' => $taux_depart ,'taux_actuel' => $taux_actuel,'ipc_depart' => $ipc_depart ,'ipc_actuel' => $ipc_actuel,'calcul' => $calcul ));	
		
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
