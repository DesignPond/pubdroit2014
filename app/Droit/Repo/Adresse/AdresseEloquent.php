<?php namespace Droit\Repo\Adresse;

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

	/**
	 * Return all infos of the user with insciption
	 *
	 * @return stdObject Collection of users
	 */
	public function find($id){
				
		return $this->adresse->findOrFail($id);													
	}
					
}
