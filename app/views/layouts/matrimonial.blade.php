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
	
    <script src="<?php echo asset('js/main.js');?>"></script>

	</head>
	<body>
        <div class="container">
        
	        <header>
				<nav>
				  <ul class="nav navbar-nav">
				    <li><a href="<?php //echo action('AppController@getIndex');?>">Accueil</a></li>
				  </ul>
				</nav>
		    </header>  
		      	
	            @yield('content')
	            
	    </div>
        
    	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    	<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
    	
	</body>
</html>