<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
    <meta charset="utf-8" />
	<title>Bail</title>
	
	<meta name="description" content="Bail">
	<meta name="author" content="Cindy Leschaud">
	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="<?php echo asset('css/foundation.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/normalize.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/style.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/bail/main.css');?>">
	
    <script src="<?php echo asset('bail/js/main.js');?>"></script>

	</head>
	<body>
        <div id="main" class="container">
        
	        <header class="row">
	        	<a class="large-2 columns" href="">{{HTML::image('/images/bail/logo.png')}}</a>
	        	<div class="large-6 columns">
					<nav id="menu-principal">
					   <a href="<?php //echo action('AppController@getIndex');?>">Home</a>
					   <a href="<?php //echo action('AppController@getIndex');?>">Lois</a>
					   <a href="<?php //echo action('AppController@getIndex');?>">Autorités</a>
					   <a href="<?php //echo action('AppController@getIndex');?>">Liens utiles</a>
					   <a class="noborder" href="<?php //echo action('AppController@getIndex');?>">FAQ</a>
					</nav>
				</div>
				<div class="large-4 columns text-right">{{HTML::image('/images/bail/unine.png')}}</div>
		    </header>  
		    
		    <!-- Breadcrumbs and search box -->
	         <div class="row">
		        <div class="large-8 columns bar">
		            <p>Bail index</p>
		        </div>
		
		        <div class="large-4 columns bar">
		            <input type="text" placeholder="large-4.columns">
		        </div>
		    </div>
		      	
	            @yield('content')
	            
	    </div>
        
    	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    	<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
    	
	</body>
</html>