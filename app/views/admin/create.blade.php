@extends('layouts.admin')

@section('content')

	<div id="content" class="inner">
	    <div class="row">
			<div class="large-12 columns">	
			
			{{ Form::open(array( 'action' => '', 'class' => '')) }}						
				{{ Form::label('Votre canton', '' ) }}
				{{ Form::select('canton', array( 'Berne','Fribourg','Genève','Jura','Neuchâtel','Valais','Vaud' )) }}
				
				{{ Form::label('Votre loyer actuel (sans les charges)', '' ) }}
				{{ Form::text('loyer', '') }}
				
				{{ Form::label('Date d\'entrée en vigueur de votre loyer actuel', '' ) }}
				{{ Form::text('date', '') }}
				
				{{ Form::submit('Inscription', array('class' => 'button tiny colorBlock')) }}
			{{ Form::close() }}	
			
			</div>
		</div>
    </div>
    
@stop