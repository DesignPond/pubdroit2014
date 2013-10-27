@extends('layouts.pubdroit')

@section('content')
	
    <div class="welcome">
      Pubdroit index
         
       <?php 
			if (Auth::check())
			{
				echo "Vous êtes loggués";
			}
		?>	 
           		 
    </div>
	
@stop
