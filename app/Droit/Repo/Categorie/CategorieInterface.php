<?php namespace Droit\Repo\Categorie;

interface CategorieInterface {
	
	public function getAll($pid);
	public function find($id);
	public function create(array $data);
	public function update(array $data);
	
}
