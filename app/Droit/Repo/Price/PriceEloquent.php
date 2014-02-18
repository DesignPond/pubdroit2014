<?php namespace Droit\Repo\Price;

use Droit\Repo\Price\PriceInterface;
use Prices as M;

class PriceEloquent implements PriceInterface {
	
	protected $price;
	
	// Class expects an Eloquent model
	public function __construct(M $price)
	{
		$this->price = $price;	
	}
	
	public function getAll($event){
		
		return $this->price->where('event_id' ,'=', $event )->get();	
	}
	
	public function find($id){
	
		return $this->price->findOrFail($id);	
		
	}
	
	public function delete($id){
	
		$price = $this->price->find($id);

		return $price->delete();		
	}
	
	public function create(array $data)
	{
		$price = $this->price->create(array(
			'remarquePrice' => $data['remarquePrice'],
			'price'         => $data['price'],
			'rangPrice'     => $data['rangPrice'],
			'typePrice'     => $data['typePrice'],
			'event_id'      => $data['event_id']
		));
		
		if( ! $price )
		{
			return false;
		}
		
		return true;		
	}
	
	public function update(array $data)
	{
		$price = $this->price->findOrFail($data['id']);	
		
		if( ! $price )
		{	
			return false;
		}
		
		$price->remarquePrice  = $data['remarquePrice'];
		$price->price          = $data['price'];
		$price->rangPrice      = $data['rangPrice'];
		$price->typePrice      = $data['typePrice'];
		$price->event_id       = $data['event_id'];		
		
		$price->save();	
		
		return true;		
	}
	
}