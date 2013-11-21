<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
    <meta charset="utf-8" />
	<title>Bail</title>
	
	<meta name="description" content="Publications droit">
	<meta name="author" content="Cindy Leschaud">
	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="<?php echo asset('css/foundation.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/normalize.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/style.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/bail.css');?>">

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
		        <div class="large-9 columns bar">
		            <p><a href="<?php //echo action('AppController@getIndex');?>">Bail index</a></p>
		        </div>
		
		        <div class="large-3 columns bar shadow-red">
				      <form class="search-input"><input type="text" placeholder="Value"></form>
      		     </div>
		    </div>
		      	
	            @yield('content')
	            
	         <footer class="row">
		        <div class="large-9 columns bar">
		            <p>
					    © 2009 - 2013 Bail.ch<br>
					    Séminaire sur le droit du bail, Université de Neuchâtel, avenue du 1er-Mars 26, 2000 Neuchâtel, tél. 032 718 12 60, fax 032 718 12 61 
					    <a href="mailto:seminaire.bail(at)unine(dot)ch">seminaire.bail(at)unine(dot)ch </a>
					</p>
		        </div>
		
		        <div class="large-3 columns">
      		     </div>
		     </footer>
	            
	    </div>
        
    	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    	<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>	
		<script src="<?php echo asset('js/main.js');?>"></script>
		
	</body>
</html>