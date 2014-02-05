@extends('layouts.admin')

@section('content')

<div id="page-content">
	<div id="wrap">
			
		<div id="page-heading">
			<ol class="breadcrumb">
				<li><a href="index.htm">Dashboard</a></li>
				<li class="active">Inscription</li>
			</ol>
			<h1>Inscription</h1>
			<div class="options">
	            <div class="btn-toolbar">
	                <a href="{{ url('admin/pubdroit/inscription/create') }}" class="btn btn-default"><i class="fa fa-plus"></i> &nbsp;Créer</a>
	            </div>
			</div>
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
						@if(Session::has('message'))
							{{  Session::get('message') }}
						@endif
						<button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
					</div>
					@endif
					
<?php
echo '<pre>';
print_r($inscriptions);
echo '</pre>';
?>
					
						<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="example">
                            <thead>
                                <tr>
                                    <th>UID</th>
                                    <th>N°</th>
                                    <th>Date</th>
                                    <th>Titre </th>
                                    <th>Prénom</th>
									<th>Nom</th>
                                    <th>Email</th>
                                    <th>Entreprise</th>
                                    <th>Profession</th>
                                    <th>Adresse</th>
									<th>NPA</th>
                                    <th>Ville</th>
                                    <th>Canton</th>
                                    <th>Pays</th>
                                </tr>
                            </thead>
                            <tbody>
	                            @if(!empty($inscriptions))
	                            	<?php $all = $inscriptions->toArray(); ?>
	                            	@foreach($all as $inscription)
	                                    <tr class="odd gradeX">
	                                    <?php print_r($inscription); ?>
<!--
	                                        <td><?php echo $inscription->id; ?></td>
											<td><?php echo $inscription->inscriptionNumber; ?></td>
											<td><?php echo $inscription->inscription_at; ?></td>
											<td><?php echo $inscription->users->civilite; ?></td>
											<td><?php echo $inscription->users->prenom; ?></td>
											<td><?php echo $inscription->users->nom; ?></td>
											<td><?php echo $inscription->users->email; ?></td>
											<td><?php echo $inscription->users->entreprise; ?></td>
											<td><?php echo $inscription->users->profession; ?></td>
											<td><?php echo $inscription->users->adresse; ?></td>
											<td><?php echo $inscription->users->npa; ?></td>
											<td><?php echo $inscription->users->ville; ?></td>
											<td><?php echo $inscription->users->canton; ?></td>
											<td><?php echo $inscription->users->pays; ?></td>
-->
	                                    </tr>
	                                 @endforeach
								@endif
                            </tbody>
                       </table>
				
				</div>
			</div>
	    </div>
    
	</div>
</div>

@stop

