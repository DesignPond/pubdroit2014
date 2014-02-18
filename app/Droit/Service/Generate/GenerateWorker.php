<?php namespace Droit\Service\Generate;

use Droit\Repo\Price\PriceInterface;
use Droit\Repo\Compte\CompteInterface;
use Droit\Repo\File\FileInterface;
use Droit\Repo\User\UserInfoInterface;

class GenerateWorker implements GenerateInterface {
	
	protected $pdf;
	
	protected $price;
	
	protected $compte;
	
	protected $files;
	
	protected $event;

	public function __construct(PriceInterface $price , CompteInterface $compte ,FileInterface $files , UserInfoInterface $user)
	{
		$this->pdf    = \App::make('dompdf');
		
		$this->price  = $price;
		
		$this->compte = $compte;
		
		$this->files  = $files;
		
		$this->user   = $user;
		
	}
		
	/*
	 * Arrange infos for pdf for view 
	 * @return instance
	*/		
	public function arrange($event, $user, $infos, $attestation = NULL){
		
		$data = array();
		
		$event_id = $event->id;
		
		// organisator infos if exist
		$config = $event->event_config;
		$files  = $event->files;
		$infos  = $infos->first()->toArray();		
		$carte  = $this->files->getFilesEvent($event_id,'carte')->first()->toArray();	
		
		$vignette      = $this->files->getFilesEvent($event_id,'vignette');		
		$organisateur  = (!empty($config) ? $config->toArray() : $infos);
		
		// Logos for the pdfs
		if( ! $vignette->isEmpty() )
		{
			$logo = $vignette->first()->toArray();
			$data['logo'] = getcwd().'/files/vignette/'.$logo['filename'];  
		}
		else if(!empty($config))
		{
			$logo = $config->toArray();
			$data['logo'] = getcwd().'/images/'.$logo['logo'];  
		}
		else
		{
			$data['logo'] = getcwd().'/images/'.$infos['logo']; 
		}
		
		// inscription price
		$inscription = $user->inscription->first()->toArray();
		$idprice     = $inscription['price_id'];
		
		// Factures info if exist
		$compte_id   = $event->compte_id;
		$compte      = $this->compte->find($compte_id);
		
		// Attestation
		if($attestation){
			$data['attestation']  = $attestation->toArray();	
		}
		
		// Civilites
		$user_infos = $user->adresses->first()->toArray();
		$civilite   = $this->user->whatTitle($user_infos['civilite']);
		
		$data['civilite']     = $civilite;
		$data['organisateur'] = $organisateur;	
		$data['carte']        = getcwd().'/files/carte/'.$carte['filename'];	
		$data['compte']       = $compte->toArray();;
		$data['price']        = $this->price->find($idprice)->toArray();
		$data['user']         = $user_infos;
		$data['event']        = $event->toArray();
		$data['inscription']  = $inscription;
		
		return $data;	
			
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