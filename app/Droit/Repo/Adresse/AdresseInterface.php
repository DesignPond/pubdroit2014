<?php namespace Droit\Repo\Adresse;

interface AdresseInterface {

	/**
	 * Return all infos of the user
	 *
	 * @return stdObject Collection of users
	 */
	public function find($data);

}
