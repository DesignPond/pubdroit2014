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
	<link rel="stylesheet" href="<?php echo asset('css/smoothness/jquery-ui-1.10.3.custom.css'); ?>" type="text/css"  />
	<link rel="stylesheet" href="<?php echo asset('css/style.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/chosen.css');?>">
	<link rel="stylesheet" href="<?php echo asset('css/bail/main.css');?>">
	
    <!-- Javascript Files
    ================================================== -->        
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
    <script src="<?php echo asset('js/jquery-ui.js');?>"></script>
    <script src="<?php echo asset('js/chosen.jquery.js');?>"></script>
    <script src="<?php echo asset('js/bail/main.js');?>"></script>
    <script src="<?php echo asset('js/bail/bail.js');?>"></script>
	<base id="base" href="http://pubdroit.local/bail/" />
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
            	
             	<div class="upMarge">
             		<div id="rightmenu">	
	             		<!--
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
	
						<div id="jurisprudence-filter">
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
						-->
						
						<h4 class="accordion"><a href="#"><span>Newsletter</span></a></h4>
							<div class="newsletterMenu accordionContent">
								<ul class="menu">
									<li><a href="index.php?id=108&amp;uid=364" >Newsletter décembre 2013</a></li>
									<li><a href="index.php?id=108&amp;uid=357" >Newsletter novembre 2013</a></li>
									<li><a href="index.php?id=108&amp;uid=354" >Newsletter octobre 2013</a></li>
									<li><a href="index.php?id=108&amp;uid=349" >Newsletter septembre 2013</a></li>
									<li><a href="index.php?id=108&amp;uid=344" >Newsletter août 2013</a></li>
									<li><a href="index.php?id=108&amp;uid=343" >Newsletter juillet 2013</a></li>
									<li><a href="index.php?id=108&amp;uid=338" >Newsletter juin 2013</a></li>
									<li><a href="index.php?id=108&amp;uid=330" >Newsletter mai 2013</a></li>
								</ul>
							</div>
						<h4 class="accordionPart jurisprudence"><a href="{{ url('bail/jurisprudence') }}" title="Jurisprudence"><span>Jurisprudence</span></a></h4>
							<div class="accordionContentPart accordionContent jurisprudence">
								<div class="filtre">
									<h6>Par catégorie</h6>
									<div class="list categories clear">
										<select class="chosen-select category" multiple data-placeholder="Filtrer par catégorie..." name="filter">
											<option value="c2">Analyse</option>
											<option value="c17">Bail à ferme</option>
											<option value="c45">Bail à ferme agricole</option>
											<option value="c21">Changement de propriétaire</option>
											<option value="c16">Conclusion</option>
											<option value="c4">Défaut</option>
											<option value="c10">Destiné à la publication</option>
											<option value="c18">Diligence</option>
											<option value="c20">Expulsion</option>
											<option value="c13">Faillite</option>
											<option value="c15">Frais accessoires</option>
											<option value="c3">Général</option>
											<option value="c14">Législation</option>
											<option value="c9">Logement de famille</option>
											<option value="c1">Loyer</option>
											<option value="c7">Procédure</option>
											<option value="c8">Prolongation</option>
											<option value="c12">Prostitution</option>
											<option value="c6">Résiliation</option>
											<option value="c5">Sous-location</option>
											<option value="c19">Vente</option>
										</select>
									</div>
									<h6>Par année</h6>
									<ul class="list annees clear">
										<li><a rel="y2013" href="#">Paru en 2013</a></li>
										<li><a rel="y2012" href="#">Paru en 2012</a></li>
										<li><a rel="y2011" href="#">Paru en 2011</a></li>
										<li><a rel="y2010" href="#">Paru en 2010</a></li>
									</ul>
								</div>
							</div>
						<h4 class="accordionPart seminaire"><a href="{{ url('bail/doctrine') }}" title="Articles de doctrine"><span>Articles de doctrine</span></a></h4>
							<div class="accordionContentPart"></div>
						<h4 class="accordion"><a href="#"><span>Revues</span></a></h4>
							<div class="revueMenu accordionContent">
								<ul class="menu">
									<li><a href="index.php?id=97#DB1989" >DB 1/1989</a></li>
									<li><a href="index.php?id=97#DB1990" >DB 2/1990</a></li>
									<li><a href="index.php?id=97#DB1991" >DB 3/1991</a></li>
									<li><a href="index.php?id=97#DB1992" >DB 4/1992</a></li>
									<li><a href="index.php?id=97#DB1993" >DB 5/1993</a></li>
									<li><a href="index.php?id=97#DB1994" >DB 6/1994</a></li>
									<li><a href="index.php?id=97#DB1995" >DB 7/1995</a></li>
									<li><a href="index.php?id=97#DB1996" >DB 8/1996</a></li>
									<li><a href="index.php?id=97#DB1997" >DB 9/1997</a></li>
									<li><a href="index.php?id=97#DB1998" >DB 10/1998</a></li>
									<li><a href="index.php?id=97#DB1999" >DB 11/1999</a></li>
									<li><a href="index.php?id=97#DB2000" >DB 12/2000</a></li>
									<li><a href="index.php?id=97#DB2001" >DB 13/2001</a></li>
								</ul>
							</div>
						<h4><a href="{{ url('bail/bibliographie') }}" title="Bibliographie"><span>Bibliographie</span></a></h4>
						<div class="accordionContentPart"></div>
						<h4><a href="{{ url('bail/commentaire') }}" title="Commentaire pratique"><span>Commentaire pratique</span></a></h4>
						<div class="accordionContentPart"></div>
					
					</div>          	
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