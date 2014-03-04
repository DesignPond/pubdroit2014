<?php namespace Droit\Repo\Arret;

use Droit\Repo\Arret\ArretInterface;
use Illuminate\Database\Eloquent\Model as M;

class ArretEloquent implements ArretInterface {

	protected $arret;
	
	// Class expects an Eloquent model
	public function __construct(M $arret)
	{
		$this->arret = $arret;	
	}
	
	public function getAll( $pid ){
	
		return $this->arret->where('pid','=',$pid)->where('deleted', '=', 0)->with( array('arrets_categories' => function ($query)
		{
		    $query->orderBy('sorting', 'ASC');
		    
		},'arrets_analyses' => function($query)
		{
		    $query->where('ba_analyses.deleted', '=', 0);
		  
		}) )->orderBy('pub_date', 'DESC')->get();	
	}
	
	public function find($id){
		
		return $this->arret->where('id','=',$id)->with( array('arrets_categories') )->get();	
	}
	
	public function isMain($arrets){
		
		$arrange = array();
		
		$arrets  = $arrets->toArray();
		
		foreach($arrets as $arret)
		{
			$cats = $arret['arrets_categories'];
			
			if(!empty($cats))
			{
				foreach($cats as $cat)
				{
					if($cat['ismain'] == 1)
					{
						$arrange[$cat['id']][] = $arret;
					}	
				}
			}			
		}
		
		return $arrange;
	}
	
	public function create(array $data)
	{
		
	}
	
	public function update(array $data)
	{
		
	}
	
}