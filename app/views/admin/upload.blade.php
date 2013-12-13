@extends('layouts.admin')

@section('content')

	<div id="page-content">
		<div id="wrap">
			<div id="page-heading">
				<ol class="breadcrumb">
					<li class="active"><a href="index.htm">Dashboard</a></li>
				</ol>
				<h1>Dashboard</h1>
			</div>
			<div class="container">
			
			<!-- row -->
				<div class="row">
	                <div class="col-md-12">
	                
					
	                </div>
	            </div>
	        <!-- end row -->
	                      	        			
		        <!-- Start row -->
	            <div class="row">
	              <div class="col-md-12">
	                    <div class="panel panel-sky">
	                    
	                        <div class="panel-heading">
	                            <h4>Files</h4>
	                        </div>
	                        
	                        <div class="panel-body collapse in">
	                        	{{ Form::open(array( 'url' => 'admin/upload', 'files' => true , 'class' => 'form-horizontal')) }}
	                        	
								<div class="form-group">
								    <label for="file" class="col-sm-3 control-label">Fichier</label>
								    <div class="col-sm-2">
									    <input id="uploadFile" class="form-control" disabled="disabled" placeholder="Choose File">
								    </div>
								    <div class="col-sm-5">	
								    						     	
										<div class="btn-group">
											<div class="fileUpload btn btn-primary">
										    	<span>Choisir</span>
										   		<input id="uploadBtn" type="file" name="file" class="upload" />
											</div>
											<button type="submit" class="btn btn-success" type="button">Envoyer</button>
										</div>
										
								    </div>
								</div>

								{{ Form::close() }}	                        		                        	
	                        </div>
	                        
	                    </div>
	                </div>
	            </div>
            
	        	<!-- end row -->
			</div>
		</div>
	</div>
    	
@stop