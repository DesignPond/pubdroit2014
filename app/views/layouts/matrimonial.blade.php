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
	<link rel="stylesheet" href="<?php echo asset('css/matrimonial/smoothness/jquery-ui-1.10.3.custom.css'); ?>" />	
        
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
    <script src="<?php echo asset('js/matrimonial/jquery-ui.js');?>"></script>
    <script src="<?php echo asset('js/matrimonial/main.js');?>"></script>

	</head>
	<body>
        <div id="main" class="container">
        
    		<div id="maincontent">
    		
		        <header id="header" class="inner"> 
		        	<div class="row">
		        		<h1 class="large-4 columns noPadding"><a class="" href="">{{HTML::image('/images/matrimonial/logo.png')}}</a></h1>
						<nav class="large-8 columns" id="menu-principal">
						   <a href="<?php //echo action('AppController@getIndex');?>">Home</a>
						   <a href="<?php //echo action('AppController@getIndex');?>">Newsletter</a>
						   <a href="<?php //echo action('AppController@getIndex');?>">Jurisprudence</a>
						</nav>
		        	</div>
			    </header> 
			     
			    <section id="photo">{{HTML::image('/images/matrimonial/photo.jpg')}}</section>
			    
		      	<section id="breadcrumbs" class="greySection inner">Home <a href=""> &gt; Newsletter</a></section>
		      	
	            @yield('content')
	            
	            <footer class="greySection inner">
		            © 2013 - droitmatrimonial.ch<br/>
					Université de Neuchâtel, Faculté de droit, Av. du 1er mars 26, 2000 Neuchâtel<br/>
					<a href="mailto:droit.matrimonial@unine,ch">droit.matrimonial(at)unine(dot)ch</a>
	            </footer>
	            
            </div>  
            <div id="sidebar">	
            	<p class="inner">{{HTML::image('/images/matrimonial/unine.png')}}</p>
            	
            	<div class="pinkBlock inner">
	            	<h5>Inscription à la newsletter</h5>
					<p>Entrez votre adresse e-mail</p>
					
					{{ Form::open(array( 'url' => 'newsletter', 'class' => '')) }}						
						{{ Form::text('email', '' , array('class' => '')) }}
						{{ Form::submit('Valider', array('class' => 'button tiny')) }}
					{{ Form::close() }}
					
            	</div>
            	
            	<div class="inner">
            	
            		{{ Form::open(array( 'url' => 'search', 'class' => 'searchform')) }}						
				        {{ Form::text('email', '' , array('class' => '')) }}
						{{ Form::submit('ok', array('class' => '')) }}
				    {{ Form::close() }}
				     
            	</div>
            	
             	<div class="pinkBlock">
	            	<h3 class="link"><a class="newsletterLink" href="#" id="toggleNewsletter">Newsletter</a></h3>
	            		<div class="toggleNewsletter greySection" style="display:none;">
		            		<ul>
			            		<li><a href="index.php?id=206&amp;uid=356" >Newsletter octobre 2013</a></li>
			            		<li><a href="index.php?id=206&amp;uid=353" >Newsletter septembre 2013</a></li>
			            		<li><a href="index.php?id=206&amp;uid=347" >Newsletter été 2013</a></li>
			            		<li><a href="index.php?id=206&amp;uid=340" >Newsletter juin 2013</a></li>
			            		<li><a href="index.php?id=206&amp;uid=334" >Newsletter mai 2013</a></li>
			            		<li><a href="index.php?id=206&amp;uid=328" >Newsletter avril 2013</a></li>
			            		<li><a href="index.php?id=206&amp;uid=321" >Newsletter mars 2013</a></li>
			            		<li><a href="index.php?id=206&amp;uid=314" >Newsletter février 2013</a></li>
			            		<li><a href="index.php?id=206&amp;uid=307" >Newsletter janvier 2013</a></li>
			            		<li><a href="index.php?id=206&amp;uid=305" >Newsletter décembre 2012</a></li>
			            		<li><a href="index.php?id=206&amp;uid=292" >Newsletter novembre 2012</a></li>
			            		<li><a href="index.php?id=206&amp;uid=304" >Newsletter octobre 2012</a></li>
			            		<li><a href="index.php?id=206&amp;uid=303" >Newsletter septembre 2012</a></li>
			            		<li><a href="index.php?id=206&amp;uid=302" >Newsletter été 2012</a></li>
			            		<li><a href="index.php?id=206&amp;uid=268" >Newsletter juin 2012</a></li>
			            		<li><a href="index.php?id=206&amp;uid=264" >Newsletter mai 2012</a></li>
			            		<li><a href="index.php?id=206&amp;uid=259" >Newsletter avril 2012</a></li>
			            		<li><a href="index.php?id=206&amp;uid=252" >Newsletter mars 2012</a></li>
			            		<li><a href="index.php?id=206&amp;uid=239" >Newsletter février 2012</a></li>
			            		<li><a href="index.php?id=206&amp;uid=230" >Newsletter janvier 2012</a></li>
			            		<li><a href="index.php?id=206&amp;uid=209" >Newsletter décembre 2011</a></li>
			            		<li><a href="index.php?id=206&amp;uid=193" >Newsletter novembre 2011</a></li>
			            		<li><a href="index.php?id=206&amp;uid=183" >Newsletter octobre 2011</a></li>
			            		<li><a href="index.php?id=206&amp;uid=177" >Newsletter septembre 2011</a></li>
		            		</ul>
	            		</div>
					<h3 class="link"><a class="newsletterLink" href="#" >Jurisprudence</a></h3>	          	
            	</div>
            	
            	<div class="pinkBlock upMarge inner">
            		<h5>Avec le soutien de</h5>
            		{{HTML::image('/images/matrimonial/logo_helbing.png')}}
            	</div>
            	
            </div>  
			<div class="clearall"></div>
	    </div>
    	
	</body>
</html>