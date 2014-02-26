@extends('layouts.admin')

@section('content')

<div id="page-content">
	<div id="wrap">
	
		<div id="page-heading">
			<ol class="breadcrumb">
				<li class="active"><a href="{{ url('admin') }}">Dashboard</a></li>
			</ol>
			<h1>Dashboard</h1>
		</div>
		
		<div class="container">

			<div class="row">
	          <div class="col-md-12">
	              <div class="panel panel-sky">               
	                  <div class="panel-heading">
	                        <h4>Utilisateurs</h4>
	                  </div>
	                  <div class="panel-body collapse in">
	                  
	                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered results_table" id="example">
								<thead>
									<th>Nom d'utilisateur</th>
									<th>Prénom</th>
									<th>Nom</th>
									<th>Status</th>
									<th>Adresses</th>									
									<th class="text-right">Options</th>
								</thead>
								<tbody></tbody>
							</table>
							
	                    </div><!-- end body panel --> 
                    </div><!-- end panel -->    
                                
                </div><!-- end col -->           
			</div><!-- end row -->

			<div class="row"><!-- start row -->
	          <div class="col-md-12">
	              <div class="panel panel-sky">               
	                  <div class="panel-heading">
	                        <h4>Adresses</h4>
	                  </div>
	                  <div class="panel-body collapse in">
	                  
	                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered adresse_table" id="example2">
								<thead>
									<th>Email</th>
									<th>Prénom</th>
									<th>Nom</th>
									<th>Adresses</th>
									<th>Ville</th>									
								</thead>
								<tbody></tbody>
							</table>
							
	                    </div><!-- end body panel --> 
                    </div><!-- end panel -->    
                                
                </div><!-- end col -->           
			</div><!-- end row -->

			
		</div><!-- end container  -->
	</div><!-- end wrap  -->
</div><!-- end pge-content  -->

@stop
