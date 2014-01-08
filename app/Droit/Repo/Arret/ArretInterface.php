<?php namespace Droit\Repo\Arret;

interface ArretInterface {
	
	public function getAll($pid);
	public function find($id);
	public function create(array $data);
	public function update(array $data);
	
}

