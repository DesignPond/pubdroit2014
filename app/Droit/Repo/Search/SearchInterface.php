<?php namespace Droit\Repo\Search;

interface SearchInterface {

	// find adresses
	public function find($data);
	public function findAdresse($data);
	
	// find users
	public function findUser($data);
	
	// find with criteres
	public function triage($filters);
	
}

