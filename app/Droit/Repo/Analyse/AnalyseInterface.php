<?php namespace Droit\Repo\Analyse;

interface AnalyseInterface {
	
	public function getAll($pid);
	public function find($id);
	public function create(array $data);
	public function update(array $data);
	
}

