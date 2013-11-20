<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
    <meta charset="utf-8" />
	<title>Matrimonial</title>
	
	<meta name="description" content="Publications droit">
	<meta name="author" content="Cindy Leschaud">
	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="<?php echo asset('css/foundation.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/normalize.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/style.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/matrimonial/main.css');?>">
	
    <script src="<?php echo asset('js/main.js');?>"></script>

	</head>
	<body>
        <div id="main" class="container">
        
    		<div id="maincontent">
    		
		        <header id="header" class="inner"> 
		        	<div class="row">
		        		<h1 class="large-4 columns"><a class="" href="">{{HTML::image('/images/matrimonial/logo.png')}}</a></h1>
						<nav class="large-8 columns" id="menu-principal">
						   <a href="<?php //echo action('AppController@getIndex');?>">Home</a>
						   <a href="<?php //echo action('AppController@getIndex');?>">Newsletter</a>
						   <a href="<?php //echo action('AppController@getIndex');?>">Jurisprudence</a>
						</nav>
		        	</div>
			    </header>  
		      	
	            @yield('content')
	            
            </div>  
            <div id="sidebar" class="inner">	
            	{{HTML::image('/images/matrimonial/unine.png')}}
            </div>  
			<div class="clearall"></div>
	    </div>
        
    	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    	<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
    	
	</body>
</html>