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
		                
			                {{ Form::open(array( 'url' => 'admin/search' )) }}
				                <div class="form-group">
									<label class="col-sm-1 control-label">Recherche</label>
										<div class="col-sm-4">
											<div class="input-group">
											<input class="form-control" type="text">
											<div class="input-group-btn">
												<button class="btn btn-info" type="button">Go!</button>
											</div>
										</div>
									</div>
								</div>
				             {{ Form::close() }}	
				              
			                <?php
			                
			                	if(!empty($data)){
									echo '<pre>';
									print_r($data);
									echo '</pre>';
			                	}

							?>
						
		                </div>
		            </div>
		        <!-- end row -->

			</div>
		</div>
	</div>
    	
@stop