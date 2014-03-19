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
		
	public function getLast($nbr){
	
		return $this->adresse->orderBy('id', 'DESC')->take($nbr)->skip(0)->get();	
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
	
	public function create(array $data){

		$adresse = $this->adresse->create(array(
			'civilite'   => $data['civilite'],
			'prenom'     => $data['prenom'],
			'nom'        => $data['nom'],
			'email'      => $data['email'],
			'entreprise' => $data['entreprise'],
			'fonction'   => $data['fonction'],
			'profession' => $data['profession'],
			'telephone'  => $data['telephone'],
			'mobile'     => $data['mobile'],
			'fax'        => $data['fax'],
			'adresse'    => $data['adresse'],
			'cp'         => $data['cp'],
			'complement' => $data['complement'],
			'npa'        => $data['npa'],
			'ville'      => $data['ville'],
			'canton'     => $data['canton'],
			'pays'       => $data['pays'],
			'type'       => $data['type'],
			'user_id'    => $data['user_id'],
			'livraison'  => $data['livraison'],
			'deleted'    => $data['deleted'],
			'created_at' => date('Y-m-d G:i:s'),
			'updated_at' => date('Y-m-d G:i:s')
		));
		
		if( ! $adresse )
		{
			return false;
		}
		
		return true;
		
	}
	
	public function update(array $data){
		
		$adresse = $this->adresse->findOrFail($data['id']);	
		
		if( ! $adresse )
		{
			return false;
		}
		
		// Général
		$adresse->civilite    = $data['civilite'];
		$adresse->prenom      = $data['prenom'];
		$adresse->nom         = $data['nom'];
		$adresse->email       = $data['email'];
		$adresse->entreprise  = $data['entreprise'];
		$adresse->fonction    = $data['fonction'];
		$adresse->profession  = $data['profession'];
		$adresse->telephone   = $data['telephone'];
		$adresse->mobile      = $data['mobile'];
		$adresse->fax         = $data['fax'];
		$adresse->adresse     = $data['adresse'];
		$adresse->cp          = $data['cp'];
		$adresse->complement  = $data['complement'];
		$adresse->npa         = $data['npa'];
		$adresse->ville       = $data['ville'];
		$adresse->canton      = $data['canton'];
		$adresse->pays        = $data['pays'];
		$adresse->type        = $data['type'];
		$adresse->user_id     = $data['user_id'];
		$adresse->updated_at  = date('Y-m-d G:i:s');	
		
		$adresse->save();	
		
		return true;		
	}
	
	/**
	 * Tests
	*/	
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
					
}
