<?php namespace Droit\Repo\User;

use User as M;
use Civilites as Civilites;
use Event_options_user;

class UserInfoEloquent implements UserInfoInterface{

	protected $user;

	/**
	 * Construct a new SentryUser Object
	 */
	public function __construct(M $user)
	{
		$this->user = $user;
	}
	
	public function getAll(){
		
		return $this->user->with( array('adresses') )->get();
	}
		
	/*
	 * Ajax call for datatable
	 *
	*/
	public function get_ajax( $columns , $sEcho , $iDisplayStart , $iDisplayLength , $sSearch = NULL ){
	
		$iTotal   = $this->user->get()->count();
		
		if($sSearch)
		{
			$data = $this->user->with( array('adresses') )
							   ->whereRaw('( prenom LIKE "%'.$sSearch.'%" OR nom LIKE "%'.$sSearch.'%" )')
							   ->take($iDisplayLength)
							   ->skip($iDisplayStart)
							   ->get();
								    
			$iTotalDisplayRecords = $this->user->whereRaw('( prenom LIKE "%'.$sSearch.'%" OR nom LIKE "%'.$sSearch.'%" )')
											   ->get()
											   ->count();	
		}
		else
		{
			$data = $this->user->with( array('adresses') )->take($iDisplayLength)->skip($iDisplayStart)->get();
			
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
			
			foreach($adresse as $info)
			{
				$row['email']  = "<a href=".url('admin/users/'.$adresse['id']).">".$adresse['email'].'</a>';
				$row['prenom'] = $adresse['prenom'];
				$row['nom']    = $adresse['nom'];

				if( $adresse['activated'] == 1 ) { $row['activated'] = 'Active'; } else{ $row['activated'] = 'Inactive'; } 
				
				$options = '';
				
				if( isset($adresse['adresses']) ){
				
						$options .= '<div class="list-group">';
						
						foreach($adresse['adresses'] as $adre)
						{
						
							if($adre['type'] == '1'){
								$options .= '<a href="'.url('admin/users/'.$adre['id']).'" class="list-group-item"><i class="fa fa-envelope"></i>&nbsp;&nbsp;Contact</a>';
							}
							
							if($adre['type'] == '2'){
								$options .= '<a href="'.url('admin/users/'.$adre['id']).'" class="list-group-item"><i class="fa fa-home"></i>&nbsp;&nbsp;Privé</a>';
							}
							
							if($adre['type'] == '3'){
								$options .= '<a href="'.url('admin/users/'.$adre['id']).'" class="list-group-item"><i class="fa fa-briefcase"></i>&nbsp;&nbsp;Professionnelle</a>';
							}							
						}
						
						$options .= '</div>';
				}
				
				
				$row['adresses'] = $options;
				$row['options']  = '<a class="btn btn-info edit_btn" type="button" href="'.url('admin/users/'.$adresse['id']).'">&Eacute;diter</a> ';
			}
			
			$row = array_values($row);

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
				
		return $this->user->where('id','=',$id)->with( array('adresses' , 'groups') )->first();														
	}
	

	/**
	 * Return adresse id type contact
	 *
	 * @return stdObject Collection of users
	 */
	public function findAdresseContact($id){
				
		return $this->user->where('id','=',$id)->with( array('adresses'=> function($query)
					{
					    $query->where('adresses.type', '=', 1);
					    
					}) )->get();														
	}
				
	/**
	 * Return all infos of the user with insciption
	 *
	 * @return stdObject Collection of users
	 */
	public function findWithInscription($id,$event){
				
		return $this->user
					->where('id','=',$id)
					->with( array('inscription' => function($query)use($event,$id){ 
										$query->where('inscriptions.event_id','=',$event)->where('inscriptions.user_id','=',$id); },
								  'adresses'    => function($query){ 
										$query->where('adresses.livraison','=',1); }) )
					->first();													
	}

	/**
	 * Return the name of the title (civilité)
	 *
	 * @return stdObject Collection of users
	 */	
	public function whatTitle($title){
		
		$civilites = \Civilites::all()->lists('title','id');
		
		return $civilites[$title];		
	}

	/**
	 * Return all options for user for an event
	 *
	 * @return stdObject Collection
	 */		
	public function eventOptions($user,$event){
		
		return \Event_options_user::join('event_options', 'event_options.id', '=','event_option_user.event_option_id')
									->where('event_options.event_id','=',$event)
									->where('user_id','=',$user)
									->get();
	}
	
}
