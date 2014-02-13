<?php namespace Droit\Repo\File;

interface FileInterface {
	
	public function getAllForEvent($event);
	public function find($id);
	public function create(array $data);
	public function update(array $data);
	public function delete($id);
	
	/* File manipulation */
	public function directory_map($directory , array $extension);
}

