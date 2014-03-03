<?php namespace Droit\Repo\Adresse;

use Droit\Repo\Adresse\AdresseInterface;
use Droit\Repo\User\UserInfoInterface;

use Adresses as M;
use User_membres as UM;
use User_specialisations as US;

class AdresseEloquent implements AdresseInterface{

	protected $adresse;

	/**
	 * Construct a new SentryUser Object
	 */
	public function __construct(M $adresse)
	{
		$this->adresse = $adresse;
	}
	
	public function getAll(){
		
		return $this->adresse->where('user_id','=',0)->take(10)->skip(0)->get();	
	}
	
	public function test($sSearch){
	
		$iTotal = $this->adresse->where('user_id','=',0)->take(10)->skip(0)->get();
	
		/*
		$data  = $this->adresse->where('user_id','=',0)
								->whereRaw('( prenom LIKE "%'.$sSearch.'%" OR nom LIKE "%'.$sSearch.'%" OR entreprise LIKE "%'.$sSearch.'%" OR adresse LIKE "%'.$sSearch.'%" )')
								->take(10)
								->get();
								    
		$iTotalDisplayRecords  = $this->adresse->where('user_id','=',0)
								->whereRaw('( prenom LIKE "%'.$sSearch.'%" OR nom LIKE "%'.$sSearch.'%" OR entreprise LIKE "%'.$sSearch.'%" OR adresse LIKE "%'.$sSearch.'%" )')
								->get()
								->count();	
		*/						             
		
		return $iTotal;

	}
	
	public function get_ajax( $columns , $sEcho , $iDisplayStart , $iDisplayLength , $sSearch = NULL){
			
		
		$iTotal = $this->adresse->where('user_id','=',0)->get()->count();
		
		if($sSearch)
		{
			$data = $this->adresse->where('user_id','=',0)
								  ->whereRaw('( prenom LIKE "%'.$sSearch.'%" OR nom LIKE "%'.$sSearch.'%" OR entreprise LIKE "%'.$sSearch.'%" OR adresse LIKE "%'.$sSearch.'%" )')
								  ->take($iDisplayLength)
								  ->skip($iDisplayStart)
								  ->get();
								    
			$iTotalDisplayRecords = $this->adresse->where('user_id','=',0)
								  ->whereRaw('( prenom LIKE "%'.$sSearch.'%" OR nom LIKE "%'.$sSearch.'%" OR entreprise LIKE "%'.$sSearch.'%" OR adresse LIKE "%'.$sSearch.'%" )')
								  ->get()
								  ->count();	
		}
		else
		{
			$data = $this->adresse->where('user_id','=',0)->take($iDisplayLength)->skip($iDisplayStart)->get();
			
			$iTotalDisplayRecords = $iTotal;	
		}

		$output = array(
			"sEcho"                => $sEcho,
			"iTotalRecords"        => $iTotal,
			"iTotalDisplayRecords" => $iTotalDisplayRecords,
			"aaData"               => array()
		);
		
		$adresses = $data->toArray();
		
		foreach($adresses as $adresse)
		{
			$row = array();
			
			foreach($adresse as $col => $info)
			{
				if( in_array($col, $columns) )
				{
					$row[] = $info;
				}	
			}
			
			$row['options'] = '<a class="btn btn-info edit_btn" type="button" href="'.url('admin/adresses/'.$adresse['id']).'">&Eacute;diter</a> ';
			// Reste keys
			$row = array_values($row);

			$output['aaData'][] = $row;
		}
		
		return json_encode( $output );
		
	}
	
	/**
	 * Return all adresse of the user 
	 *
	 * @return stdObject users
	 */
	public function find($id){
				
		return $this->adresse->findOrFail($id);													
	}

	/**
	 * Return if adresse is linked to user
	 *
	 * @return user id
	 */	
	public function isUser($adresse){
		
		$infos = $this->adresse->findOrFail($adresse);
		
		return $infos->user_id;			
	}

	/**
	 * Return type of adresse
	 *
	 * @return utype
	 */		
	public function typeAdresse($adresse){
	
		$infos = $this->adresse->findOrFail($adresse);
		
		return $infos->type;			
	}
	
	/**
	 * Return all memberships for adresse
	 *
	 * @return stdObject Collection of users
	 */	
	public function members($id){
				
		return UM::where( 'adresse_id', '=' , $id)->join('membres', function($join)
        {
            $join->on('user_membres.membre_id', '=', 'membres.id');
        })->get();													
	}
	
	/**
	 * Return all memberships for adresse
	 *
	 * @return stdObject Collection of users
	 */	
	public function specialisations($id){
				
		return US::where( 'adresse_id', '=' , $id)->join('specialisations', function($join)
        {
            $join->on('user_specialisations.specialisation_id', '=', 'specialisations.id');
        })->get();														
	}
					
}
