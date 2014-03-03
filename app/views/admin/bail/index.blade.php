@extends('layouts.admin')

@section('content')

<div id="page-content">
	<div id="wrap">
	
		<div id="page-heading">
			<ol class="breadcrumb">
				<li class="active"><a href="{{ url('admin') }}">Dashboard</a></li>
			</ol>
			<h1>Arrêts</h1>
			<div class="options">
	            <div class="btn-toolbar">
	                <a href="{{ url('admin/bail/arrets/create') }}" class="btn btn-default"><i class="fa fa-plus"></i> &nbsp;Ajouter arrêt</a>
	            </div>
			</div>
		</div>
		
		<div class="container">
			
			<!-- Arrets bail -->
			<div class="row">
	          <div class="col-md-12">
	              <div class="panel panel-danger">               
	                  <div class="panel-heading">
	                        <h4>Bail</h4>
	                  </div>
	                  <div class="panel-body collapse in">
	                  
	                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered arrets_table" id="users_table">
								<thead>
									<th>Réference</th>
									<th>Date de parution</th>
									<th>Sous-titre</th>
									<th>Options</th>
								</thead>
								<tbody>
									<?php if(!empty($arrets)){ ?>
	                                <?php foreach($arrets as $arret){  setlocale(LC_ALL, 'fr_FR'); 	 ?>
	                                    <tr class="odd gradeX">
	                                        <td class="center"><strong><?php echo $arret->reference; ?></strong></td>	
	                                        <td class="center"><?php echo $arret->pub_date->formatLocalized('%e %B %Y'); ?></td>	                                        
	                                        <td class="center"><?php echo $arret->abstract; ?></td>
	                                        <td><a class="btn btn-primary btn-sm edit_btn" href="{{ url('admin/bail/arret/'.$arret->id) }}">éditer</a></td>
	                                    </tr>
	                                <?php }} ?>
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
