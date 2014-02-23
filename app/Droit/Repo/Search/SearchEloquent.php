<?php namespace Droit\Repo\Search;

use Droit\Repo\Search\SearchInterface;
use Droit\Repo\User\UserInfoInterface;
use Droit\Repo\Adresse\AdresseInterface;

use Illuminate\Database\Eloquent\Model as M;

class SearchEloquent implements SearchInterface {
		
	protected $user;
	
	protected $adresse;
	
	// Class expects an Eloquent model
	public function __construct(UserInfoInterface $user , AdresseInterface $adresse )
	{
		$this->user     = $user;
		
		$this->adresse  = $adresse;
	}
	
	public function find($data){
	
	
		// background processing, special commands (backspace, etc.), quotes newlines, or some other special characters 
   		$matchSimple =  trim($search);
		$pattern     = '/(;|\||`|>|<|&|^|"|'."\n|\r|'".'|{|}|[|]|\)|\()/i'; 
		
		$matchSimple = preg_replace($pattern, '', $matchSimple);
		
		// We still have something to search for
		if( ($matchSimple != '') && (strlen($matchSimple) > 1) ){
			
			// We have to account for french accents and make two searches
			$matchAccent   = $matchSimple;
			$matchEntities = htmlentities($matchSimple, ENT_QUOTES, 'UTF-8');
			
			// In case of multiple words
			$s1 = explode(" ", $matchAccent);
			$s2 = explode(" ", $matchEntities);
			
			// Trim extra blank spaces
			$s1 = array_filter(array_map('trim',$s1));
			$s2 = array_filter(array_map('trim',$s2));
			
			// Query construction
			$fields = 'id , deleted , civilite , nom  , prenom , profession , entreprise , telephone , adresse , complement , cp , npa , ville , pays , canton , email';
				   
			$select = 'SELECT '.$fields.' '; 		
			$from   = 'FROM '.$table.' WHERE ';
			
			if(count($s1) == 2){
				
				$sqlSearch1  = '  ( prenom LIKE "%'.$s1[0].'%"  AND nom  LIKE "%'.$s1[1].'%" ) ';
				$sqlSearch1 .= ' OR  ( nom  LIKE "%'.$s1[0].'%"  AND prenom LIKE "%'.$s1[1].'%" ) ';
				$sqlSearch1 .= ' OR entreprise LIKE "%'.$s1[0].' '.$s1[1].'%" ';
				$sqlSearch1 .= ' OR email   LIKE "%'.$s1[0].'.'.$s1[1].'%" ';
				$sqlSearch1 .= ' OR email   LIKE "%'.$s1[1].'.'.$s1[0].'%" ';
				
				$sqlSearch2  = '  ( nom  LIKE "%'.$s2[0].'%"  AND prenom LIKE "%'.$s2[1].'%" ) ';
				$sqlSearch2 .= ' OR  ( prenom LIKE "%'.$s2[0].'%"  AND nom  LIKE "%'.$s2[1].'%" ) ';
				$sqlSearch2 .= ' OR entreprise LIKE "%'.$matchEntities.'%"';
				$sqlSearch2 .= ' OR email   LIKE "%'.$s2[0].'.'.$s2[1].'%" ';
				$sqlSearch2 .= ' OR email   LIKE "%'.$s2[1].'.'.$s2[0].'%" ';
			}
			
			if(count($s1) == 1){
				
				$sqlSearch1  = '  ( nom LIKE "%'.$s1[0].'%" OR prenom LIKE "%'.$s1[0].'%" ) ';
				$sqlSearch1 .= ' OR entreprise LIKE "%'.$s1[0].'%" ';
				$sqlSearch1 .= ' OR email   LIKE "%'.$s1[0].'%" ';
				
				$sqlSearch2  = '  ( ( nom LIKE "%'.$s2[0].'%" OR prenom LIKE "%'.$s2[0].'%" ) ';
				$sqlSearch2 .= ' OR entreprise LIKE "%'.$s2[0].'%" ';
				$sqlSearch2 .= ' OR email   LIKE "%'.$s2[0].'%" ) ';
			}

			if(count($s1) > 2){
				
				$sqlSearch1  = ' name LIKE "%'.$matchAccent.'%" ';
				$sqlSearch1 .= ' OR  prenom LIKE "%'.$matchAccent.'%" ';
				$sqlSearch1 .= ' OR  nom  LIKE "%'.$matchAccent.'%" ';
				$sqlSearch1 .= ' OR  entreprise LIKE "%'.$matchAccent.'%" ';
				$sqlSearch1 .= ' OR  email   LIKE "%'.$matchAccent.'%" ';
				
				$sqlSearch2  = ' name LIKE "%'.$matchEntities.'%" ';
				$sqlSearch2 .= ' OR  prenom LIKE "%'.$matchEntities.'%" ';
				$sqlSearch2 .= ' OR  nom  LIKE "%'.$matchEntities.'%" ';
				$sqlSearch2 .= ' OR  entreprise LIKE "%'.$matchEntities.'%" ';
				$sqlSearch2 .= ' OR  email   LIKE "%'.$matchEntities.'%" ';
			}
			
			// Build UNION query
			$startQuery = 'SELECT * FROM (' ;
			$query1     = '('.$select.$from.$sqlSearch1.')';
			$union      = ' UNION ';
			$query2     = '('.$select.$from.$sqlSearch2.')';
			//$endQuery   = ' ) AS tmp WHERE tmp.pid = "44" AND tmp.deleted = "0" GROUP BY tmp.uid ORDER BY tmp.nom, tmp.prenom ASC ';
			
			$endQuery   = ' ) AS tmp WHERE tmp.pid = "44" AND tmp.deleted = "0"'; 
						if($table == 'tt_address'){
							$endQuery .= ' AND tmp.tx_commerce_fe_user_id = "0" '; 
						}
			$endQuery  .= ' GROUP BY tmp.uid ORDER BY tmp.nom, tmp.prenom ASC ';

			$query   = $this->db->query($startQuery.$query1.$union.$query2.$endQuery);
			
			$results = $query->result_array();

			return $results;

		
		
	}
	
}