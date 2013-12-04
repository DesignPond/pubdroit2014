<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
    <meta charset="utf-8" />
	<title>Bail</title>
	
	<meta name="description" content="Bail">
	<meta name="author" content="Cindy Leschaud">
	<meta name="viewport" content="width=device-width">

    <!-- CSS Files
    ================================================== -->
	<link rel="stylesheet" href="<?php echo asset('css/foundation.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/normalize.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/style.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/chosen.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/bail/main.css');?>">
	
    <!-- Javascript Files
    ================================================== -->        
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
    <script src="<?php echo asset('js/chosen.jquery.js');?>"></script>
    <script src="<?php echo asset('js/bail/main.js');?>"></script>

	</head>
	<body>
        <div id="main" class="container">
        
        	<!-- Contenu principal -->
    		<div class="maincontent">
    			<!-- Entête et menu -->
		        <header id="header" class="header"> 
		        	<div class="row">
		        		<h1 class="large-3 columns"><a class="" href="">{{HTML::image('/images/bail/logo.png')}}</a></h1>
						<nav class="large-9 columns" id="menu-principal">
						    {{ link_to('bail', 'Home' , array('class' => Request::is( 'bail') ? 'active' : '') ) }}
						    {{ link_to('bail/lois', 'Lois' , array('class' => Request::is( 'bail/lois') ? 'active' : '') ) }}
						    {{ link_to('bail/autorites', 'Autorités', array('class' => Request::is( 'bail/autorites') ? 'active' : '')) }}
						    {{ link_to('bail/liens', 'Liens utiles', array('class' => Request::is( 'bail/liens') ? 'active' : '')) }}
						    {{ link_to('bail/faq', 'FAQ', array('class' => Request::is( 'bail/faq') ? 'noborder active' : 'noborder')) }}
					    </nav>
					</div>
			    </header> 
			    
			    <!-- Fil d'ariane -->
		      	<section id="breadcrumbs" class="colorBlock min-inner colorSection">Home <a href=""> &gt; Newsletter</a></section>
		      	
		      	<!-- Contenu -->
		      	
	            @yield('content')
	            
	            <!-- Fin contenu -->
	            
            </div> 
            <!-- Fin contenu principal -->
            
            <!-- Sidebar --> 
            <div class="sidebar">	
            
            	<!--Logo unine --> 
            	
            	<p class="min-inner header text-right"> <a href="http://www.unine.ch" target="_blank">{{HTML::image('/images/bail/unine.png')}}</a></p>
            	
            	<!-- Bloc recherche --> 
            	
            	<div class="colorBlock min-inner colorSection searchBg">            	
            		{{ Form::open(array( 'methode' => 'POST' , 'url' => 'bail/search', 'class' => 'searchform')) }}						
				        {{ Form::text('q', null , array( 'placeholder' => 'Recherche...') ) }}
						{{ Form::submit('ok', array('class' => '')) }}
				    {{ Form::close() }}				     
            	</div>
            	
            	<!-- Bloc archives newsletter --> 
            	
             	<div class="min-inner upMarge">
	            	<h3 class="link"><a class="newsletterLink" href="#" id="toggleNewsletter">Newsletter</a></h3>
	            		<div class="toggleNewsletter" style="display:none;">
		            		<ul>
			            		<li><a href="index.php?id=206&amp;uid=356" >Newsletter octobre 2013</a></li>
			            		<li><a href="index.php?id=206&amp;uid=353" >Newsletter septembre 2013</a></li>
			            		<li><a href="index.php?id=206&amp;uid=347" >Newsletter été 2013</a></li>
			            		<li><a href="index.php?id=206&amp;uid=340" >Newsletter juin 2013</a></li>
			            		<li><a href="index.php?id=206&amp;uid=334" >Newsletter mai 2013</a></li>
			            		<li><a href="index.php?id=206&amp;uid=328" >Newsletter avril 2013</a></li>
		            		</ul>
	            		</div>
					<h3 class="link">
						{{ link_to('bail/jurisprudence', 'Jurisprudence' , array('class' => 'newsletterLink') ) }}
					</h3>
						<div>
							<select class="chosen-select" multiple data-placeholder="Filtrer" name="filter">
								<option value="Défaut">Défaut</option>
								<option value="Bail à ferme">Bail à ferme</option>
								<option value="Bail à ferme agricole">Bail à ferme agricole</option>
								<option value="Changement de propriétaire">Changement de propriétaire</option>
								<option value="Destiné à la publication">Destiné à la publication</option>
								<option value="Diligence">Diligence</option>
								<option value="Expulsion">Expulsion</option>
								<option value="Faillite">Faillite</option>
								<option value="Général">Général</option>
								<option value="Logement de famille">Logement de famille</option>
								<option value="Prolongation">Prolongation</option>
								<option value="Résiliation">Résiliation</option>
								<option value="Sous-location">Sous-location</option>
								<option value="Vente">Vente</option>
							</select>
						</div>
					<h3 class="link"><a class="newsletterLink" href="#" >Articles de doctrine</a></h3>
					<h3 class="link"><a class="newsletterLink" href="#" >Revues</a></h3>
					<h3 class="link"><a class="newsletterLink" href="#" >Bibliographie</a></h3>
					<h3 class="link"><a class="newsletterLink" href="#" >Commentaire pratique</a></h3>	          	
            	</div>
				
				<!-- Bloc Soutiens --> 
				
				<h5 class="min-inner colorBlock upMarge blockTitle">Avec le soutien de</h5> 
            	<div class="inner text-right">
            		<a href="http://www.helbing.ch/" target="_blank">{{HTML::image('/images/bail/HLV_Logo.png')}}</a>
            	</div>
            	
            	<!-- Bloc inscription newsletter --> 
            	<h5 class="min-inner colorBlock blockTitle">Calculateur</h5>             	
            	<div class="inner calculator">   
            		<p>Calculez les hausses et baisses de loyer en un clic</p>
            		         	
					{{ Form::open(array( 'action' => 'NewsletterController@add', 'class' => '')) }}						
						{{ Form::label('Votre canton', '' ) }}
						{{ Form::select('canton', array( 'Berne','Fribourg','Genève','Jura','Neuchâtel','Valais','Vaud' )) }}
						
						{{ Form::label('Votre loyer actuel (sans les charges)', '' ) }}
						{{ Form::text('loyer', '') }}
						
						{{ Form::label('Date d\'entrée en vigueur de votre loyer actuel', '' ) }}
						{{ Form::text('date', '') }}
						
						{{ Form::submit('Inscription', array('class' => 'button tiny colorBlock')) }}
					{{ Form::close() }}	
									
            	</div>
            	
            	<!-- Bloc inscription newsletter --> 
            	<h5 class="min-inner colorBlock blockTitle">Inscription à la newsletter</h5>             	
            	<div class="inner">            	
					{{ Form::open(array( 'action' => 'NewsletterController@add', 'class' => '')) }}						
						{{ Form::text('email', 'Votre adresse email' , array('class' => '')) }}
						{{ Form::hidden('list_id', '2') }}
						{{ Form::submit('Inscription', array('class' => 'button tiny colorBlock')) }}
					{{ Form::close() }}					
            	</div>
            	            	
            </div>  
            
            <!-- End sidebar --> 		

            <footer class="colorBlock inner">
	            © 2013 - bail.ch<br/>
				Université de Neuchâtel, Faculté de droit, Av. du 1er mars 26, 2000 Neuchâtel<br/>
				<a href="mailto:seminaire.bail@unine.ch">seminaire.bail@unine.ch</a>
            </footer>	
			             
			<div class="clearall"></div>
			
	    </div>
    	
	</body>
</html>