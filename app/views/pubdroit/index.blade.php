@extends('layouts.pubdroit')

@section('content')
	
    <div class="welcome">
      Pubdroit index
      
            {{ $email = Auth::user()->email }}
            
    </div>
	
@stop
