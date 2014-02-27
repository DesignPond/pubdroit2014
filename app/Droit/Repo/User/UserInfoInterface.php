<?php namespace Droit\Repo\User;

interface UserInfoInterface {

	/**
	 * Return all infos of the user
	 *
	 * @return stdObject Collection of users
	 */
	 
	public function getAll();
	
	public function find($id);
	
	// Ajax call
	public function get_ajax( $columns , $sEcho , $iDisplayStart , $iDisplayLength , $sSearch = NULL );
	
	public function findWithInscription($id,$event);
	
	public function eventOptions($user,$event);
	
	public function whatTitle($title);

}
