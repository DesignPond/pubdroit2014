<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<head>
    <meta charset="utf-8" />
	<title>Administration Droit Formation</title>
	
	<meta name="description" content="Administration Droit Formation">
	<meta name="author" content="Cindy Leschaud">
	<meta name="viewport" content="width=device-width">

    <!-- CSS Files
    ================================================== -->
	<link rel="stylesheet" href="<?php echo asset('css/admin/styles.css?=120');?>">
	<link rel="stylesheet" href="<?php echo asset('css/admin/main.css');?>">
	<link rel="stylesheet" href="<?php echo asset('js/admin/redactor/redactor.css'); ?>">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>
    <link href="<?php echo asset('fonts/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
    <link href="<?php echo asset('plugins/datatables/dataTables.css');?>" rel="stylesheet">
    <link href="<?php echo asset('plugins/jqueryui-timepicker/jquery.ui.timepicker.css');?>" rel="stylesheet">
    <link href="<?php echo asset('js/admin/jqueryui.css');?>" rel="stylesheet">
    
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
	<!--[if lt IE 9]>
        <link rel="stylesheet" href="<?php echo asset('css/admin/ie8.css');?>">
		<script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
	<![endif]-->

</head>
	<body>

	    <!-- Entête et menu -->
	    <header class="navbar navbar-inverse navbar-fixed-top" role="banner">
	        <a id="leftmenu-trigger" class="tooltips" data-toggle="tooltip" data-placement="right" title="Toggle Sidebar"></a>
	
	        <div class="navbar-header pull-left">
	            <a class="navbar-brand" href="index.htm">Droit Formation</a>
	        </div>
	
	        <ul class="nav navbar-nav pull-right toolbar">
	        	<li class="dropdown">
	        		<a href="#" class="dropdown-toggle username" data-toggle="dropdown">
	        			<span class="hidden-xs">Cindy Leschaud <i class="fa fa-caret-down"></i></span><img src="{{ asset('images/admin/dangerfield.png') }}" alt="Dangerfield" />
	        		</a>
	        		<ul class="dropdown-menu userinfo arrow">
	        			<li class="username">
	                        <a href="#">
	        				    <div class="pull-left"><img class="userimg" src="{{ asset('images/admin/dangerfield.png') }}" alt="Jeff Dangerfield"/></div>
	        				    <div class="pull-right"><h5>Howdy, Cindy!</h5><small>Logged in as <span>admin</span></small></div>
	                        </a>
	        			</li>
	        			<li class="userlinks">
	        				<ul class="dropdown-menu">
	        					<li><a href="#">Edit Profile <i class="pull-right fa fa-pencil"></i></a></li>
	        					<li><a href="#">Account <i class="pull-right fa fa-cog"></i></a></li>
	        					<li><a href="#">Help <i class="pull-right fa fa-question-circle"></i></a></li>
	        					<li class="divider"></li>
	        					<li>{{ link_to('logout', 'Logout') }}</li>
	        				</ul>
	        			</li>
	        		</ul>
	        	</li>	       
			</ul>
	    </header>
		
		<div id="page-container">
			<nav id="page-leftbar" role="navigation">
				<ul id="sidebar" class="acc-menu">
					<li id="search">
	                    <a href="javascript:;"><i class="fa fa-search opacity-control"></i></a>
	                     <form>
	                        <input type="text" class="search-query" placeholder="Search...">
	                        <button type="submit"><i class="fa fa-search"></i></button>
	                    </form>
	                </li>
	                <li class="divider"></li>
	                <li><a class="{{ Request::is( 'admin') ? 'active' : '' }}" href="#"><i class="fa fa-cog"></i> <span>Dashboard</span></a></li>
				    <li><a href="javascript:;"><i class="fa fa-cogs"></i> <span>Outils</span></a>
					    <ul class="acc-menu">
					   		<li><a class="{{ Request::is( 'admin/pubdroit/specialisation') ? 'active' : '' }}" href="{{ url('admin/pubdroit/specialisation') }}">
					    		<i class="fa fa-bookmark"></i> <span>Spécialisations</span></a>
					    	</li>
					   		<li><a class="{{ Request::is( 'admin/pubdroit/membre') ? 'active' : '' }}" href="{{ url('admin/pubdroit/membre') }}">
					    		<i class="fa fa-bookmark"></i> <span>Membres</span></a>
					    	</li>
					    </ul>
				    </li>
				    <li><a href="javascript:;"><i class="fa fa-book"></i> <span>Publications-droit</span></a>
					    <ul class="acc-menu">
					    	<li><a class="{{ Request::is( 'admin/pubdroit/lists') ? 'active' : '' }}" href="{{ url('admin/pubdroit/lists') }}">
					    		<i class="fa fa-clock-o"></i> <span>Colloques</span></a>
					    	</li>
					    	<li><a class="{{ Request::is( 'admin/pubdroit/archives') ? 'active' : '' }}" href="{{ url('admin/pubdroit/archives') }}">
					    		<i class="fa fa-archive"></i> <span>Archives</span></a>
					    	</li>
					    </ul>
				    </li>
				    <li><a href="javascript:;"><i class="fa fa-home"></i> <span>Bail</span></a>
					    <ul class="acc-menu">
						    <li>{{ link_to('admin/bail/arrets', 'Arrêts' , array('class' => Request::is( 'admin/bail/arrets') ? 'active' : '') ) }}</li>
					    </ul>
				    </li>
			    </ul>
			</nav>
	
			<!-- Contenu -->		      	
	            @yield('content')	            
	        <!-- Fin contenu -->
	        	
		</div>
		<!-- Footer infos -->
		<footer role="contentinfo"><!--Footer--></footer>
			
	    <!-- Javascript Files
	    ================================================== -->        
   
	    <script type="text/javascript" src="<?php echo asset('js/admin/jquery-1.10.2.min.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('js/admin/jqueryui-1.10.3.min.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('js/admin/bootstrap.min.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('js/admin/enquire.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('js/admin/redactor/redactor.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('js/admin/jquery.cookie.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('js/admin/jquery.nicescroll.min.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('plugins/codeprettifier/prettify.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('plugins/form-toggle/toggle.min.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('plugins/form-parsley/messages.fr.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('plugins/form-parsley/parsley.min.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('plugins/form-daterangepicker/daterangepicker.min.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('plugins/form-daterangepicker/moment.min.js');?>"></script> 
	    <script type="text/javascript" src="<?php echo asset('plugins/datatables/jquery.dataTables.min.js');?>"></script>
	    <script type="text/javascript" src="<?php echo asset('plugins/datatables/dataTables.bootstrap.js');?>"></script>
	    <script type="text/javascript" src="<?php echo asset('js/admin/demo-datatables.js');?>"></script>
		<script type="text/javascript" src="<?php echo asset('js/admin/placeholdr.js');?>"></script> 
		<script type="text/javascript" src="<?php echo asset('js/admin/application.js');?>"></script> 	
		<script type="text/javascript" src="<?php echo asset('js/admin/jquery.jeditable.js');?>"></script> 	
	    <script type="text/javascript" src="<?php echo asset('js/admin/main.js');?>"></script>
    	
	</body>
</html>