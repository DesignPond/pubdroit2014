// -------------------------------
// Initialize Data Tables
// -------------------------------

$(document).ready(
  function() {
  
    $('.datatables').dataTable({
        "sDom": "<'row'<'col-xs-6'l><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "_MENU_ inscriptions par page",
            "sInfo": "Un total de _TOTAL_ sur _END_",
            "sSearch": "",
            "oPaginate": {
		        "sNext": "Suivant",
		        "sPrevious" : "Précédent",
		        "sFirst": "Première page",
		        "sLast": "Dernière page"
		     }
        },
		"aoColumns": [
			    /* uid */   null,
			    /* no */   null,
			    /* date */   null,
			    /* civilité */  null,
			    /* prenom */ null,
			    /* nom */  null,
			    /* email */    { "bVisible": false },
			    /* entreprise */    null,
			    /* profession */    { "bVisible": false },
			    /* adresse */    null,
			    /* npa */    null,
			    /* ville */    null,
			    /* canton */    { "bVisible": false },
			    /* pays */    { "bVisible": false }
			]
    });
    $('.dataTables_filter input').addClass('form-control').attr('placeholder','Rechercher...');
    $('.dataTables_length select').addClass('form-control');
    
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