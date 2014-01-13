<?php namespace Droit\Repo\Calculette;

interface CalculetteInterface {
	
	public function calcul($canton, $date_depart, $loyer_actuel);
	public function taux_depart($date_depart,$canton);
	public function taux_actuel();
	public function ipc_depart($date_depart);
	public function ipc_actuel();
	
}

