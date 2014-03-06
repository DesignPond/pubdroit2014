<?php namespace Droit\Repo\Arret;

interface ArretInterface {
	
	public function getAll($pid);
	public function getAllList($pid, $column);
	public function find($id);
	public function isMain($arrets);
	public function create(array $data);
	public function update(array $data);
	
}

