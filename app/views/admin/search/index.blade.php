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
			
				<!-- row -->
					<div class="row">
		                <div class="col-md-12">
		                
			                {{ Form::open(array( 'url' => 'admin/search' )) }}
				                <div class="form-group">
									<label class="col-sm-1 control-label">Recherche</label>
										<div class="col-sm-4">
											<div class="input-group">
											<input class="form-control" name="search" type="text">
											<div class="input-group-btn">
												<button class="btn btn-info" type="button">Go!</button>
											</div>
										</div>
									</div>
								</div>
				             {{ Form::close() }}	
						
		                </div>
		            </div>
		        <!-- end row -->
		        <hr/>

				<!-- Start row -->
				
				<div class="row">
	              <div class="col-md-12">
	                    <div class="panel panel-sky">
	                    
	                        <div class="panel-heading">
	                            <h4>Resultats</h4>
	                        </div>
	                        
	                        <div class="panel-body collapse in">
	                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered results_table" id="example">
	                                <thead>
	                                    <tr>
	                                        <th>Id</th>
	                                        <th>Prenom</th>
	                                        <th>Nom</th>
	                                        <th>Email</th>
	                                        <th>Entreprise</th>
	                                        <th>Adresse</th>	                                        
	                                        <th>Ville</th>
	                                        <th>ID user</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                <?php if(!empty($data)){ ?>
	                                <?php foreach($data as $result){ ?>
	                                    <tr class="odd gradeX">
	                                        <td><a class="btn btn-primary btn-xs" href="{{ url('admin/user/'.$result->id) }}">éditer</a></td>
	                                        <td><?php echo $result->prenom; ?></td>
	                                        <td><?php echo $result->nom; ?></td>
	                                        <td class="center"><?php echo $result->email; ?></td>
	                                        <td class="center"><?php echo $result->entreprise; ?></td>	
	                                        <td class="center"><?php echo $result->adresse; ?></td>	                                        
	                                        <td class="center"><?php echo $result->ville; ?></td>
	                                        <td class="center"><?php echo $result->user_id; ?></td>
	                                    </tr>
	                                <?php }} ?>
	                                </tbody>
	                            </table>
	                        </div>
	                        
	                    </div>	                
	                </div>
				</div>  
			 
				      
				<!-- end row -->

			</div>
		</div>
	</div>
    	
@stop