$( document ).ready(function(event) {

	if($('#arrets')) {
		
		// Chosen init
		var chosenSelect = $(".chosen-select").chosen();
		
		// Get dom elements
		var domArrets  = $('#arrets');
		var categories = ['cat','year'];
		
		var domFiltre  = $('.filtre');
		
		var filtres    = domFiltre.find('ul.list li a');
		var blockCat   = domArrets.find('.arrets div.cat');
		var arrets     = domArrets.find('.arrets div.cat div.arret');
		
		console.log(arrets);
		
		var activeClasses      = [];
		var activeSelectors    = [];
		var activeClassesOrder = [];		
		var activeCategories   = [];
				
		filtres.on('click', function(event) {
			event.stop();
			// this.toggleClass('active');
			// filter();
			if(this.hasClass('active')) {
				this.removeClass('active');
			} else {
				filtres.removeClass('active');
				this.addClass('active');
			}
			filter();
		});
		
		chosenSelect.on('change', function(event) {
			categoryChange( this );
			filter();
		});
		
		var categoryChange = function( obj ) {
			if( obj.hasClass( 'category' ) ) {
				activeCategories = [];
				obj.getSelected().each( function( item, index ) {
					activeCategories.include( item.getProperty( 'value' ) );
				} );
			}
		};
		
		var filter = function() {
			activeClasses = {
				'cat':[],
				'year':[]
			};
			domFiltre.getElements('ul.annees li a.active').each(function(item,index) {
				activeClasses.year.include(item.getProperty('rel'));
			});
			activeClasses.cat = activeCategories;
			
			activeSelectors = [];
			activeClassesOrder = [];
			
			if(activeClasses.cat.length > 0) {
				activeClassesOrder.include('cat');
			}
			if(activeClasses.year.length > 0) {
				activeClassesOrder.include('year');
			}
			
			if(activeClassesOrder.length > 0) {
				
				activeClasses[activeClassesOrder[0]].each(function(item1, index1) {
					if(activeClassesOrder.length > 1) {
						activeClasses[activeClassesOrder[1]].each(function(item2, index2) {
							activeSelectors.include(''+item1+'.'+item2);
						});
					} else {
						activeSelectors.include(''+item1);
					}
				});
			}
			
			blockCat.removeClass('hidden');
			if(activeSelectors.length == 0) {
				arrets.removeClass('hidden');
			} else {
				// Hide all elements
				arrets.addClass('hidden');
				
				// Join all selector together so the search is exclusive
				var classes = activeSelectors.join('.');
				// Display the matching elements
				var selector = '#arrets .arrets div.cat div.arret.' + classes;
				$$( selector ).removeClass('hidden');
				
				// Hide empty category block when all children elements are hidden
				blockCat.each(function(item,index) {
					if(item.getElements('div.arret').length == item.getElements('div.arret.hidden').length) {
						item.addClass('hidden');
					}
				});
			}
		};
		
		// Clean the filter to show all arrets 
		var cleanFilters = function()
		{
			var chosenSelect = $$(".chosen-select")[0];
			var filtres = domFiltre.getElements('ul.list li a');
			
			chosenSelect.selectedIndex = -1;
			chosenSelect.fireEvent("liszt:updated");
			categoryChange( chosenSelect );
			
			filtres.removeClass('active');
		};

	}
});

