@extends('layouts.admin')

@section('content')

<?php  $custom = new Custom; ?>

<div id="page-content">
	<div id="wrap">
	
		<div id="page-heading">
			<ol class="breadcrumb">
				<li class="active"><a href="{{ url('admin') }}">Dashboard</a></li>
			</ol>
			<h1>&Eacute;diter compte utilisateur</h1>
		</div>
		
		<div class="container"><!-- container -->		
			
			<!-- ====================== 
			   Info générales compte	
			=========================== -->
			
			<div class="row"><!-- row -->
				<div class="col-md-12"><!-- col -->
				
					<div class="panel panel-midnightblue"><!-- panel -->
						<div class="panel-body"><!-- panel body -->

							<div class="row"><!-- row -->
							
								<div class="col-md-6"><!-- col -->
									<div class="table-responsive">
									
										<h3><strong>{{ $user->prenom }} {{ $user->nom }}</strong></h3>
										
										<table class="table table-condensed">											
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
									</div>
									<?php
										
									if($user->activated)
									{ 	
								        $compte = '<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
						                               <i class="fa fa-check-circle"></i>&nbsp; Compte actif&nbsp;
						                               <span class="caret"></span>
						                           </button>';
									}
									else
									{
										$compte = '<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
						                               <i class="fa fa-minus-circle"></i>&nbsp; Compte inactif&nbsp;
						                               <span class="caret"></span>
						                           </button>';
									}
									
									?>
									<div class="btn-group">
			                            <?php echo $compte; ?>
			                            <ul class="dropdown-menu" role="menu">
			                           		<?php if($user->activated){ ?>
			                                <li><a href="{{ url('admin/users/'.$user->id.'/active') }}">Désactiver le compte</a></li>
			                                <li><a href="{{ url('admin') }}">Changer le mot de passe</a></li>
			                                <li><a href="{{ url('admin/adresses/user/'.$user->id.'/adresse') }}">Ajouter une adresse</a></li>
			                                <li class="divider"></li>
			                                <li><a href="{{ url('admin') }}"><small>Supprimer le compte</small></a></li>
			                                <?php } else{ ?>
			                                <li><a href="{{ url('admin/users/'.$user->id.'/active') }}">Activer le compte</a></li>
			                                <?php } ?>
			                              </ul>
		                            </div>

								</div>
								<div class="col-md-6">
								
									<h3><strong>Appartenances</strong></h3>
									
									<div class="well">
									<?php if( !$specialisations->isEmpty() ){ ?>
										 <div class="list-group">
										 	<?php  
										 		foreach ($specialisations as $spec)
										 		{ 											 
											 		echo '<p class="list-group-item">'.$spec->titreSpecialisation.'<a class="btn btn-xs btn-danger" href="">X</a></p>';
										 		} 
										 	?>
										 </div>
									<?php } ?>										 
									</div>  
									
								</div><!-- end col -->
								
							</div><!-- end row -->

						</div><!-- end panel body -->

					</div><!-- end panel -->
					
				</div><!-- end col -->
			</div><!-- end row -->
			
			<!-- =================================== 
			   Inscriptions and books for user	
			======================================== -->
			
			<div class="row"><!-- row -->
				<div class="col-md-12"><!-- col -->
					
				    @if($errors->has())				
						<ul>
						    @foreach($errors->all() as $message)						
						    <li>{{ $message }}</li>						
						    @endforeach
						</ul>						
					@endif
					
					@if(Session::has('status'))
					<div class="alert alert-dismissable alert-{{  Session::get('status') }}">
						@if(Session::has('message'))
							{{  Session::get('message') }}
						@endif
						<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
					</div>
					@endif
				
					<div class="tab-container tab-info">
						<ul class="nav nav-tabs">
							<li class="active">
								<a data-toggle="tab" href="#inscriptions">Inscriptions</a>
							</li>
							<li class="">
								<a data-toggle="tab" href="#achatshop">Achat shop</a>
							</li>
						</ul>
						<div class="tab-content">
							<div id="inscriptions" class="tab-pane active">
																							
								@if(!$inscriptions->isEmpty())
									@foreach($inscriptions as $inscription)
									
									    <div class="panel panel-primary">
									    	<div class="panel-body">
									    										    	
										    	<div class="row"><!-- row -->
										    		<div class="col-md-1">													
														<?php
															
															if(isset($vignettes[$inscription->event->id]))
															{
																$img      = $vignettes[$inscription->event->id];
																$url      = '/files/vignette/'.$img;
																$width    = 70;
																$vignette = $custom->fileExistFormatImage($url,$width);
																
																echo $vignette;
															}

														?>
										    		</div>
										    		<div class="col-md-4"><!-- col -->
										    			<h4><strong>{{ $inscription->event->titre }}</strong></h4>
														<dl>
															<dt>Date d'inscription</dt>
															<dd>{{ $inscription->inscription_at->format('d-m-Y') }}</dd>
														</dl>
										    		</div>
										    		<div class="col-md-2"><!-- col -->
										    			<h4><span class="label label-info">{{ $inscription->inscriptionNumber }}</span></h4>	
										    			<dl>
															<dt>Prix</dt>
															<dd>{{ $inscription->prices->remarquePrice }} : {{ $inscription->prices->price }}</dd>

																@if( !$options->isEmpty() )
																<dt>Options</dt>
																	@foreach($options as $option)
																		@if( $option->event_id == $inscription->event->id )
																			<dd>{{ $option->titreOption }}</dd>
																		@endif
																	@endforeach
																@endif														
														</dl>
										    		</div>
										    		<div class="col-md-5"><!-- col -->
										    			<h4><strong>Documents</strong></h4>
														@if( $docs )
															<div class="text-right btn-group">
															@foreach($docs as $name => $view)															
															<?php 																	
																$link = $custom->fileExistFormatLink( '/files/users/', $user->id, $inscription->event->id ,$view, $name ,'btn btn-default');
																if($link){ echo $link; }
															?>														
															@endforeach
															</div>
														@endif
																	
										    		</div>	
										    	</div><!-- end row -->
										    	
										    	<div class="row"><!-- row -->							    	
										    		<div class="col-md-12 text-right">
										    		
														 <div class="btn-group">
								                              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
								                                Actions &nbsp;<span class="caret"></span>
								                              </button>
								                              <ul class="dropdown-menu" role="menu">
								                                <li><a href="{{ $inscription->id }}">&Eacute;diter</a></li>
								                                <li><a href="#">Envoyer par email</a></li>
								                                <li><a href="#">Régénerer docs</a></li>
								                                <li class="divider"></li>
								                                <li><a href="#"><small>Désinscrire</small></a></li>
								                              </ul>
							                            </div>
							                            
										    		</div>
										    	</div><!-- end row -->
										    	
									    	</div>
									    </div>
									    
								    @endforeach
								    
								@else
								<p>Pas d'inscriptions</p>
							    @endif
								
							</div>
							<div id="achatshop" class="tab-pane">
								<div>								
									<p>Pas d'achats sur le shop</p>
								</div>
							</div>
						</div>
					</div>
					
				</div><!-- end col -->
			</div><!-- end row -->


			<!-- ====================== 
			  Adresses for compte	
			=========================== -->
						
			<?php  
			
				$adresses    = $user->adresses; 															
				$nbr_adresse = $adresses->count();
				$col         = ($nbr_adresse > 2 ? 4 : 6);
				
			?>

			<div class="row"><!-- row -->
				
			@foreach ($adresses as $adresse)

				<div class="col-md-<?php echo $col; ?>"><!-- col -->
					
					<div class="panel panel-sky"><!-- panel -->
					
						{{ Form::open(array( 'url' => 'admin/adresses/'.$adresse->id , 'method' => 'put')) }}	
						
						<div class="panel-body"><!-- panel body -->
								
								<div class="row">
									<div class="col-md-7 margeBottom">	
										<h3><strong><?php echo $custom->whatType($adresse->type); ?></strong></h3>
										<?php if( $adresse->livraison == 1){  ?>	
										<p class="text-info"><i class="fa fa-truck"></i> &nbsp;Adresse de livraison</p>
										<?php } else { ?>
										<p><i class="fa fa-home"></i> &nbsp;Adresse normale</p>
										<?php } ?>
									</div>	
									<div class="col-md-5 text-right">
										<div class="btn-group">				      			
						      				 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				                            	<i class="fa fa-gear"></i> &nbsp;Actions &nbsp;<span class="caret"></span>
				                            </button>
				                            <ul class="dropdown-menu" role="menu">								
												<?php if( $adresse->livraison == 1){  ?>				                           
				                                <li><a href="{{ $adresse->id }}">Changer en adresse normale</a></li>
											   <?php } else { ?>
				                                <li><a href="{{ $adresse->id }}">Changer en adresse de livraison</a></li>
											    <?php } ?>
				                         		<li class="divider"></li>
								                <li><a href="<?php echo url('admin/adresses/delete/'.$adresse->id.'/'.$adresse->user_id); ?>">
								                	<small class="text-danger">Supprimer</small></a>
								                </li>
				                            </ul>		                       
			                            </div>
									</div>
								</div>
							
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
								 	 <label for="telephone" class="col-sm-3 control-label">Téléphone</label>
								 	 <div class="col-sm-6">
										{{ Form::text('telephone', $adresse->telephone , array( 'class' => 'form-control required' ) ) }}	
									 </div>
									 <div class="col-sm-3"><p class="help-block"></p></div>
								</div>	
																		
								<div class="form-group row">
								 	 <label for="mobile" class="col-sm-3 control-label">Mobile</label>
								 	 <div class="col-sm-6">
										{{ Form::text('mobile', $adresse->mobile , array( 'class' => 'form-control required' ) ) }}	
									 </div>
									 <div class="col-sm-3"><p class="help-block"></p></div>
								</div>	
																		
								<div class="form-group row">
								 	 <label for="fax" class="col-sm-3 control-label">Fax</label>
								 	 <div class="col-sm-6">
										{{ Form::text('fax', $adresse->fax , array( 'class' => 'form-control required' ) ) }}	
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
										{{ Form::select('canton', $cantons , $adresse->canton , array( 'class' => 'form-control required' ) ) }}
									 </div>
									 <div class="col-sm-3"><p class="help-block"></p></div>
								</div>	

								<div class="form-group row">
								 	 <label for="pays" class="col-sm-3 control-label">Pays</label>
								 	 <div class="col-sm-6">
										{{ Form::select('pays', $pays , $adresse->pays , array( 'class' => 'form-control required' ) ) }}
									 </div>
									 <div class="col-sm-3"><p class="help-block">Requis</p></div>
								</div>	
									
							</div><!-- end panel body -->
						
							<div class="panel-footer"><!-- start panel footer -->
						      	<div class="row"><!-- start row -->				      	
						      		<div class="col-sm-12 text-right">
						      			{{ Form::hidden('user_id', $adresse->user_id ) }}
						      			{{ Form::hidden('redirectTo', 'users/'.$adresse->user_id) }}
						      			{{ Form::hidden('type', $adresse->type ) }}	
						      			{{ Form::hidden('id', $adresse->id ) }}		
							      		<button type="submit" class="btn-primary btn">&Eacute;diter</button>
						      		</div>
						      		
						      	</div><!-- end row -->
						    </div><!-- end panel footer -->
						    
							{{ Form::close() }}	
							
						</div><!-- end panel -->
						
					</div><!-- end col -->
								
			@endforeach
			
			</div><!-- end row -->	

		</div><!-- end container -->		
	</div><!-- end wrap -->
</div><!-- end page-content -->

@stop
