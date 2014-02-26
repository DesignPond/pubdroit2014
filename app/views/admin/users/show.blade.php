@extends('layouts.admin')

@section('content')

<?php  $custom = new Custom; ?>

<div id="page-content">
	<div id="wrap">
	
		<div id="page-heading">
			<ol class="breadcrumb">
				<li class="active"><a href="{{ url('admin') }}">Dashboard</a></li>
			</ol>
			<h1>Dashboard</h1>
		</div>
		
		<div class="container"><!-- container -->		
		
			<div class="row"><!-- row -->
				<div class="col-md-12"><!-- col -->
				
					<div class="panel panel-midnightblue"><!-- panel -->
						<div class="panel-body"><!-- panel body -->

							<div class="row"><!-- row -->
							
								<div class="col-md-6"><!-- col -->
									<div class="table-responsive">
										<table class="table table-condensed">
											<h3><strong>{{ $user->prenom }} {{ $user->nom }}</strong></h3>
											<tbody>
												<tr>
													<td>Email</td><td>{{ $user->email }}</td>
												</tr>
												<tr>
													<td>Account created: </td>
													<td><em>{{ $user->created_at->format('d-m-Y') }}</em></td>
												</tr>
												<tr>
													<td>Last Updated: </td>
													<td><em>{{ $user->updated_at->format('d-m-Y') }}</em></td>
												</tr>
											</tbody>
										</table>
										<button class="btn btn-primary" onClick="location.href='{{ action('UserController@edit', array($user->id)) }}'">Edit Profile</button>
									</div>
								</div>
								<div class="col-md-6">
									<h3>About</h3>

									<h4>Group Memberships:</h4>
									<?php  $userGroups = $user->groups->toArray(); ?>
									<div class="well">
									    <ul>
									    	@if (count($userGroups) >= 1)
										    	@foreach ($userGroups as $group)
													<li>{{ $group['name'] }}</li>
												@endforeach
											@else 
												<li>No Group Memberships.</li>
											@endif
									    </ul>
									</div>
								</div><!-- end col -->
								
							</div><!-- end row -->

						</div><!-- end panel body -->
					</div><!-- end panel -->
					
				</div><!-- end col -->
			</div><!-- end row -->
			
			<?php  $adresses = $user->adresses; ?>
			
			<div class="row"><!-- row -->
				<div class="col-md-12"><!-- col -->
				
					<div class="panel panel-sky"><!-- panel -->
						<div class="panel-body"><!-- panel body -->
							
							<?php
															
								$nbr_adresse = $adresses->count();
								$col = ($nbr_adresse > 2 ? 4 : 6);
							?>
							
							<div class="row"><!-- row -->
							@foreach ($adresses as $adresse)
		
								<div class="col-md-<?php echo $col; ?>"><!-- col -->
								
									{{ Form::open(array( 'url' => 'admin/pubdroit/event/upload' ,'files' => true )) }}
									
										<h3><?php echo $custom->whatType($adresse->type); ?></h3>
								
										<div class="form-group row">
										 	 <label for="id" class="col-sm-3 control-label">ID</label>
										 	 <div class="col-sm-6">
												{{ Form::text('id', $adresse->id , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block">Requis</p></div>
										</div>
										
										<div class="form-group row">
										 	 <label for="civilite" class="col-sm-3 control-label">Civilite</label>
										 	 <div class="col-sm-6">
												{{ Form::text('civilite', $custom->whatCivilite($adresse->civilite) , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block">Requis</p></div>
										</div>								 

										<div class="form-group row">
										 	 <label for="prenom" class="col-sm-3 control-label">Prénom</label>
										 	 <div class="col-sm-6">
												{{ Form::text('prenom', $adresse->prenom , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block">Requis</p></div>
										</div>
										
										<div class="form-group row">
										 	 <label for="nom" class="col-sm-3 control-label">Nom</label>
										 	 <div class="col-sm-6">
												{{ Form::text('nom', $adresse->nom , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block">Requis</p></div>
										</div>
										
										<div class="form-group row">
										 	 <label for="email" class="col-sm-3 control-label">Email</label>
										 	 <div class="col-sm-6">
												{{ Form::text('email', $adresse->email , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block">Requis</p></div>
										</div>
										
										<div class="form-group row">
										 	 <label for="entreprise" class="col-sm-3 control-label">Entreprise</label>
										 	 <div class="col-sm-6">
												{{ Form::text('entreprise', $adresse->entreprise , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block">Requis</p></div>
										</div>										
										
										<div class="form-group row">
										 	 <label for="profession" class="col-sm-3 control-label">Profession</label>
										 	 <div class="col-sm-6">
												{{ Form::text('profession', $custom->whatProfession($adresse->profession) , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block">Requis</p></div>
										</div>	
																																						 										
										<div class="form-group row">
										 	 <label for="adresse" class="col-sm-3 control-label">Adresse</label>
										 	 <div class="col-sm-6">
												{{ Form::text('adresse', $adresse->adresse , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block">Requis</p></div>
										</div>	
										
										<div class="form-group row">
										 	 <label for="npa" class="col-sm-3 control-label">NPA</label>
										 	 <div class="col-sm-6">
												{{ Form::text('npa', $adresse->npa , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block">Requis</p></div>
										</div>	
										
										<div class="form-group row">
										 	 <label for="ville" class="col-sm-3 control-label">Ville</label>
										 	 <div class="col-sm-6">
												{{ Form::text('ville', $adresse->ville , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block">Requis</p></div>
										</div>																					

										<div class="form-group row">
										 	 <label for="canton" class="col-sm-3 control-label">Canton</label>
										 	 <div class="col-sm-6">
												{{ Form::text('canton', $custom->whatCanton($adresse->canton) , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block">Requis</p></div>
										</div>	

										<div class="form-group row">
										 	 <label for="pays" class="col-sm-3 control-label">Pays</label>
										 	 <div class="col-sm-6">
												{{ Form::text('pays', $custom->whatPays($adresse->pays) , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block">Requis</p></div>
										</div>	

									
									{{ Form::close() }}	
								</div><!-- end col -->
		
							@endforeach
							</div><!-- end row -->


						</div><!-- end panel body -->
					</div><!-- end panel -->
					
				</div><!-- end col -->
			</div><!-- end row -->

		</div><!-- end container -->		
	</div><!-- end wrap -->
</div><!-- end page-content -->

@stop
