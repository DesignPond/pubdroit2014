<?php namespace Droit\Repo\Adresse;

interface AdresseInterface {

	public function getAll();
	/**
	 * Return all infos of the user
	 *
	 * @return stdObject Collection of users
	 */
	public function find($data);

}
