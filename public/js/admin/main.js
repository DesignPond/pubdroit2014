// -------------------------------
// Demos
// -------------------------------
$(document).ready(
  function() {
    $('.popovers').popover({container: 'body', trigger: 'hover', placement: 'top'}); //bootstrap's popover
    $('.tooltips').tooltip(); //bootstrap's tooltip

    try {
        //Set nicescroll on notifications
        $(".scrollthis").niceScroll({horizrailenabled:false});
        $('.dropdown').on('shown.bs.dropdown', function () {
            $(".scrollthis").getNiceScroll().resize();
            $(".scrollthis").getNiceScroll().show();
        });
        $('.dropdown').on('hide.bs.dropdown', function ()  {
            $(".scrollthis").getNiceScroll().hide();
        });

        $(window).scroll(function(){
            $(".scrollthis").getNiceScroll().resize();
        });
    } catch(e) {}

    prettyPrint(); //Apply Code Prettifier

    $('.toggle').toggles({on:true});
    
});

$(function() {

	var base_url = location.protocol + "//" + location.host+"/";
	
	//Parsley Form Validation
    //While the JS is not usually required in Parsley, we will be modifying
    //the default classes so it plays well with Bootstrap
    $('#validate-form').parsley({
        successClass: 'has-success',
        errorClass: 'has-error',
        errors: {
            classHandler: function(el) {
                return $(el).closest('.form-group');
            },
            errorsWrapper: '<ul class=\"help-block list-unstyled\"></ul>',
            errorElem: '<li></li>'
        }
    });

	$( ".uploadBtn" ).change(function() {
		
		var file = $(this).val();		
		var parent = $(this).closest('form');
		var input = parent.find(".uploadFile");
		
		input.val(file);
		input.show();		
	});
	
	$( ".sortable" ).sortable();
	$( ".sortable" ).disableSelection();
	 
	$('body').on('click','.deleteAction',function(){
		
		var $this   = $(this);
		var action  = $this.data('action');
		
		var answer = confirm('Voulez-vous vraiment supprimer : '+ action +' ?');
	    if (answer){
			return true;
	    }
	    return false;	
	});
	
    $('.edit_text').editable( base_url + 'admin/pubdroit/event/pivot', { 
         submit    : 'OK',
         indicator : 'Sauvegarde...',
         cssclass  : 'edit_form_text',
         tooltip   : 'Click to edit...',
		 submitdata : function(value, settings) {
		 	 var column    = $(this).data('column');
		 	 var id        = $(this).data('id');
		 	 var table     = $(this).data('table');
		 	 var event_id  = $(this).data('event_id');
			 return {column: column , id : id, table : table, event_id : event_id};
	   	 }
    });  
    
});


// -------------------------------
// Theme Settings
// -------------------------------

// Fixed Header

if($.cookie('fixed-header') === 'navbar-static-top') {
    $('#fixedheader').toggles();
} else {
    $('#fixedheader').toggles({on:true});
}

$('.dropdown-menu').on('click', function(e){
    if($(this).hasClass('dropdown-menu-form')){
        e.stopPropagation();
    }
});

$('#fixedheader').on('toggle', function (e, active) {
    $('header').toggleClass('navbar-fixed-top navbar-static-top');
    $('body').toggleClass('static-header');
    rightbarTopPos();
    if (active) {
        $.removeCookie('fixed-header');
    } else {
        $.cookie('fixed-header', 'navbar-static-top');
    }
});

jQuery(document).ready(function() {

	$('.redactor').redactor({
			minHeight: 100 
	});
	
	$.datepicker.regional['fr-CH'] = {
		closeText: 'Fermer',
		prevText: '&#x3c;Préc',
		nextText: 'Suiv&#x3e;',
		currentText: 'Courant',
		dateFormat: "yy-mm-dd",
		monthNames: ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
		monthNamesShort: ['Jan','Fév','Mar','Avr','Mai','Jun','Jul','Aoû','Sep','Oct','Nov','Déc'],
		dayNames: ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'],
		dayNamesShort: ['Dim','Lun','Mar','Mer','Jeu','Ven','Sam'],
		dayNamesMin: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
		weekHeader: 'Sm',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	};
	
	$.datepicker.setDefaults($.datepicker.regional['fr-CH']);

	$( "#dateDebut" ).datepicker();
    $( "#dateFin" ).datepicker();
    $( "#dateDelai" ).datepicker();
    
    $(".toggle_in").hide();
    
    // Toggle section of admin event
	$(".event_section").click(function(){
		var myelement = $(this).attr("rel")
		$(myelement).slideToggle("slow");
		$(".toggle:visible").not(myelement).hide();	
	});
	    

});

