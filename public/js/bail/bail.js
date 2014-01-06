function initAccordion(){
	// Get URL of current page
	var baseUrl = $('#base').attr('href');
	
	//console.log(baseUrl);
	//var referrerBrut = document.referrer;
	//var referrer = referrerBrut.replace(baseUrl,'');
	var currentUrl = window.location.href.replace(baseUrl, '');
	//console.log('yes '+ currentUrl);
	// Activate accordion for good items
	var overflowFixClass    = false;
	var overflowFixSelector = '';
	
	$('.accordionPart').each(function(i) {

		var ok       = false;
		var newClass = '';		
		
		// jurisprudence
		if($( this ).hasClass('jurisprudence')) 
		{
			if($('#arrets').length > 0) 
			{
				console.log('dans jurisprudence');
				ok                  = true;
				newClass            = 'jurisprudence';
				overflowFixClass    = 'jurisprudence';
				overflowFixSelector = '.accordionContent.jurisprudence';
			}
		}
		
		// seminaires
		if($( this ).hasClass('seminaire')) 
		{
			if($('#seminaires').length > 0) 
			{	
				console.log('dans seminaires');
				ok                  = true;
				newClass            = 'seminaire';
				overflowFixClass    = 'seminaire';
				overflowFixSelector = '.accordionContent.seminaire';
			}
		}
		
		if(ok) 
		{
			$( this ).addClass('accordion');
			$( this ).addClass('active');
			$( this ).next().addClass('accordionContent');
			$( this ).next().addClass(newClass);
		}
		
	});

	// Set active to active
	var show = false;
	
	$('#rightmenu h4.accordion').each(function(index) {

	   if($( this ).hasClass('active')) {
		  show = index;
	   }
	   
	});
	
	console.log(show);
	
/*
	// check if active
	$('.accordionContent').each(function(i) {
	  $( this ).find('a').each(function(linkIndex) {
	  	console.log(i);
		 if($( this ).attr('href') == currentUrl) {
			show = i;
		 }
	  });
	});
	
*/

	// Event functions (for accordions)
	var onActive = function(element) {
		$('.accordion h4').removeClass('active');
		$( this ).addClass('active');
		if(overflowFixClass) {
			if($( this ).hasClass(overflowFixClass)) {
			  if($(overflowFixSelector).length > 0) {
				 $(overflowFixSelector)[0].css('overflow','visible');
			  }
			}
		}
	};
	var onBackground = function(element) {
	  $( this ).removeClass('active');
		if(overflowFixClass) {
			if($( this ).hasClass(overflowFixClass)) {
			  if($(overflowFixSelector).length > 0) {
				 $(overflowFixSelector)[0].css('overflow','hidden');
			  }
			}
		}
	};

	
	// Setup accordions
/*
	var matriAccordion = new Fx.Accordion($$('h4.accordion'), $$("h4.accordion+.accordionContent"), {
	  'display': -1,
	  'show': show,
	  'alwaysHide': true,
	  'onActive': onActive,
	  'onBackground': onBackground
	});
*/
	
	$("#rightmenu").accordion({ header: "h4.accordion" , heightStyle: 'content', collapsible: true , active: show });
	
		
	// Cancel links on accordion toggler
	$('#rightmenu h4.accordion a').on('click', function(event) {
		event.preventDefault();
	});
	
 
}

function initRevueMenu() {
	var ulMenu = $$('.revueMenu ul.menu');
	if(ulMenu.length > 0) {
		ulMenu = ulMenu[0];
		var parent = ulMenu.getParent();
		var newUl_1 = new Element('ul.menu2col1');
		newUl_1.inject(parent);
		var items = ulMenu.getElements('li');
		var nbItems = items.length;
		for(i = 0; i<Math.ceil(nbItems/2); i++) {
			items[i].inject(newUl_1);
		}
		var newUl_2 = new Element('ul.menu2col2');
		newUl_2.inject(parent);
		for(i = Math.ceil(nbItems/2); i<nbItems; i++) {
			items[i].inject(newUl_2);
		}
		ulMenu.dispose();
	}
}


$( document ).ready(function() {
	//bailInit();
	
	initAccordion();
	
/*
	initRevueMenu();
	 
	// PIE
	if(window.PIE) {
		var classes = ['.Redbox','.Greybox','#search .input','.shadow'];
		classes.each(function(c,i) {
			$(c).each(function(item,index) {
				PIE.attach(item);
			});
		});
    }
*/
	
	
});
