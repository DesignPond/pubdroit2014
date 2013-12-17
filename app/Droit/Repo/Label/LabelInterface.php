<?php namespace Droit\Repo\Label;

interface LabelInterface {
	
	public function getAll();
	public function getArchives();
	public function find($id);
	public function create(array $data);
	public function update(array $data);
	
}

