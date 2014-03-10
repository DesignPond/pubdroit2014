@extends('layouts.bail')

@section('content')
	
	<?php  $custom = new Custom; ?>	      				     
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
					
					<?php $custom->knatsort($categories); ?>
					
					<div class="cat clear ">
							<div class="liste">
							
						@foreach($categories as $title => $subjects)													
							@foreach($subjects as $subject)

									<div class="sujet clear c2 y15 a51 ">
										<div class="category col">
											<h4> {{ $title }} </h4>
										</div>
										<?php  $subjects_seminaires = $subject->subjects_seminaires->toArray(); ?>
										
											<?php 
												foreach($subjects_seminaires as $subjects_seminaire)
												{
													echo '<div class="edition col">'.$subjects_seminaire['title'].'</div>'; 
													echo '<div class="annee col">'.$subjects_seminaire['year'].'</div>'; 
												}
											 ?>

										<div class="desc col"><?php   echo $subject->title; ?></div>
										<div class="auteur col"><?php echo $subject->subjects_authors->first()->name; ?></div>
										<div class="order col">
											<a class="order" target="_blank" href="http://www.publications-droit.ch/#/cat/publications/filter/bail/item/7">Acquérir</a>
										</div>
									</div>
							
							@endforeach										
						@endforeach
						
						</div>
						
					</div>
	
				</div><!-- end sujets div -->
				
	 	 	</div>	 	 	
	 	 </div>
	 	 
	 </div>
@stop
