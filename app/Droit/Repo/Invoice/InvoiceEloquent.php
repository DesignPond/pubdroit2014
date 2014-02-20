<?php namespace Droit\Repo\Invoice;

use Droit\Repo\Invoice\InvoiceInterface;
use Invoices as M;

class InvoiceEloquent implements InvoiceInterface {

	protected $invoice;
	
	// Class expects an Eloquent model
	public function __construct(M $invoice)
	{
		$this->invoice = $invoice;	
	}
	
	/*
	 * CRUD functions
	*/
		
	public function find($id){
		
		return $this->invoice->where('id', '=' ,$id)->with( array('prices','users') )->get();		
	}
	
	public function getEvent($event){

		return $this->invoice->where('event_id', '=' ,$event)->with( array('event','prices','users'=> function($query) 
		{ 			
			$query->join('adresses','users.id','=','adresses.user_id')->where('adresses.type', '=', 1);
			
		}))->get();
	
	}
	
	public function create(array $data){
		
		$invoice = $this->invoice->create(array(
			'event_id'        => $data['event_id'],
			'user_id'         => $data['user_id'],
			'price_id'        => $data['price_id'],
			'invoiceNumber'   => $data['invoiceNumber'],
			'dateinvoice'     => $data['dateinvoice']
		));
		
		if( ! $invoice )
		{
			return false;
		}
		
		return true;
	}
	
	public function update(array $data){
		
		$invoice = $this->invoice->find($data['id']);
		
		if( ! $invoice )
		{
			return false;
		}

		$invoice->user_id     = $data['user_id'];
		$invoice->event_id    = $data['event_id'];
		$invoice->price_id    = $data['price_id'];
		$invoice->noinvoice   = $data['noinvoice'];
		$invoice->dateinvoice = $data['dateinvoice'];

		$invoice->save();	
		
		return true;

	}
	
}

