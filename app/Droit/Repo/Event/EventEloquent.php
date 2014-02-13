<?php namespace Droit\Repo\Event;

use Droit\Repo\Event\EventInterface;
use Events as M;
use Event_emails as EM;
use Event_attestations as EA;

class EventEloquent implements EventInterface {

	protected $event;
	
	protected $today;
	
	// Class expects an Eloquent model
	public function __construct(M $event)
	{
		$this->event = $event;	
		
		$this->today = date("Y-m-d");	
	}
	
	public function getLast($nbr){
	
		return $this->event->orderBy('id', 'DESC')->take($nbr)->skip(0)->get();	
	}
	
	/*
	 * CRUD functions
	*/
		
	public function getActifs(){
		
		return $this->event->where('dateDebut','>=',$this->today)->get();		
	}
	
		
	public function getArchives(){
		
		return $this->event->where('dateDebut','<',$this->today)->get();		
	}
		
	public function find($id){
		
		return $this->event->with( array('prices'=> function($query)
													{
													    $query->orderBy('prices.rangPrice');
													}, 'event_options','event_specialisations','files') )->findOrFail($id);			
	}
	
	public function setFiles($list,$documents){
		
		$arranged = array();
		$files    = $list->files;
		
		foreach($documents as $type => $docs)
		{
			foreach($files as $file)
			{
				if(in_array($file->typeFile,$docs))
				{
					$arranged[$type][$file->typeFile] = $file;
				}
			}
		}
		
		return $arranged;
	}
	
	public function create(array $data){

		$event = $this->event->create(array(
			'organisateur' => $data['organisateur'],
			'titre'        => $data['titre'],
			'soustitre'    => $data['soustitre'],
			'sujet'        => $data['sujet'],
			'description'  => $data['description'],
			'endroit'      => $data['endroit'],
			'dateDebut'    => $data['dateDebut'],
			'dateFin'      => $data['dateFin'],
			'dateDelai'    => $data['dateDelai'],
			'remarques'    => $data['remarques']
		));
		
		if( ! $event )
		{
			return false;
		}
		
		return true;

	}
	
	public function update(array $data){
		
		$event = $this->event->findOrFail($data['id']);	
		
		if( ! $event )
		{
			return false;
		}
		
		// Général
		
		$event->organisateur = $data['organisateur'];
		$event->titre        = $data['titre'];
		$event->soustitre    = $data['soustitre'];
		$event->sujet        = $data['sujet'];
		$event->description  = $data['description'];
		$event->endroit      = $data['endroit'];
		$event->dateDebut    = $data['dateDebut'];
		$event->dateFin      = $data['dateFin'];
		$event->dateDelai    = $data['dateDelai'];
		$event->remarques    = $data['remarques'];
		
		// Liste les centres
		
		$centres = $data['centres'];
				
		if(!empty($centres))
		{
			 $centreLogos        = implode(',' , $centres);
			 $event->centreLogos = $centreLogos;
		}
		
		
		$event->typeColloque = $data['typeColloque'];
		$event->compte_id    = $data['compte_id'];
		$event->visible      = $data['visible'];		
		
		$event->save();	
		
		return true;
	}
	
	// Emails
	
	public function getEmail($type,$event){
		
		return EM::where('typeEmail','=',$type)->where('event_id','=',$event)->first();		
	}
	
	public function createEmail($data){
	
		if(!empty($data['id']))
		{
			$email = EM::findOrFail($data['id']);	
			
			if( ! $email )
			{
				return false;
			}
			
			$email->typeEmail = $data['typeEmail'];
			$email->message   = $data['message'];
			$email->event_id  = $data['event_id'];		
			
			$email->save();	
			
			return true;	
		}
		else
		{			
			$email = EM::create(array(
				'typeEmail' => $data['typeEmail'],
				'message'   => $data['message'],
				'event_id'  => $data['event_id']
			));
	
			if( ! $email )
			{
				return false;
			}
			
			return true;	
		}	
	}
	
	public function getAttestation($event){
	
		return EA::where('event_id','=',$event)->first();		
	}
	
	public function createAttestation($data){
	
		if(!empty($data['id']))
		{
			$attestation = EA::findOrFail($data['id']);	
			
			if( ! $attestation )
			{
				return false;
			}
			
			$attestation->lieu           = $data['lieu'];
			$attestation->organisateur   = $data['organisateur'];
			$attestation->remarque 	     = $data['remarque'];
			$attestation->signature      = $data['signature'];
			$attestation->responsabilite = $data['responsabilite'];
			$attestation->event_id       = $data['event_id'];		
			
			$attestation->save();	
			
			return true;	
		}
		else
		{			
			$attestation = EA::create(array(
				'lieu'           => $data['lieu'],
				'organisateur'   => $data['organisateur'],
				'remarque'       => $data['remarque'],
				'signature'      => $data['signature'],
				'responsabilite' => $data['responsabilite'],
				'event_id'       => $data['event_id']
			));
	
			if( ! $attestation )
			{
				return false;
			}
			
			return true;	
		}	
	}
	
}

