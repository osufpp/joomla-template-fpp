(function($){
	$.fn.slideshow = function(opts) {
		
		var opts = $.extend({
			'interval':		5000
		});
		
		var lis = this.find("li");
		var spd = 'slow';
		/*
		var interval = setInterval(function(ul){
			if(ul) { //this doesn't work in IE as of 8.
				var lis = ul.find("li");
				var copy = lis.last().clone();
				lis.last().fadeOut(spd, function () {
					$(this).remove();
				});
				ul.prepend(copy);
			}
			
		}, opts.interval, this);
		*/
		this.everyTime(opts.interval, function(i) {
				var lis = $(this).find("li");
				var copy = lis.last().clone();
				lis.last().fadeOut(spd, function () {
					$(this).remove();
				});
				$(this).prepend(copy);

		});
		
		return this;
	}
	
})(jQuery);