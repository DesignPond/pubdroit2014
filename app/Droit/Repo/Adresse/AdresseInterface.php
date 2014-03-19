<?php namespace Droit\Repo\Adresse;

interface AdresseInterface {

	public function getAll();
	/**
	 * Return all infos of the user
	 *
	 * @return stdObject Collection of users
	 */
	public function find($data);
	public function getLast($nbr);	
	
	public function isUser($adresse);
	public function adresseUser($user_id);
	public function infosIfUser($user_id);
	public function typeAdresse($adresse);
	
	public function create(array $data);
	public function update(array $data);
	public function delete($id);
	
	// Ajax call
	public function get_ajax( $columns , $sEcho , $iDisplayStart , $iDisplayLength , $sSearch = NULL );

}
