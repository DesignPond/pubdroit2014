<?php namespace Droit\Service\Generate;

class GenerateWorker implements GenerateInterface {
	
	protected $pdf;

	public function __construct()
	{
		$this->pdf = \App::make('dompdf');
	}
		
	/*
	 * Arrange infos for pdf for view 
	 * @return instance
	*/		
	public function arrange($event,$user,$infos){
		
		$data = array();
		
		$config = $event->event_config;
		
		if($config)
		{
			$data['organisateur'] = $config;
		}
		else
		{
			$data['organisateur'] = $infos;
		}
		
		
		$inscription = $user->inscription->first()->toArray();
		$idprice     = $inscription['price_id'];
		$prices      = $event->prices;
		$all         = $prices->toArray();
		
		$arrangePrices = array();
		
		if(!empty($all)){
			foreach($all as $price){
				$arrangePrices[$price['id']] = $price;
			}
		}
		
		$data['price'] = $arrangePrices[$idprice];
		$data['user']  = $user->adresses;
		
	}
		
	/*
	 * generate pdf 
	 * @return instance
	*/	
	public function generate($view , $data , $name , $path , $write = NULL){
		
		$pdf = $this->pdf->loadView($view , $data);	
		
		if($write)
		{
			return $pdf->save( getcwd().'/files/'.$path.'/'.$name.'.pdf');
		}
		else
		{
			return $pdf->download( $name.'.pdf');
		}
				
	}

}