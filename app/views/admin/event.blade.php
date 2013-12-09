@extends('layouts.admin')

@section('content')

	<div id="page-content">
		<div id="wrap">
		
			<div id="page-heading">
				<ol class="breadcrumb">
					<li><a href="index.htm">Dashboard</a></li>
					<li class="active"><a href="index.htm">Colloques</a></li>
				</ol>
				<h1>Colloques</h1>
			</div>
			
			<div class="container">

	        	<!-- start row -->

	            <div class="row">
	            				
				@if ( !empty($events) )
					@foreach($events as $event) 
					
					<div class="col-md-6">
					    <div class="panel panel-gray">
						    <div class="panel-heading">
						    	<h4><i class="fa fa-calendar icon-highlight icon-highlight-primary"></i> {{ $event->titre }}</h4>
						    </div>
						    <div class="panel-body event-info">
							    <p>{{ $event->organisateur }}</p>
							    <?php
							    setlocale(LC_TIME, 'fr_FR');                     
								$debut =  $event->dateDebut->formatLocalized('%A %d %B %Y'); 
							    ?>
							    <p><strong>Date:</strong> {{ $debut }}</p>
						    </div>
						    <div class="panel-footer mini-footer ">
						    	<div class="btn-group">
									<a class="btn btn-sm btn-info" href="#">&Eacute;diter <span class="badge blank">42</span></a>
									<a class="btn btn-sm btn-success" href="#">Inscriptions <span class="badge blank">42</span></a>
									<a class="btn btn-sm btn-primary" href="#">Factures <span class="badge blank">42</span></a>
								</div>
							</div>
					    </div>
	            	</div>
						                        
					@endforeach
				@endif 
	            
	            </div> 	 
	            
	            <?php
/*
					echo '<pre>';
					print_r($events);
					echo '</pre>';
*/
				?>
	                   
		        <!-- end row -->
	        
			</div>
		</div>
	</div>
	
    	
@stop