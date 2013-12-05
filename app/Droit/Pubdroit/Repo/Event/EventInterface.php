<?php namespace Droit\Repo\Event;

interface EventInterface {
	
	public function getAll();
	public function find($id);
	public function getLast($nbr);	
	public function create(array $data);
	public function update(array $data);
	
}

