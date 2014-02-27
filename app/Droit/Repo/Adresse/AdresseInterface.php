<?php namespace Droit\Repo\Adresse;

interface AdresseInterface {

	public function getAll();
	/**
	 * Return all infos of the user
	 *
	 * @return stdObject Collection of users
	 */
	public function find($data);
	
	// Ajax call
	public function get_ajax( $columns , $sEcho , $iDisplayStart , $iDisplayLength , $sSearch = NULL );

}
