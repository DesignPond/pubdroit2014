@extends('layouts.admin')

@section('content')

<div id="page-content">
	<div id="wrap">
			
		<div id="page-heading">
			<ol class="breadcrumb">
				<li><a href="index.htm">Dashboard</a></li>
				<li>Colloque</li>
				<li class="active">&Eacute;dier</li>
			</ol>
			<h1>&Eacute;dier un colloque</h1>
		</div>
		
		<div class="container">
		    <div class="row">
				<div class="col-sm-12">	
				
					<!-- panel start -->
					<div class="panel panel-primary">
				       <div class="panel-heading"><h4><i class="fa fa-picture-o"></i> &nbsp;Images et documents</h4></div>
					    <div class="panel-body"><!-- start panel content -->
					    	<div class="row">
								<div class="col-sm-3">
								    <div class="panel panel-info">
								    	<div class="panel-body admin-icon-panel">								    		
									    	<img src="{{ asset('images/admin/icons/file.png'); }}" class="admin-icon" alt="icon" />
									    	<p><strong>Document</strong></p>
									    	<div class="btn-group admin-icon-options">
										    	<a href="#" class="btn btn-sm btn-info">changer</a>
										    	<a href="#" class="btn btn-sm btn-danger">supprimer</a>
									    	</div>
								    	</div>
								    </div>
								</div>
								<div class="col-sm-3">
									<div class="panel panel-info">
								    	<div class="panel-body">Body</div>
								    </div>
								</div>
								<div class="col-sm-3">
								    <div class="panel panel-info">
								    	<div class="panel-body">Body</div>
								    </div>
								</div>
								<div class="col-sm-3">
								    <div class="panel panel-info">
								    	<div class="panel-body">Body</div>
								    </div>
								</div>
					    	</div>
					    </div><!-- end panel content -->
					</div><!-- end panel -->
				
					<!-- panel start -->
					<div class="panel panel-primary">
				       <div class="panel-heading"><h4><i class="fa fa-calendar-o"></i> &nbsp;Général</h4></div>
					    <div class="panel-body"><!-- start panel content -->
						    <!-- form start --> 
							{{ Form::model($event, array('method' => 'PATCH' ,'class' => 'form-horizontal','route' => array('admin.pubdroit.event.update', $event->id)) ) }}
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
					                   {{ Form::text('dateDebut',Custom::formatDate(Form::getValueAttribute("dateDebut")),array('class' => 'form-control datepicker required', 'id' => 'dateDebut' )) }}
					               </div>
					          </div>	
					          
					          <div class="form-group">
					               <label class="col-sm-3 control-label">Date de fin</label>
					               <div class="col-sm-6">
					                   {{ Form::text('dateDebut', null , array('class' => 'form-control datepicker required', 'id' => 'dateFin' )) }}
					               </div>
					          </div>							          					  							  
							  
					          <div class="form-group">
					               <label class="col-sm-3 control-label">Délai d'inscription</label>
					               <div class="col-sm-6">
					                   {{ Form::text('dateDebut', null , array('class' => 'form-control datepicker required', 'id' => 'dateDelai' )) }}
					               </div>
					          </div>				          
							  
							  <div class="form-group">
							  	  <label for="remarques" class="col-sm-3 control-label">Remarques</label>
							  	  <div class="col-sm-6">
							  	  	 {{ Form::textarea('remarques', null , array('class' => 'form-control redactor', 'cols' => '50' , 'rows' => '4' )) }}
							  	  </div>
							  </div>
							  					
							{{ Form::close() }}
							<!-- form end --> 
					    </div><!-- end panel content -->
					    <div class="panel-footer">
					      	<div class="row">
					      		<div class="col-sm-6 col-sm-offset-3">
					      			<div class="btn-toolbar">
						      			<button type="submit" class="btn-primary btn">Envoyer</button>
					      			</div>
					      		</div>
					      	</div>
					    </div>

					</div><!-- end panel -->
					
				</div>
			</div>
	    </div>
    
	</div>
</div>
    
@stop