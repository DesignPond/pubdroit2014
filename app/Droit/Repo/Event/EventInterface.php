<?php namespace Droit\Repo\Event;

interface EventInterface {
	
	public function getActifs();
	public function getArchives();
	public function find($id);
	public function getLast($nbr);	
	public function create(array $data);
	public function update(array $data);
	
}

