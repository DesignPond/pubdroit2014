<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
    <meta charset="utf-8" />
	<title>Publications droit</title>
	
	<meta name="description" content="Publications droit">
	<meta name="author" content="Cindy Leschaud">
	<meta name="viewport" content="width=device-width">
	
    <!-- CSS Files
    ================================================== -->
	<link rel="stylesheet" href="<?php echo asset('css/foundation.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/normalize.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/style.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/pubdroit/main.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/smoothness/jquery-ui-1.10.3.custom.css'); ?>" />	
	
    <!-- Javascript Files
    ================================================== -->        
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
    <script src="<?php echo asset('js/jquery-ui.js');?>"></script>
    <script src="<?php echo asset('js/pubdroit/main.js');?>"></script>

	</head>
	<body>
        <div id="mainpubdroit" class="container">
        
	        <header>
	        
	        	<!-- Entête -->
	        	<div id="entete">
			 	 	<div class="logo colorBlock">
				 	 	<a href="">{{HTML::image('/images/pubdroit/logo.png')}}</a>
			 	 	</div>
			 	 	<div class="illustration">
				 	 	{{HTML::image('/images/pubdroit/headerImg.jpg')}}
			 	 	</div>
			 	 	<div class="master colorBlock text-right">
				 	 	<a href="http://www2.unine.ch/droit/masters" target="_blank">SEMESTRE DE PRINTEMPS<br/> nos masters</a>
			 	 	</div>
			 	 	<div class="profileBlock text-right">
				 	 	<a href="index.php?id=254&amp;return_url=5&amp;type=110" class="loginBtn" title="login">login</a><br/>
				 	 	<a href="index.php?id=59&amp;type=110" class="newsletterBtn" title="newsletter">newsletter</a>
			 	 	</div>
			 	</div>
	        	
		        <div id="menu">
		        	<div class="row">
			        	<!-- Menu -->
						<nav id="menu-principal" class="large-9 columns">
							{{ link_to('bail', 'Publications' , array('class' => Request::is( 'pubdroit') ? 'active' : '') ) }}
							{{ link_to('bail', 'Offre spéciale' , array('class' => Request::is( 'pubdroit') ? 'active' : '') ) }}
							{{ link_to('bail', 'Divers' , array('class' => Request::is( 'pubdroit') ? 'active' : '') ) }}
							{{ link_to('bail', 'Evénements' , array('class' => Request::is( 'pubdroit') ? 'active' : '') ) }}
						</nav>
						<div class="large-3 columns">
							{{ Form::open(array( 'url' => 'pubdroit/search', 'id' => 'search' , 'class' => 'searchform')) }}						
						        {{ Form::text('search', '' ) }}
								{{ Form::submit('ok', array('class' => '')) }}
						    {{ Form::close() }}							    
					    </div>
				    </div>		    
		        </div>
				
				<nav id="menu-secondary">
					<ul id="filter">
						<li><a href="#">Réinitialiser</a></li>
						<li><a href="#">Collections</a></li>
						<li><a href="#">Auteurs</a></li>
						<li><a href="#">Thèmes</a></li>
					</ul>
				</nav>
				
		    </header>  
      	
	      	<!-- Contenu -->
	      	
            @yield('content')
            
            <!-- Fin contenu -->
	            
	    </div>
        
    	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    	<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
    	
	</body>
</html>