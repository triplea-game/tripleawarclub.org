	//the main function, call to the effect object
	function init(){
	
		var toggles = document.getElementsByClassName('moofx1'); //h3s where I click on
		var stretchers = document.getElementsByClassName('moofx2'); //div that stretches
		
		//accordion effect
		var myAccordion = new fx.Accordion(
			toggles, stretchers, {opacity: true, duration: 400}
		);

		//hash function
		
		function checkHash(){
			var found = false;
			toggles.each(function(h3, i){
				if (window.location.href.indexOf(h3.title) > 0) {
					myAccordion.showThisHideOpen(stretchers[i]);
					found = true;
				}
			});
			return found;
		}
		
		if (!checkHash()) {
		//myAccordion.showThisHideOpen(stretchers[0]);
		}
	}