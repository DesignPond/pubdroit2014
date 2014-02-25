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
		<?php
echo '<pre>';
print_r($adresses);
echo '</pre>';
?>
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
									<th>Nom</th>
									<th>Status</th>
									<th>Adresses</th>									
									<th class="text-right">Options</th>
								</thead>
								<tbody>
									@foreach ($users as $user)
									<tr>							
										<td><a href="{{ action('AdminUserController@show', array($user->id)) }}">{{ $user->email }}</a></td>
										<td>{{ $user->prenom }} {{ $user->nom }}</td>
										<td><?php  if($user->activated == 1) { echo 'Active'; } else{ echo 'Inactive'; } ?></td>
										<td> 
											@if( !$user->adresses->isEmpty() )
												<div class="list-group">
												@foreach($user->adresses as $adresse)
												
													@if($adresse->type == '1')
														<a href="{{ url('admin/user/'.$adresse->id) }}" class="list-group-item"><i class="fa fa-envelope">
														</i>&nbsp;&nbsp;Contact</a>
													@endif
													
													@if($adresse->type == '2')
														<a href="{{ url('admin/user/'.$adresse->id) }}" class="list-group-item"><i class="fa fa-home">
														</i>&nbsp;&nbsp;Privé</a>
													@endif
													
													@if($adresse->type == '3')
														<a href="{{ url('admin/user/'.$adresse->id) }}" class="list-group-item"><i class="fa fa-briefcase">
														</i>&nbsp;&nbsp;Professionnelle</a>
													@endif
													
												@endforeach
												</div>
											@endif 
										</td>
										<td class="text-right">
											<button class="btn btn-info" type="button" onClick="location.href='{{ action('AdminUserController@edit', array($user->id)) }}'">
											&Eacute;diter</button> 
										</td>
									</tr>
									@endforeach
								</tbody>
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
								<tbody>
									
								</tbody>
							</table>
							
	                    </div><!-- end body panel --> 
                    </div><!-- end panel -->    
                                
                </div><!-- end col -->           
			</div><!-- end row -->

			
		</div><!-- end container  -->
	</div><!-- end wrap  -->
</div><!-- end pge-content  -->

@stop
