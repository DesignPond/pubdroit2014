@extends('layouts.admin')

@section('content')

<?php  $custom = new Custom; ?>

<div id="page-content">
	<div id="wrap">
	
		<div id="page-heading">
			<ol class="breadcrumb">
				<li class="active"><a href="{{ url('admin') }}">Dashboard</a></li>
			</ol>
			<h1>&Eacute;diter adresse</h1>
		</div>
		
		<div class="container"><!-- container -->
					
			<div class="row"><!-- row -->
				<div class="col-md-12"><!-- col -->	
					<?php if( $adresse->user_id > 0 ){ ?>
						<p><a class="btn btn-default" href="{{ url('admin/users') }}"><i class="fa fa-reply"></i> &nbsp;Retour</a></p>				
					<?php } else { ?>
						<p><a class="btn btn-default" href="{{ url('admin/adresses') }}"><i class="fa fa-reply"></i> &nbsp;Retour</a></p>				
					<?php } ?>	
				</div>
			</div>		
			
			<div class="row"><!-- row -->
				<div class="col-md-6"><!-- col -->		

					<div class="panel panel-midnightblue"><!-- panel -->
						<div class="panel-body"><!-- panel body -->

								@if( !empty($adresse) )
								
								{{ Form::open(array( 'url' => 'admin/adresses')) }}
									
									<h3><strong><?php echo $custom->whatType($adresse->type); ?></strong></h3>						

										<div class="form-group row">
										 	 <label for="civilite" class="col-sm-3 control-label">Civilite</label>
										 	 <div class="col-sm-6">	
												{{ Form::select('civilite', $civilites , $adresse->civilite , array( 'class' => 'form-control required' ) ) }}		
											 </div>
											 <div class="col-sm-3"><p class="help-block"></p></div>
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
											 <div class="col-sm-3"><p class="help-block"></p></div>
										</div>										
										
										<div class="form-group row">
										 	 <label for="profession" class="col-sm-3 control-label">Profession</label>
										 	 <div class="col-sm-6">
												{{ Form::select('profession', $professions , $adresse->profession , array( 'class' => 'form-control required' ) ) }}	
											 </div>
											 <div class="col-sm-3"><p class="help-block"></p></div>
										</div>	
										
										<div class="form-group row">
										 	 <label for="fonction" class="col-sm-3 control-label">Fonction</label>
										 	 <div class="col-sm-6">
												{{ Form::text('fonction', $adresse->fonction , array( 'class' => 'form-control required' ) ) }}	
											 </div>
											 <div class="col-sm-3"><p class="help-block"></p></div>
										</div>											
								
										<div class="form-group row">
										 	 <label for="adresse" class="col-sm-3 control-label">Adresse</label>
										 	 <div class="col-sm-6">
												{{ Form::text('adresse', $adresse->adresse , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block">Requis</p></div>
										</div>	
										
										<div class="form-group row">
										 	 <label for="complement" class="col-sm-3 control-label">Complément d'adresse</label>
										 	 <div class="col-sm-6">
												{{ Form::text('complement', $adresse->complement , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block"></p></div>
										</div>	
																				
										<div class="form-group row">
										 	 <label for="cp" class="col-sm-3 control-label">Case postale</label>
										 	 <div class="col-sm-6">
												{{ Form::text('cp', $adresse->cp , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block"></p></div>
										</div>	
										
										<div class="form-group row">
										 	 <label for="npa" class="col-sm-3 control-label">NPA</label>
										 	 <div class="col-sm-6">
												{{ Form::text('npa', $adresse->npa , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block"></p></div>
										</div>	
										
										<div class="form-group row">
										 	 <label for="ville" class="col-sm-3 control-label">Ville</label>
										 	 <div class="col-sm-6">
												{{ Form::text('ville', $adresse->ville , array('class' => 'form-control required' )) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block"></p></div>
										</div>																					

										<div class="form-group row">
										 	 <label for="canton" class="col-sm-3 control-label">Canton</label>
										 	 <div class="col-sm-6">
												{{ Form::select('canton', $cantons , $adresse->canton , array( 'class' => 'form-control required' ) ) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block"></p></div>
										</div>	

										<div class="form-group row">
										 	 <label for="pays" class="col-sm-3 control-label">Pays</label>
										 	 <div class="col-sm-6">
												{{ Form::select('pays', $pays , $adresse->pays , array( 'class' => 'form-control required' ) ) }}
											 </div>
											 <div class="col-sm-3"><p class="help-block"></p></div>
										</div>																			

						</div><!-- end panel body -->
						
						<div class="panel-footer">
					      	<div class="row">
				      			<div class="btn-toolbar">
				      				{{ Form::hidden('id', $adresse->id ) }}	
					      			<button type="submit" class="btn-primary btn">Envoyer</button>
				      			</div>
					      	</div>
					    </div>
					    
						{{ Form::close() }}	
						@endif	
							
					</div><!-- end panel -->
					
					</div><!-- end col -->	
					
					<div class="col-md-6"><!-- col -->
					
					<?php if( $adresse->user_id != 0 ){ ?>

					<!-- If is a user adresse -->
					<div class="panel panel-danger"><!-- panel -->
						<div class="panel-body"><!-- panel body -->
								
							<h3><strong>Lié au compte</strong></h3>
					
							<table class="table table-condensed">
								<h4><strong>{{ $user->prenom }} {{ $user->nom }}</strong></h4>
								<tbody>
									<tr>
										<td>Email</td><td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
									</tr>
									<tr>
										<td>Compte crée le: </td>
										<td><em>{{ $user->created_at->format('d-m-Y') }}</em></td>
									</tr>
									<tr>
										<td>Dernière modification: </td>
										<td><em>{{ $user->updated_at->format('d-m-Y') }}</em></td>
									</tr>
								</tbody>
							</table>									 																									

						</div><!-- end panel body -->
					</div><!-- end panel -->
					<?php } ?>	
					
					<!-- Membres et specialisations -->
					<div class="panel panel-warning"><!-- panel -->
						<div class="panel-body"><!-- panel body -->
								
							<h3><strong>Appartenances</strong></h3>
													
							<?php if( !$specialisations->isEmpty() ){ ?>

							<h4>Spécialisations</h4>
							<div class="well">
								 <div class="list-group">
								 	<?php  
								 		foreach ($specialisations as $spec)
								 		{ 											 
									 		echo '<p class="list-group-item">'.$spec->titreSpecialisation.'<a class="btn btn-xs btn-danger" href="">X</a></p>';										 		
								 		} 
								 	?>
								 </div>
							</div>  
							<?php } ?>										 
							
							<?php if( !$membres->isEmpty() ){ ?>
							<h4>Membres</h4>
							<div class="well">
								 <div class="list-group">
								 	<?php  
								 		foreach ($membres as $membre)
								 		{ 											 
									 		echo '<p class="list-group-item">'.$membre->titreMembre.'<a class="btn btn-xs btn-danger" href="">X</a></p>';										 		
								 		} 
								 	?>
								 </div>
							</div>  
							<?php } ?>										 

						</div><!-- end panel body -->
					</div><!-- end panel -->
					
				</div><!-- end col -->

			</div><!-- end row -->

			
		</div><!-- end container -->		
	</div><!-- end wrap -->
</div><!-- end page-content -->

@stop
