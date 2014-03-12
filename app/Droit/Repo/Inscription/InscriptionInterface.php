<?php namespace Droit\Repo\Inscription;

interface InscriptionInterface {
	
	public function getAll();
	public function find($id);
	public function getLast($nbr);
	public function getEvent($event);
	public function getForUser($user);	
	
	public function create(array $data);
	public function update(array $data);
	
}

