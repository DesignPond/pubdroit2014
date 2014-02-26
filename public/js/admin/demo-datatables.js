// -------------------------------
// Initialize Data Tables
// -------------------------------

var base_url = location.protocol + "//" + location.host+"/";

$(document).ready(
  function() {
  	
  	TableTools.DEFAULTS.aButtons = [ "xls" ];
  	
    $('.datatables').dataTable({
        "sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "_MENU_ inscriptions par page",
            "sInfo"    : "Affiché _END_ sur un total de _TOTAL_",
            "sSearch"  : "",
            "oPaginate": {
		        "sNext"     : "Suivant",
		        "sPrevious" : "Précédent",
		        "sFirst"    : "Première page",
		        "sLast"     : "Dernière page"
		     }
        },
        // "oTableTools": { "sSwfPath": base_url + "swf/copy_csv_xls_pdf.swf"},
		"aoColumns": [
			    /* uid */        null,
			    /* no */         null,
			    /* date */       null,
			    /* civilité */   null,
			    /* prenom */     null,
			    /* nom */        null,
			    /* email */      { "bVisible": false },
			    /* entreprise */ null,
			    /* profession */ { "bVisible": false },
			    /* adresse */    null,
			    /* npa */        null,
			    /* ville */      null,
			    /* canton */     { "bVisible": false },
			    /* pays */       { "bVisible": false }
			]
    });
    
    $('.results_table').dataTable({
        "sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        "sPaginationType": "bootstrap",
        "bPaginate": true,
        "sProcessing":"Recherche...",
        "bProcessing": true,
        "bServerSide": true,
        "iDisplayLength": "10",
        "sAjaxSource": base_url + "admin/getAllUser",
        "oLanguage": {
            "sLengthMenu": "_MENU_ resultat par page",
            "sInfo"    : "Affiché _END_ sur un total de _TOTAL_",
            "sSearch"  : "",
            "oPaginate": {
		        "sNext"     : "Suivant",
		        "sPrevious" : "Précédent",
		        "sFirst"    : "Première page",
		        "sLast"     : "Dernière page"
		     }
        }
    });
    
    $('.adresse_table').dataTable({
        "sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        "sPaginationType": "bootstrap",
        "bPaginate": true,
        "sProcessing":"Recherche...",
        "bProcessing": true,
        "bServerSide": true,
        "iDisplayLength": "10",
        "sAjaxSource": base_url + "admin/getAllAdresse",
        "oLanguage": {
            "sLengthMenu": "_MENU_ resultat par page",
            "sInfo"    : "Affiché _END_ sur un total de _TOTAL_",
            "sSearch"  : "",
            "oPaginate": {
		        "sNext"     : "Suivant",
		        "sPrevious" : "Précédent",
		        "sFirst"    : "Première page",
		        "sLast"     : "Dernière page"
		     }
        }
    });
    
    $('.dataTables_filter input').addClass('form-control').attr('placeholder','Rechercher...');
    $('.dataTables_length select').addClass('form-control');
    
    console.log( base_url + "admin/getAllAdresse");
    
});

// -------------------------------
// Show/Hide columns of tables
// -------------------------------   
    
function fnShowHide( iCol )
{
	/* Get the DataTables object again - this is not a recreation, just a get of the object */
	var oTable = $('#inscriptionsTable').dataTable();
	
	var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
	oTable.fnSetColumnVis( iCol, bVis ? false : true );
}