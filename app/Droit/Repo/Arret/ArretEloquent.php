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

		$categories = $data['categories'];
				
		$arret = $this->arret->create(array(
			'pid'        => $data['pid'],
			'cruser_id'  => $data['cruser_id'],
			'reference'  => $data['reference'],
			'pub_date'   => $data['pub_date'],
			'abstract'   => $data['abstract'],
			'pub_text'   => $data['pub_text'],
			'file'       => $data['file'],
			'categories' => count($data['categories']),
			'analysis'   => $data['analysis']
		));
		
		if( ! $arret )
		{
			return false;
		}
		
		// Categories insert in ba_arrets_categories table		
		if(!empty($categories))
		{
			foreach($categories as $index => $categorie)
			{
				$arret_categorie = new \Arrets_categories;
				
				$arret_categorie->arret_id     = $arret->id;
				$arret_categorie->categorie_id = $categorie;
				$arret_categorie->sorting      = $index;
						
				$arret_categorie->save();
			}
		}
	
		return true;
				
	}
	
	public function update(array $data)
	{
		
	}
	
}