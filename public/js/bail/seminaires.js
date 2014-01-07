$( document ).ready(function(event) {
	
	if($('seminaires')) {
		// filter in the sidebar
		var newContainer = $$('h4.seminaire+div.accordionContentPart');
		if(newContainer.length < 1) {
			return;
		}
		newContainer = newContainer[0];
		newContainer.empty();
		
		var domFiltre = $('seminaires').getElement('.filtre');
		domFiltre.inject(newContainer);
		
		// Chosen init
		var chosenSelect = $$(".chosen-select").chosen();
		
		// Get dom elements
		var domSeminaires = $('seminaires');
		var categories = ['cat','year','author'];
		//var filtres = domFiltre.getElements('ul.list li a');
		var filtresOne = domFiltre.getElements('ul.annees li a');
		var blockCat = domSeminaires.getElements('.sujets div.cat');
		var sujets = domSeminaires.getElements('.sujets div.cat div.sujet');
		
		var activeClasses = [];
		var activeSelectors = [];
		var activeClassesOrder = [];
		
		var activeCategories = [];
		var activeAuthors = [];
		
		/*filtres.addEvent('click', function(event) {
			event.stop();
			this.toggleClass('active');
			filter();
		});
		*/
		filtresOne.addEvent('click', function(event) {
			event.stop();
			if(this.hasClass('active')) {
				this.removeClass('active');
			} else {
				filtresOne.removeClass('active');
				this.addClass('active');
			}
			filter();
		});
		chosenSelect.addEvent('change', function(event) {
			if(this.hasClass('category')) {
				activeCategories = [];
				this.getSelected().each(function(item,index) {
					activeCategories.include(item.getProperty('value'));
				});
				filter();
			} else if(this.hasClass('author')) {
				activeAuthors = [];
				this.getSelected().each(function(item,index) {
					activeAuthors.include(item.getProperty('value'));
				});
				filter();
			}
		});
		
		var filter = function() {
			activeClasses = {
				'cat':[],
				'year':[],
				'author':[]
			};
			/*domFiltre.getElements('ul.categories li a.active').each(function(item,index) {
				activeClasses.cat.include(item.getProperty('rel'));
			});*/
			domFiltre.getElements('ul.annees li a.active').each(function(item,index) {
				activeClasses.year.include(item.getProperty('rel'));
			});
			/*$$('#seminaires .filtre ul.auteurs li a.active').each(function(item,index) {
				activeClasses.author.include(item.getProperty('rel'));
			});*/
			activeClasses.cat = activeCategories;
			activeClasses.author = activeAuthors;
			
			activeSelectors = [];
			activeClassesOrder = [];
			
			if(activeClasses.cat.length > 0) {
				activeClassesOrder.include('cat');
			}
			if(activeClasses.year.length > 0) {
				activeClassesOrder.include('year');
			}
			if(activeClasses.author.length > 0) {
				activeClassesOrder.include('author');
			}
			if(activeClassesOrder.length > 0) {
				activeClasses[activeClassesOrder[0]].each(function(item1, index1) {
					if(activeClassesOrder.length > 1) {
						activeClasses[activeClassesOrder[1]].each(function(item2, index2) {
							if(activeClassesOrder.length > 2) {
								activeClasses[activeClassesOrder[2]].each(function(item3, index3) {
									activeSelectors.include(''+item1+'.'+item2+'.'+item3);
								});
							} else {
								activeSelectors.include(''+item1+'.'+item2);
							}
						});
					} else {
						activeSelectors.include(''+item1);
					}
				});
			}
			
			blockCat.removeClass('hidden');
			if(activeSelectors.length == 0) {
				sujets.removeClass('hidden');
			} else {
				sujets.addClass('hidden');
				
				/*activeClasses.each(function(item,index) {
					$$('#seminaires .sujets div.cat div.sujet.'+item).removeClass('hidden');
				});
				*/
				activeSelectors.each(function(item,index) {
					$$('#seminaires .sujets div.sujet.'+item).removeClass('hidden');
				});
				
				blockCat.each(function(item,index) {
					if(item.getElements('div.sujet').length == item.getElements('div.sujet.hidden').length) {
						item.addClass('hidden');
					}
				});
			}
		};
		
		// Order link
		/*
		domFiltre.getElements('ul.annees li').addEvent('mouseenter', function(event) {
			this.getElement('a.order').addClass('visible');
		});
		domFiltre.getElements('ul.annees li').addEvent('mouseleave', function(event) {
			this.getElement('a.order').removeClass('visible');
		});
		*/
	}
});

