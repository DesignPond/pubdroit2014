@extends('layouts.matrimonial')

@section('content')
	
	 <div id="content" class="inner">
	 
	 	 <div class="row">
	 	 	<div class="large-12 columns">
		 	 	<h5 class="line">Jurisprudence</h5>
	 	 	</div>
	 	 </div>
	 	 
	 	 <div id="arrets" class="row">		 	  	 
		 	 <div class="arrets">
		 	 
			 	 <div class="cat clear">
			 	 
			 	 	@if(!empty($arrets))							
						@foreach($arrets as $idcat => $arr)
			 	 
						  <div class="title clear">
							 <img src="<?php echo asset('/images/matrimonial/categories/'.$categories[$idcat]['image']); ?>" alt="" width="140" height="140" />
							 <h4><?php echo $categories[$idcat]['title'];  ?></h4>						
						  </div>
						  <div class="liste">						 
						 	  									
								@if(!empty($arr))
									@foreach($arr as $arret)
									
										<a name="a-{{ $arret['id'] }}"></a>
										
											<?php 
												$allarrcat        = '';									
												$categories_arret = $arret['arrets_categories']; 
												$arrets_analyses  = $arret['arrets_analyses']; 
												setlocale(LC_ALL, 'fr_FR');  
											?>
											
											@foreach($categories_arret as $arcats)					
												<?php  $allarrcat .= 'c'.$arcats['id'].' '; ?>				
											@endforeach						
											
										<div class="arret {{ $allarrcat }} y{{ $arret['pub_date'] }} clear row">
											<div class="categories large-3 columns">							
											@foreach($categories_arret as $cat)							
												<div class="details">	
													@if($cat['ismain'] != 1)				
														<img src="{{ asset('/images/matrimonial/categories/'.$cat['image']) }}" alt="{{ $cat['title'] }}" width="100" height="100" />
														<h4><?php print_r($cat['title']); ?> </h4>
													@endif
												</div>						
											@endforeach
											</div>
											<div class="content large-9 columns">
												<h3>{{ $arret['reference'] }} du </h3>
												<p class="abstract">{{ $arret['abstract'] }}</p>
												{{ $arret['pub_text'] }}
											
												@if(!empty( $arret['file'] ))
													<p><a href="uploads/tx_matrimonialarrets/{{ $arret['file'] }}" target="_blank">Télécharger en PDF</a></p>
												@endif
												
												<ul class="liste-analyses arrets-internal-links">
													@foreach($arrets_analyses as $analyse)
														<li>{{ link_to('matrimonial/jurisprudence#analyse-'.$analyse['id'], 'Analyse de '.$analyse['authors'] ) }}</li>
													@endforeach 
												</ul>												
											</div>
										</div>
										
									@endforeach 
								@endif
								
						@endforeach
					@endif
					
				 </div>			
			 </div>	
			
		</div>			
 	 </div>		 
 	 
</div>
		
@stop
