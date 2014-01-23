@extends('layouts.bail')

@section('content')
		      				     
	 <!-- Illustration -->

	 <div id="content" class="inner">
	 
	 	 <div class="row">
	 	 	<div class="large-12 columns">
		 	 	<h5 class="line">Les contributions aux séminaires</h5>
	 	 	</div>
	 	 </div>
	 	 	 	 	
	 	 <div class="row">
	 	 	<div id="seminaires" class="large-12 columns">
	 	 		<div class="sujets">
				
					<div class="catTitle clear">
						<div class="category col"><strong>Catégorie</strong></div>
						<div class="edition col"><strong>Edition du séminaire</strong></div>
						<div class="annee col"><strong>Année</strong></div>
						<div class="desc col"><strong>Description</strong></div>
						<div class="auteur col"><strong>Auteur</strong></div>
						<div class="order col">&nbsp;</div>
					</div>
					
					<div class="cat clear ">
							<div class="liste">
									<div class="sujet clear c2 y15 a51 ">
										<div class="category col">
											<h4>Accessoires</h4>
										</div>
										<div class="edition col">15e Séminaire sur le droit du bail</div>
										<div class="annee col">2008</div>
										<div class="desc col">La restitution des paiements en matière de bail</div>
										<div class="auteur col">Ariane Morin</div>
										<div class="order col">
											<a class="order" target="_blank" href="http://www.publications-droit.ch/#/cat/publications/filter/bail/item/7">Acquérir</a>
										</div>
									</div>
									<div class="sujet clear c2 y12 a23 ">
										<div class="category col">
											<h4>Accessoires</h4>
										</div>
										<div class="edition col">12e Séminaire sur le droit du bail</div>
										<div class="annee col">2002</div>
										<div class="desc col">Les frais accessoires au loyer dans les baux d'habitations et de locaux commerciaux</div>
										<div class="auteur col">Philippe Richard</div>
										<div class="order col">
											<a class="pdf" target="_blank" href="uploads/tx_bailseminaires/richard2002.pdf">Télécharger</a>
										</div>
									</div>
							</div>
					</div>
					
					<?php
						
	
					/*
						echo '<pre>';
						print_r($subjects);
						echo '</pre>';
					*/
					
					function knatsort(&$karr){
					    $kkeyarr = array_keys($karr);
					    natsort($kkeyarr);
					    $ksortedarr = array();
					    foreach($kkeyarr as $kcurrkey){
					        $ksortedarr[$kcurrkey] = $karr[$kcurrkey];
					    }
					    $karr = $ksortedarr;
					    return true;
					}
					
					knatsort($subjects);
					
					?>
					
					@foreach($subjects as $title => $subject)
					
						{{ $title }}
					
					@endforeach
					
					<!--
						{foreach item=cat from=$listeCategories}
					<div class="cat clear">
						<div class="liste">
							{foreach item=sujet from=$listeSubjects[$cat.uid]}
							<div class="sujet clear c{$sujet.category_uid} y{$sujet.seminaire_uid}{foreach item=author from=$listeAuthors[$sujet.subject_uid]} a{$author.uid}{/foreach}">
								<div class="category col"><h4>{$cat.title}</h4></div>
								<div class="edition col">{$sujet.seminaire_title}</div>
								<div class="annee col">{$sujet.year}</div>
								<div class="desc col">{$sujet.title}</div>
								<div class="auteur col">{strip}
										{if is_array($listeAuthors[$sujet.subject_uid])}
											{foreach name=author item=author from=$listeAuthors[$sujet.subject_uid]}
												{if $smarty.foreach.author.first}{$author.name}
												{elseif $smarty.foreach.author.last}, {$author.name}
												{else}, {$author.name}
												{/if}
											{/foreach}
										{/if}
									{/strip}</div>
								<div class="order col">
									{if !empty($sujet.orderlink)}
									<a href="{$sujet.orderlink}" class="order" target="_blank">Acquérir</a>
									{/if}
									{if !empty($sujet.file)}
									<a href="uploads/tx_bailseminaires/{$sujet.file}" class="pdf" target="_blank">Télécharger</a>
									{/if}
									{if is_array($sujet.appendixes)}
										{foreach name=appendix item=appendix from=$sujet.appendixes}
											<a href="uploads/tx_bailseminaires/{$appendix}" class="appendix" target="_blank">annexe {$smarty.foreach.appendix.iteration}</a>
										{/foreach}
									{/if}
								</div>
							</div>
							{/foreach}
						</div>
					</div>
					{/foreach}
					-->
					
				</div><!-- end sujets div -->
				
	 	 	</div>	 	 	
	 	 </div>
	 	 
	 </div>
@stop
