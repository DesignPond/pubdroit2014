@extends('layouts.admin')

@section('content')

<?php  $custom = new Custom; ?>

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
	              <div class="panel panel-sky">               
	                  <div class="panel-heading">
	                        <h4>Bail</h4>
	                  </div>
	                  <div class="panel-body collapse in">
	                  
	                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered arrets_table" id="users_table">
								<thead>
									<th>Réference</th>
									<th>Date de parution</th>
									<th>Sous-titre</th>
									<th>Analyses</th>
									<th>Catégories</th>
									<th>Options</th>
								</thead>
								<tbody>
									<?php if(!empty($arrets)){ ?>
	                                <?php foreach($arrets as $arret)
	                                	  {  
	                                	  	// Set locale time in french
	                                		//setlocale(LC_ALL, 'fr_FR'); 
	                                		
	                                		$arrets_categories = $arret->arrets_categories;
	                                		$arrets_analyses   = $arret->arrets_analyses;	
	                                ?>
	                                    <tr class="odd gradeX">
	                                        <td class="center"><strong><?php echo $arret->reference; ?></strong></td>	
	                                        <td class="center"><?php echo $arret->pub_date->format('d/m/Y'); ?></td>	                                        
	                                        <td class="center"><?php echo $custom->limit_words($arret->abstract,20); ?></td>
	                                        <td class="center">
		                                        <?php if( !$arrets_analyses->isEmpty() ) {?>
		                                        <?php 
		                                        	foreach($arrets_analyses as $arrets_analyse)
													{	
												  		echo '<a href="#" class="">'.$arrets_analyse->authors.' | '.$custom->getCreatedAtAttribute($arrets_analyse->pub_date).'</a>';
												  		var_dump($arrets_analyse->pub_date);
												    } 
  												?>
		                                        <?php } ?>
	                                        </td>
	                                        <td>
		                                      	<?php if( !$arrets_categories->isEmpty() ) { ?>
		                                      	<div class="list-group">	  	
		                                      		<?php 
		                                      			foreach($arrets_categories as $arrets_categorie)
		                                      			{
												  			echo '<p class="list-group-item">'.$arrets_categorie->title.'</p>';	
												        } 
												    ?>
												</div>
		                                      	<?php } ?>	
	                                        </td>
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
