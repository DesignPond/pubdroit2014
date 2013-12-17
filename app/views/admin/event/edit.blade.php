@extends('layouts.admin')

@section('content')

<div id="page-content">
	<div id="wrap">
			
		<div id="page-heading">
			<ol class="breadcrumb">
				<li><a href="index.htm">Dashboard</a></li>
				<li>Colloque</li>
				<li class="active">&Eacute;diter</li>
			</ol>
			<h1>&Eacute;diter un colloque</h1>
		</div>
		
		<div class="container">
		    <div class="row">
				<div class="col-sm-12">	
									
				   @if($errors->has())
						We encountered the following errors:						
						<ul>
						    @foreach($errors->all() as $message)						
						    <li>{{ $message }}</li>						
						    @endforeach
						</ul>						
					@endif
					
					@if(Session::has('status'))
					<div class="alert alert-dismissable alert-{{  Session::get('status') }}">
						<strong>Well done!</strong>You successfully read this important alert message.
						<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
					</div>
					@endif
					
					<!-- panel start -->
					<div class="panel panel-primary">
				       <div class="panel-heading"><h4><i class="fa fa-picture-o"></i> &nbsp;Images et documents</h4></div>
					    <div class="panel-body"><!-- start panel content -->
					    	
							@foreach($documents as $type => $document)
							
								<!-- Documents -->
						    	<div class="row">
								@if( !empty($allfiles[$type]) )
						    		@foreach($document as $doc)						    			
						    			
						    			@if( isset($allfiles[$type][$doc]) )
											<div class="col-sm-3">
											    <div class="panel panel-info">
											    	<div class="panel-body admin-icon-panel">								    		
												    	<span class="admin-panel-{{ $type }}">
												    		@if($type == 'images')
												    		<img src="{{ asset('files/'.$doc.'/'.$allfiles[$type][$doc]->filename); }}" class="admin-icon" alt="icon" />
												    		@else
												    		<img src="{{ asset('images/admin/icons/file.png') }}" alt="icon" />
												    		@endif
												    	</span>
												    	<p><strong>{{ ucfirst($doc) }}</strong></p>
												    	<input class="uploadFile" disabled="disabled" placeholder="{{ $allfiles[$type][$doc]->filename }}">
												    	<div class="btn-group admin-icon-options">
													    	<a href="#" class="btn btn-sm btn-info">changer</a>
													    	<a href="#" class="btn btn-sm btn-danger">supprimer</a>
												    	</div>
											    	</div>
											    </div>
											</div>	
						    			@else
											<div class="col-sm-3">
												<div class="panel panel-info">
											    	<div class="panel-body admin-icon-panel">
											    		<p><strong>{{ ucfirst($doc) }}</strong></p>
											    		
											    		{{ Form::open(array( 'url' => 'admin/pubdroit/event/upload' ,'files' => true )) }}
												    	<input class="uploadFile" disabled="disabled" placeholder="">
												    	<input type="hidden" name="destination" value="files/{{ $doc }}/" />
												    	<input type="hidden" name="typeFile" value="{{ $doc }}" />	
												    	<input type="hidden" name="event_id" value="{{ $event->id }}" />				     	
														<div class="btn-group admin-icon-options">
															<div class="fileUpload btn btn-sm btn-primary">
														    	<span>&nbsp;Choisir&nbsp;</span>
														   		<input class="uploadBtn upload" type="file" name="file" />
															</div>
															<button type="submit" class="btn btn-sm btn-success" type="button">&nbsp;Envoyer&nbsp;</button>
														</div>
														{{ Form::close() }}	
														
											    	</div>
											    </div>
											</div>	
						    			@endif
						    																							
									@endforeach
									
								@else
								
									@foreach($document as $doc)						    			
					    				<div class="col-sm-3">
											<div class="panel panel-info">
										    	<div class="panel-body admin-icon-panel">
										    		<p><strong>{{ ucfirst($doc) }}</strong></p>
										    		
										    		{{ Form::open(array( 'url' => 'admin/pubdroit/event/upload' ,'files' => true )) }}
											    	<input class="uploadFile" disabled="disabled" placeholder="">
											    	<input type="hidden" name="destination" value="files/{{ $doc }}/" />
											    	<input type="hidden" name="typeFile" value="{{ $doc }}" />	
											    	<input type="hidden" name="event_id" value="{{ $event->id }}" />				     	
													<div class="btn-group admin-icon-options">
														<div class="fileUpload btn btn-sm btn-primary">
													    	<span>&nbsp;Choisir&nbsp;</span>
													   		<input class="uploadBtn upload" type="file" name="file" />
														</div>
														<button type="submit" class="btn btn-sm btn-success" type="button">&nbsp;Envoyer&nbsp;</button>
													</div>
													{{ Form::close() }}	
													
										    	</div>
										    </div>
										</div>												
									@endforeach	
																	
								@endif	
								
						    	</div><!-- end row -->
						    	
							
							@endforeach
					    	
					    </div><!-- end panel content -->
					</div><!-- end panel -->

					<!-- form start --> 
					{{ Form::model($event,array(
						'method' => 'PATCH',
						'id' => 'validate-form',
						'data-validate' => 'parsley',
						'class' => 'form-horizontal',
						'route' => array('admin.pubdroit.event.update',$event->id))) 
					}} 

					<!-- panel start -->
					<div class="panel panel-green">
	
				       <div class="panel-heading"><h4><i class="fa fa-calendar-o"></i> Informations</h4></div>
					   <div class="panel-body"><!-- start panel content -->
					    
							<h3>Général</h3>
							  <div class="form-group">
								  <label for="organisateur" class="col-sm-3 control-label">Organisateur</label>
								  <div class="col-sm-6">
								      {{ Form::text('organisateur', null , array('class' => 'form-control required' )) }}
								  </div>
								  <div class="col-sm-3"><p class="help-block">Requis</p></div>
							  </div>
							  
							  <div class="form-group">
								  <label for="titre" class="col-sm-3 control-label">Titre</label>
								  <div class="col-sm-6">
								      {{ Form::text('titre', null , array('class' => 'form-control required' )) }}
								  </div>
								  <div class="col-sm-3"><p class="help-block">Requis</p></div>
							  </div>
							  
							  <div class="form-group">
								  <label for="soustitre" class="col-sm-3 control-label">Sous-titre</label>
								  <div class="col-sm-6">
								      {{ Form::text('soustitre', null , array('class' => 'form-control' )) }}
								  </div>
								  <div class="col-sm-3"><p class="help-block"></p></div>
							  </div>
							  
							  <div class="form-group">
								  <label for="sujet" class="col-sm-3 control-label">Sujet</label>
								  <div class="col-sm-6">
								      {{ Form::text('sujet', null , array('class' => 'form-control required' )) }}
								  </div>
								  <div class="col-sm-3"><p class="help-block">Requis</p></div>
							  </div>							  							  							
							  
							  <div class="form-group">
							  	  <label for="description" class="col-sm-3 control-label">Description</label>
							  	  <div class="col-sm-6">
							  	  	 {{ Form::textarea('description', null , array('class' => 'form-control redactor', 'cols' => '50' , 'rows' => '4' )) }}
							  	  </div>
							  </div>
							  
							  <div class="form-group">
							  	  <label for="endroit" class="col-sm-3 control-label">Endroit</label>
							  	  <div class="col-sm-6">
							  	  	 {{ Form::text('endroit', null , array('class' => 'form-control required' )) }}
							  	  </div>
							  </div>
							  
					          <div class="form-group">
					               <label class="col-sm-3 control-label">Date de début</label>
					               <div class="col-sm-6">
					                   {{ Form::text('dateDebut', null ,array('class' => 'form-control datepicker required', 'id' => 'dateDebut' )) }}
					               </div>
					          </div>	
					          
					          <div class="form-group">
					               <label class="col-sm-3 control-label">Date de fin</label>
					               <div class="col-sm-6">
					                   {{ Form::text('dateFin', null , array('class' => 'form-control datepicker required', 'id' => 'dateFin' )) }}
					               </div>
					          </div>							          					  							  
							  
					          <div class="form-group">
					               <label class="col-sm-3 control-label">Délai d'inscription</label>
					               <div class="col-sm-6">
					                   {{ Form::text('dateDelai', null , array('class' => 'form-control datepicker required', 'id' => 'dateDelai' )) }}
					               </div>
					          </div>				          
							  
							  <div class="form-group">
							  	  <label for="remarques" class="col-sm-3 control-label">Remarques</label>
							  	  <div class="col-sm-6">
							  	  	 {{ Form::textarea('remarques', null , array('class' => 'form-control redactor', 'cols' => '50' , 'rows' => '4' )) }}
							  	  </div>
							  </div>
					    </div>
					</div><!-- end panel -->
					
					<?php
