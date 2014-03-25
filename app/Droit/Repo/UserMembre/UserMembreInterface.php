<?php namespace Droit\Repo\UserMembre;

interface UserMembreInterface {
	
	public function find($membre,$adresse_id);
	public function addToUser($membre,$adresse_id);
	public function remove($id);
	
	public function test();
	
}