<?php namespace Droit\Repo\User;

interface UserInfoInterface {

	/**
	 * Return all infos of the user
	 *
	 * @return stdObject Collection of users
	*/
	 
	public function getAll();
	public function getLast($nbr);		
	public function find($id);	
	public function create(array $data);
	public function update(array $data);
	public function delete($id);	
	
	public function activate($id);	
	public function updateColumn($id,$column,$value);	
	public function getColumnValue($column,$value);
	public function findAdresseContact($id , $onlyId);	
	
	// Ajax call
	
	public function get_ajax( $columns , $sEcho , $iDisplayStart , $iDisplayLength , $sSearch = NULL );
	
	// for events
	
	public function findWithInscription($id,$event);	
	public function eventOptions($user,$event);

}
