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
		
		var activeClasses      = [];
		var activeSelectors    = [];
		var activeClassesOrder = [];		
		var activeCategories   = [];
				
		filtres.on('click', function(event) {
			
			event.preventDefault();
			event.stopPropagation();
			// this.toggleClass('active');
			// filter();
			if($(this).hasClass('active')) {
				$(this).removeClass('active');
			} else {
				filtres.removeClass('active');
				$(this).addClass('active');
			}
			
			filter();
		});
		
		chosenSelect.on('change', function(event) {
			categoryChange( $(this) );
			filter();
		});
		
		var categoryChange = function( obj ) {
			if( obj.hasClass( 'category' ) ) {
			
				activeCategories = [];
				
				var $all = obj.find(":selected");
				
				$.each( $all, function( key, item ) {
					activeCategories.push( $(this).val() );
				});
			}
		};
		
		var filter = function() {
		
			activeClasses = {
				'cat':[],
				'year':[]
			};
	
			domFiltre.find('ul.annees li a.active').each(function(item,index) {
				activeClasses.year.push($(this).attr('rel'));
			});
			
			// Met les categories choisies dans le tableau activeClasses
			activeClasses.cat  = activeCategories;

			activeSelectors    = [];
			activeClassesOrder = [];
			
			if(activeClasses.cat.length > 0) 
			{
				activeClassesOrder.push('cat');
			}
			if(activeClasses.year.length > 0) 
			{
				activeClassesOrder.push('year');
			}
			
			if(activeClassesOrder.length > 0) {
				
				$(activeClasses[activeClassesOrder]).each( function( index1 , item1 ) {

					if(activeClassesOrder.length > 1) 
					{				
						$(activeClasses[activeClassesOrder]).each( function( index2 , item2) {
							activeSelectors.push(''+item1+'.'+item2);
						});						
					} 
					else 
					{
						activeSelectors.push(''+item1);
					}

				});
			}

			blockCat.removeClass('hidden');
			
			if(activeSelectors.length == 0) 
			{
				arrets.removeClass('hidden');
			} 
			else 
			{
				// Hide all elements
				arrets.addClass('hidden');
				
				// Join all selector together so the search is exclusive
				var classes = activeSelectors.join('.');
				// Display the matching elements
				var selector = '#arrets .arrets div.cat div.arret.' + classes;
				
				$( selector ).removeClass('hidden');
				
				// Hide empty category block when all children elements are hidden
				$.each( blockCat , function(item,index) {
					if($(this).find('div.arret').length == $(this).find('div.arret.hidden').length) 
					{
						$(this).addClass('hidden');
					}
				});
			}
		};
		
		// Clean the filter to show all arrets 
		var cleanFilters = function()
		{
			var chosenSelect = $(".chosen-select")[0];
			var filtres = domFiltre.find('ul.list li a');
			
			chosenSelect.selectedIndex = -1;
			chosenSelect.trigger("chosen:updated");
			
			categoryChange( chosenSelect );
			
			filtres.removeClass('active');
		};

	}
});

