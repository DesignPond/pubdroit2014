@extends('layouts.matrimonial')

@section('content')
	
    <div id="content" class="inner">
	    <div class="row">
			
			<?php
				
				if(!empty($arrets)){
					foreach($arrets as $arret)
					{
						foreach($arret as $arr)
						{
							echo $arr['abstract'].'<br/>';
							
							if(isset($arr['arrets_categories']))
							{
								foreach($arr['arrets_categories'] as $cats)
								{
									if($categories[$cats['id']]['ismain'] != 1){
										echo $categories[$cats['id']]['title'];
									}
								}
							}
						}
					}
				}
		
				
			?>
			
		</div>		
    		
    </div>
		
@stop