/*
						echo '<pre>';
						print_r($event->prices);
						echo '</pre>';
*/
					?>
					
					<!-- panel start -->
					<div class="panel panel-green">	
				       <div class="panel-heading"><h4><i class="fa fa-calendar-o"></i> Prix et Options</h4></div>
					   <div class="panel-body"><!-- start panel content -->
					   					     
							  <h3>Prix</h3>
							  <div class="row">
							  	  <div class="col-sm-6 col-md-offset-3">
							  	  
							  	  	  @if ( ! $event->prices->isEmpty() )
							  	  	  
							  	  	  <h4>PRIX COLLOQUES</h4>
							  	  	  
								  	  <div class="panel panel-midnightblue">
										  <div class="panel-body">
											  <ul class="list-group sortable">
											  	@foreach($event->prices as $price)
											  		@if($price->typePrix == 1)
											  			<li class="list-group-item">
											  				<div class="row">
												  				<div class="col-sm-11">
														  			<span class="label label-primary">{{ $price->prix }} CHF</span> &nbsp;{{ $price->remarquePrix }}
														  		</div>
													  			<div class="col-sm-1">
																	<a href="#" class="btn btn-xs btn-danger">X</a>															
																</div>
															</div>
											  			</li>
												  	@endif
												@endforeach
											  </ul>
										  </div>
								  	  </div>
								  	  					
								  	  <h4>PRIX SPÉCIAUX ( pour administration )</h4>
								  	  
								  	  <div class="panel panel-orange">
										  <div class="panel-body">
											  <ul class="list-group sortable">
											  	@foreach($event->prices as $price)
											  		@if($price->typePrix == 2)
											  			<li class="list-group-item">
											  				<div class="row">
												  				<div class="col-sm-11">
														  			<span class="label label-primary">{{ $price->prix }} CHF</span> &nbsp;{{ $price->remarquePrix }}
														  		</div>
													  			<div class="col-sm-1">
																	<a href="#" class="btn btn-xs btn-danger">X</a>															
																</div>
															</div>
											  			</li>
												  	@endif
												@endforeach
											  </ul>
										  </div>
								  	  </div>
								  	  
								  	  @endif
								  	  
							  	  </div>				
							  </div>
							  <?php
