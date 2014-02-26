<?php namespace Droit\Repo\Adresse;

use Droit\Repo\Adresse\AdresseInterface;
use Adresses as M;

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
		
		return $this->adresse->where('user_id','=',0)->take(100)->skip(0)->get();	
	}
	
	public function test($sSearch){
	
		$data  = $this->adresse->where('user_id','=',0)
								->whereRaw('( prenom LIKE "%'.$sSearch.'%" OR nom LIKE "%'.$sSearch.'%" OR entreprise LIKE "%'.$sSearch.'%" OR adresse LIKE "%'.$sSearch.'%" )')
								->take(10)
								->get();
								    
		$iTotalDisplayRecords  = $this->adresse->where('user_id','=',0)
								->whereRaw('( prenom LIKE "%'.$sSearch.'%" OR nom LIKE "%'.$sSearch.'%" OR entreprise LIKE "%'.$sSearch.'%" OR adresse LIKE "%'.$sSearch.'%" )')
								->get()
								->count();	
						             
		return $iTotalDisplayRecords;
	}
	
	public function get_ajax( $columns , $sEcho , $iDisplayStart , $iDisplayLength , $sSearch = NULL){
	
		$iTotal   = $this->adresse->where('user_id','=',0)->get()->count();
		
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

			$output['aaData'][] = $row;
		}
		
		return json_encode( $output );
		
	}
	/**
	 * Return all infos of the user with insciption
	 *
	 * @return stdObject Collection of users
	 */
	public function find($id){
				
		return $this->adresse->findOrFail($id);													
	}
					
}
