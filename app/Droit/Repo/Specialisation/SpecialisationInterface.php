<?php namespace Droit\Repo\Specialisation;

interface SpecialisationInterface {
	
	public function getAll();
	public function find($id);
	public function delete($id);
	public function create(array $data);
	public function update(array $data);
	
}