/*
								echo '<pre>';
								print_r($event->event_options);
								echo '</pre>';
*/
							  ?>
							  <h3>Options</h3>
							  <div class="row">
					  	 		 <div class="col-sm-6 col-md-offset-3">
									  <ul class="list-group">
									  @if ( ! $event->event_options->isEmpty() )
									  	@foreach($event->event_options as $option)
									  		<li class="list-group-item">
									  			<div class="row">
									  				<div class="col-sm-11">
									  					@if($option->typeOption == 'checkbox' )
											  				<i class="fa fa-square-o"></i>
											  			@else
											  				<i class="fa fa-pencil-square-o"></i>
											  			@endif
											  			&nbsp;&nbsp;
											  			<span 
											  				data-id="<?php echo $option->id; ?>" 
											  				data-table="event_options"  
											  				data-column="titreOption" class="edit_text"><?php echo $option->titreOption; ?></span>
											  		</div>
										  			<div class="col-sm-1 text-right">
														<a class="btn btn-xs btn-danger deleteAction" data-action="<?php echo $option->titreOption; ?>" href="#">X</a>						
													</div>
												</div>
									  		</li>
									  	@endforeach
									  @endif
									  </ul>
								  </div>
							  </div>						  		
							  									  
							  <h3>Spécialisations</h3> 
						  	  <div class="row">						  	  
					  	  		 <div class="col-sm-6 col-md-offset-3">
									  <ul class="list-group">
								  		@if ( ! $event->event_specialisations->isEmpty() )
										  	@foreach($event->event_specialisations as $specialisation)
										  		<li class="list-group-item">
										  			<div class="row">
										  				<div class="col-sm-11">
												  			<i class="fa fa-question-circle"></i>&nbsp;&nbsp;
												  			<span 
												  				data-id="<?php echo $specialisation->id; ?>" 
												  				data-table="event_specialisations" 
												  				data-column="titreSpecialisation" class="edit_text"><?php echo $specialisation->titreSpecialisation; ?></span>
												  		</div>
											  			<div class="col-sm-1">
															<a class="btn btn-xs btn-danger deleteAction" data-action="<?php echo $specialisation->titreSpecialisation; ?>" href="#">X</a>
														</div>
													</div>
										  		</li>
										  	@endforeach							  		
								  		@endif
									  </ul>
								  </div>
							  </div>
							  	
					    </div><!-- end panel content -->

					</div><!-- end panel -->

					<!-- panel start -->
					<div class="panel panel-green">	
				       <div class="panel-heading"><h4><i class="fa fa-calendar-o"></i> Configuration</h4></div>
					   <div class="panel-body"><!-- start panel content -->
					   					     
							  <h3>Documents</h3>

							  <div class="form-group">
							  	  <label for="selector1" class="col-sm-3 control-label">Compte pour BV</label>
							  	  <div class="col-sm-6">
							  	  	 {{ Form::select('compte_id', $comptes , null , array( 'class' => 'form-control required' ) ) }}
							  	  </div>
							  	  <div class="col-sm-3"><p class="help-block">Requis si génération du BV</p></div>
							  </div>	
							  
							  <div class="form-group">
							  	  <label for="selector1" class="col-sm-3 control-label">Choisir si génération factures et emails</label>
							  	  <div class="col-sm-6">
							  	  	 {{
							  	  	    Form::select('typeColloque', array(
							  	  	    		'0' => 'Sans Documents', 
							  	  	    		'1' => 'Avec tous les documents / Que Bon',
							  	  	    		'2' => 'Que facture et BV'
							  	  	    	), null , array( 'class' => 'form-control' ) )
							  	  	 }}												  	 
								  	 <p><br/><strong>Avec tous les documents / Que Bon + info BV</strong> = Tous les documents<br/>
								  	  <strong>Avec tous les documents / Que Bon + pas d'info BV</strong> = Que bon</p>								  	  
							  	  </div>
							  	  <div class="col-sm-3"><p class="help-block">Requis</p></div>
							  </div>						
							  
							  <h3>Visibilité</h3>
							  
							  <div class="form-group">
							  	  <label for="selector1" class="col-sm-3 control-label">Visible</label>
							  	  <div class="col-sm-6">
							  	  	 {{
							  	  	    Form::select('visible', array(
							  	  	    		'0' => 'Non Visible', 
							  	  	    		'1' => 'Visible'
							  	  	    	), null , array( 'class' => 'form-control' ) )
							  	  	 }}												  	 						  	  
							  	  </div>
							  </div>	
							
							<!-- form end --> 
					    </div><!-- end panel content -->
					    <div class="panel-footer">
					      	<div class="row">
					      		<div class="col-sm-6 col-sm-offset-3">
					      			<div class="btn-toolbar">
					      				{{ Form::hidden('id', null )}}
						      			<button type="submit" class="btn-primary btn">Envoyer</button>
					      			</div>
					      		</div>
					      	</div>
					    </div>

					</div><!-- end panel -->
										
					{{ Form::close() }}
					
				</div>
			</div>
	    </div>
    
	</div>
</div>
    
@stop