@extends('layouts.pdf')

@section('content')

<?php  $custom = new Custom; ?>
 
<body>
<div class="container" id="wrapper">

	<table id="header" width="100%"border="0" cellpadding="0"  cellspacing="0" style="border:none;margin:0;padding:0;">
		<tr>
			<td width="60%">
				<!-- Logo and title -->
				<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border:none;margin:0;margin-top:20px;padding:0;">

					<tr>
						<td><img src="<?php echo $data['logo']; ?>" alt="logo Unine" style="height:100px;" /></td>
					</tr>
					<tr>
						<td>
							 <ul class="infos">
			                 	 <li><?php echo $data['organisateur']['nom']; ?></li>
			                     <li><?php echo $data['organisateur']['adresse']; ?></li>
			                     <li><?php echo $data['organisateur']['lieu']; ?></li>
			                </ul> 
			        		<p class="tva"><?php echo $data['organisateur']['tva']; ?></p>
						</td>
					</tr>

				</table>	
				<!-- END Logo and title -->	
			</td>
			<td width="40%">
				<!-- User infos -->	
				<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border:none;margin:0;margin-top:20px;padding:0;">
				<tr>
					<td style="margin-top:30px;">
						<p>&nbsp;</p>
						<p style="text-align:left;" class="">Neuch&acirc;tel, le <?php echo $custom->formatDate(date('Y-m-d')); ?></p>
					</td>
				</tr><!-- empty line -->
				<tr>
					<td>
					 	<p id="userInfos" style="padding-top:15px;">
					            <?php echo $data['civilite'].' '.$data['user']['prenom'].' '.$data['user']['nom']; ?><br/>
					            <?php if(!empty($data['user']['entreprise'])){ echo $data['user']['entreprise'].'<br/>'; } ?>
					            <?php echo $data['user']['adresse']; ?><br/>
					            <?php echo $data['user']['npa'].' '.$data['user']['ville']; ?>
						 </p>
		   			</td>
				</tr>
				</table>	
		   		<!-- END User infos -->				
			</td>
		</tr>
		<tr><td><p>&nbsp;</p></td></tr><!-- empty line -->		
	</table>

	<table id="content" width="100%"border="0" align="center" cellpadding="0" cellspacing="0" style="border:none;margin:0 40px 0 80px;padding:0;">
    	<tr>
    		<td colspan="2"> 		
               <h1><strong><u>ATTESTATION</u></strong></h1>
               <p><?php if(!empty($data['attestation']['organisateur'])){ echo $data['attestation']['organisateur'];} ?> atteste que</p>       
			</td>
        </tr>
       <tr>
			<td colspan="2" align="center">
				<p><strong><?php echo $data['civilite'].' '.$data['user']['prenom'].' '.$data['user']['nom']; ?></strong></p>
				<p>a participé au séminaire organisé					
					 <?php
				 		$phrase = '';
				 	
				   	 	if ( !empty($data['event']['dateFin']) && ($data['event']['dateFin'] != "0000-00-00") ){ $phrase .= ' du '; }else { $phrase .= ' le ';}  

						$phrase .= ''. $custom->formatDate($data['event']['dateDebut']) .''; 
					
						if ( !empty($data['event']['dateFin']) && ($data['event']['dateFin'] != "0000-00-00") ){ $phrase .= ' du '.$custom->formatDate($data['event']['dateFin']).' '; } 
						
						echo $phrase;
						
						echo ' à '.$data['attestation']['lieu'];
					?>
				</p>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><p>Les thèmes traités étaient :</p></td>
		</tr>
		<tr>
			<td colspan="2" align="left">
				<div id="remarques"> 
					<?php 
						if (!empty($data['attestation']['remarque']))
						{ 							
							echo $data['attestation']['remarque']; 
						} 
					?>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="left">
				<p style="text-align:left;padding-top:10px;"><span class="signature"><?php  echo $data['attestation']['signature']; ?></span><br/>
				<?php  echo $data['attestation']['responsabilite'];?></span></p>
			</td>
		</tr>      
     </table>
  
</div>
</body>
	
@stop
