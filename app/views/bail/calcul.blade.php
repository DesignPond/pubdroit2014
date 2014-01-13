@extends('layouts.bail')

@section('content')
		      				     
	 <!-- Illustration -->

	 <div id="content" class="inner"> 
	 	
	 	<?php
		 	echo '<pre>';
			print_r($taux_depart);
			echo '</pre>';
			
			echo '<pre>';
			print_r($taux_actuel);
			echo '</pre>';
			
		 	echo '<pre>';
			print_r($ipc_depart);
			echo '</pre>';
			
			echo '<pre>';
			print_r($ipc_actuel);
			echo '</pre>';	
					
			echo '<pre>';
			print_r($calcul);
			echo '</pre>';
	 	?>
	 	
	 </div>
@stop
