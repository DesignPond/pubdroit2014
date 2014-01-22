@extends('layouts.bail')

@section('content')
		      				     
	 <!-- Illustration -->

	 <div id="content" class="inner">
	 
	 	 <div class="row">
	 	 	<div class="large-12 columns">
		 	 	<h5 class="line">Jurisprudence</h5>
	 	 	</div>
	 	 </div>
	 	 <div id="arrets">
	 	 
		 	 <div class="arrets">
	
		 	 <!-- liste des analyses -->
		 	 
		 	 <div class="cat clear analyse">
				<div class="details large-3 columns">
					<img src="{{ asset('/images/bail/categories/analyse.jpg') }}" alt="" width="140" height="140" />
					<h4>Analyse</h4>
				</div>
				<div class="liste large-9 columns">
				
				@if( !empty($allanalyses) )
				
					@foreach($allanalyses as $analyse)
						<a name="analyse-{{ $analyse->id }}"></a>
							
							<?php 
								$allcat = ''; 
								$anacat = $analyse->analyses_categories;	
								$arrcat = $analyse->arrets_analyses;				
							?>
			
							@foreach($anacat as $cats)					
								<?php  $allcat .= 'c'.$cats->id.' '; ?>				
							@endforeach
							
							<div class="arret analyse  {{ $allcat }}">
								<h3>Analyse de {{ $analyse->authors }}</h3>
								<ul class="liste-arrets arrets-internal-links">
									@if(!empty($arrcat))
										@foreach($arrcat as $arr)
											<li>{{ link_to('bail/jurisprudence#a-'.$arr['id'] , $arr->reference ) }} du {{ $arr->pub_date->formatLocalized('%e %B %Y') }}</li>
										@endforeach 
									@endif
								</ul>							
								<p class="abstract">{{ $analyse->abstract }}</p>							
							</div>
							
					@endforeach 
				@endif
				</div>
			 </div>
			 
		 	 <!-- fin liste des analyses -->
	
			 <!-- liste des arrets -->
			 <div class="cat clear bail">
					<div class="liste">
					
					@if(!empty($arrets))
						@foreach($arrets as $arret)
							<a name="a-{{ $arret->id }}"></a>
			
							<div class="arret clear">
								<div class="categories large-3 columns">
								<?php 										
									$categories_arret = $arret->arrets_categories->toArray(); 
									$arrets_analyses  = $arret->arrets_analyses->toArray(); 									
								?>
								@foreach($categories_arret as $cat)							
									<div class="details">					
										<img src="{{ asset('/images/bail/categories/'.$cat['image']) }}" alt="{{ $cat['title'] }}" width="140" height="140" />
										<h4><?php print_r($cat['title']); ?> </h4>
									</div>						
								@endforeach
								</div>
								<div class="content large-9 columns">
									<h3>{{ $arret->reference }} du {{ $arret->pub_date->formatLocalized('%e %B %Y') }}</h3>
									<p class="abstract">{{ $arret->abstract }}	</p>
									{{ $arret->pub_text }}
								
									@if(!empty( $arret->file ))
										<p><a href="uploads/tx_bailarrets/{{ $arret->file }}" target="_blank">Télécharger en PDF</a></p>
									@endif
									
									<ul class="liste-analyses arrets-internal-links">
									@foreach($arrets_analyses as $analyse)
										<li>{{ link_to('bail/jurisprudence#analyse-'.$analyse['id'], 'Analyse de '.$analyse['authors'] ) }}</li>
									@endforeach 
									</ul>
									
								</div>
							</div>
							
						@endforeach 
					@endif
					
					</div>
				</div>
				<!-- fin liste des arrets -->
	
	
			</div>
	 	 </div>		 
	 	 
	 </div>
@stop
