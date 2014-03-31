<?php namespace Droit\Repo\Event;

interface EventInterface {
	
	public function getActifs();
	public function getArchives();
	public function find($id);
	public function getLast($nbr);	
	public function create(array $data);
	public function update(array $data);
	
	// Files	
	public function setFiles($list,$documents);
	
	// Emails	
	public function getEmail($type,$event);
	public function createEmail($data);
	
	// Attestations	
	public function getAttestation($event);
	public function createAttestation($data);
	
}

