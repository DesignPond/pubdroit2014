@extends('layouts.pdf')

@section('content')
	
<div class="container" id="wrapper">

	<table id="header" width="100%"border="0" cellpadding="0"  cellspacing="0" style="border:none;margin:0;padding:0;">
		<tr>
			<td width="60%">
				<!-- Logo and title -->
				<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border:none;margin:0;padding:0;">
				<tr>
					<td>
						<img src="<?php //echo $logoPrincipal; ?>" alt="logo Unine" style="height:100px;" />
					</td>
				</tr>
				<tr>
					<td>
						 <ul class="infos">
		                 	 <li>Secr&eacute;tariat  - Formation</li>
		                     <li>Avenue du 1er-Mars 26</li>
		                     <li>CH-2000 Neuch&acirc;tel </li>
		                </ul> 
		        		<p class="tva">CHE-115.251.043 TVA</p>
					</td>
				</tr>
				</table>	
				<!-- END Logo and title -->	
			</td>
			<td width="40%">
				<!-- User infos -->	
				<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border:none;margin:0;padding:0;">
				<tr><td><p>&nbsp;</p></td></tr><!-- empty line -->
				<tr><td><p>&nbsp;</p></td></tr><!-- empty line -->
				<tr>
					<td>
					 	<p id="userInfos">
			             <?php echo if_exist($civilite[$gender]).' '.$prenom.' '.$nom; ?><br/>
			             <?php if(!empty($entreprise)) {echo $entreprise;}  ?><br/>
			             <?php echo $rue; ?><br/>
			             <?php if(!empty($complement)) {echo $complement.'<br/>';}  ; ?>
			             <?php if(!empty($cp)) {echo 'CP '.$cp.'<br/>';}  ; ?>
			             <?php echo $npa.' '.$ville; ?>    
						 </p>
		   			</td>
				</tr>
				</table>	
		   		<!-- END User infos -->				
			</td>
		</tr>
		<tr><td><p>&nbsp;</p></td></tr><!-- empty line -->
		<tr><td><p>&nbsp;</p></td></tr><!-- empty line -->
	</table>

	    <table id="content" width="100%"border="0" cellpadding="0"  cellspacing="0" style="border:none;margin:0;padding:0;">
    	<tr>
    		<td colspan="2"> 		
               <h2 style="font-family:sans-serif;"><strong>FACTURE No <?php echo if_exist($noInscrit); ?></strong></h2>
               <h2 style="font-family:sans-serif;"><?php echo utf8_decode($titre); ?><br/><?php echo utf8_decode($soustitre); ?></h2>
               <p class="red"><strong><?php echo utf8_decode($endroit); ?></strong></p>         
			</td>
        </tr>
       <tr>
			<td colspan="2" align="left">
				<p style="text-align:left;"> Nous vous confirmons votre participation :<strong> <?php echo utf8_decode($sujet); ?> 
				</strong>  du <?php echo format_date_simple($dateDebut); ?>.</p>
			</td>
		</tr>
		<tr>
			<td width="40%"><p style="text-align:left; margin:0;" class="txt">Le montant de l'inscription est de:</p></td>
			<td width="60%"><p style="text-align:left; margin:0;"><strong><?php  echo $prix; ?> CHF</strong></p></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><span style="font-size:11px;">(montant non-soumis à la TVA)</span ></td>
		</tr>
		<tr>
			<td colspan="2">
				<p style="text-align:left;"> Avec nos remerciements et nos salutations les meilleures.</p>
				<p style="text-align:left;" class="lieuetdate">Neuch&acirc;tel, le <?php echo format_date_simple($today); ?>.</p>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<p style="text-align:right;"><span class="signature">Le secr&eacute;tariat de la Facult&eacute; de droit</span></p>
			</td>
		</tr>
		<tr><td><p>&nbsp;</p></td><td><p></p></td></tr><!-- empty line -->
		
		<?php if(isset($listpdf)){   if(in_array('pdfbon', $listpdf)){ 				
		?>
		<tr>
			<td align="left" colspan="2">
				<strong class="red">Annexe : bon de participation &agrave; pr&eacute;senter &agrave; l'entr&eacute;e</strong>
			</td>
		</tr>  
		<?php } } ?>    
     </table>
  
</div>

	
@stop
