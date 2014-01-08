@extends('layouts.bail')

@section('content')
		      				     
	 <!-- Illustration -->

	 <div id="content" class="inner">
	 
	 	 <div class="row">
	 	 	<div class="large-12 columns">
		 	 	<h5 class="line">Jurisprudence</h5>
	 	 	</div>
	 	 </div>
 
	 	 <div class="arrets">
<!--

			{foreach item=cat from=$listeCategories}
			<div class="row">
				<div class="cat clear{if isset($listeArrets[$cat.uid]) and $listeArrets[$cat.uid][0].type == 'analyse' } analyse{/if}">
					<div class="details large-3 columns">
						{image file="uploads/tx_bailarrets/`$cat.image`" file.maxW="140" file.maxH=140 altText="`$cat.title`"}
						<h4>{$cat.title}</h4>
					</div>
					<div class="liste large-9 columns">
						{foreach item=arret from=$listeArrets[$cat.uid]}
							{if $arret.type == 'analyse'}
								<a name="analyse-{$arret.uid}"></a>
								<div class="arret analyse c{$arret.category_uid}{foreach item=a_uid from=$arret.arrets name=analyse_arrets} y{$listeArretsById[$a_uid].year}{/foreach}">
									<h3>Analyse de {$arret.authors}</h3>
									<ul class="liste-arrets arrets-internal-links">
									{foreach item=a_uid from=$arret.arrets name=analyse_arrets}
										<li>{link parameter="_self" section=a-`$a_uid`}{$listeArretsById[$a_uid].reference}{/link} du {$listeArretsById[$a_uid].pub_date|date_format:"%e %B %Y"}</li>
									{/foreach}
									</ul>
									<p class="abstract">{$arret.abstract}</p>
									{strip}
									{if !empty($arret.file)}
									<p><a href="uploads/tx_bailarrets/{$arret.file}" target="_blank">Télécharger cette analyse en PDF</a></p>
									{/if}
									{/strip}
									</p>
								</div>
							{else}
								<a name="a-{$arret.uid}"></a>
								<div class="arret c{$arret.category_uid} y{$arret.year}">
									<h3>{$arret.reference} du {$arret.pub_date|date_format:"%e %B %Y"}</h3>
									<p class="abstract">{$arret.abstract}</p>
									<p class="text bodytext">{$arret.pub_text}</p>
									{strip}
									{if !empty($arret.file)}
									<p><a href="uploads/tx_bailarrets/{$arret.file}" target="_blank">Télécharger en PDF</a></p>
									{/if}
									<ul class="liste-analyses arrets-internal-links">
									{foreach item=a_uid from=$arret.analyses name=arret_analyses}
										<li>{link parameter="_self" section=analyse-`$a_uid`}Analyse de {$listeAnalysesById[$a_uid].authors}{/link}</li>
									{/foreach}
									</ul>
									{/strip}
									</p>
								</div>
							{/if}
						{/foreach}
					</div>
				</div>
			</div>
			{/foreach}
-->
					

			<div class="cat clear bail">
				<div class="liste">
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
							<h3>{{ $arret->reference }} du {{ $arret->pub_date }}</h3>
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
				</div>
			</div>



		</div>
	 	 		 
	 	 
	 </div>
@stop
