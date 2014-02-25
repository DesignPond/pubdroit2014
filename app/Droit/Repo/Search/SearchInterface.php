<?php namespace Droit\Repo\Search;

interface SearchInterface {

	public function find($data);
	public function triage($filters);
	
}

