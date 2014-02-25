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
				$data = $this->adresse->where('user_id','=',0)->where(function($query) use( $sSearch )
						             {
						                $query->orWhere('prenom', '    LIKE',  '"%Cindy%"');
						                $query->orWhere('nom',        'LIKE',  '"%Cindy%"');
						             })->get();	
				return $data;
	}
	
	public function get_ajax( $columns , $sEcho , $iDisplayStart , $iDisplayLength , $sSearch = NULL){
	
		if($sSearch)
		{
			$data = $this->adresse->where('user_id','=',0)->where(function($query) use( $sSearch )
						             {
						                $query->orWhere('prenom', '    LIKE',  '"%'.$sSearch.'%"');
						                $query->orWhere('nom',        'LIKE',  '"%'.$sSearch.'%"');
						                $query->orWhere('entreprise', 'LIKE',  '"%'.$sSearch.'%"');
						                $query->orWhere('adresse',    'LIKE',  '"%'.$sSearch.'%"');
						             })
						             ->take($iDisplayLength)->skip($iDisplayStart)->get();	
		}
		else
		{
			$data = $this->adresse->where('user_id','=',0)->take($iDisplayLength)->skip($iDisplayStart)->get();	
		}
		
		$iTotal   = $this->adresse->where('user_id','=',0)->get()->count();

		$output = array(
			"sEcho"                => $sEcho,
			"iTotalRecords"        => $iDisplayLength,
			"iTotalDisplayRecords" => $iTotal,
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
