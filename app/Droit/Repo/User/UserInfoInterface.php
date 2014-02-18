<?php namespace Droit\Repo\User;

interface UserInfoInterface {

	/**
	 * Return all infos of the user
	 *
	 * @return stdObject Collection of users
	 */
	public function find($id);
	
	public function findWithInscription($id,$event);
	
	public function whatTitle($title);

}
