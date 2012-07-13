(function($){
    $.fn.slideshow = function(opts) {

        var opts = $.extend({
            interval:		5000,
            spd: 2500
        }, opts);

        this.everyTime(opts.interval, function(i) {
            var lis = $(this).find("li");
            var copy = lis.last().clone();
            lis.last().fadeOut(opts.spd, function () {
                $(this).remove();
            });
            $(this).prepend(copy);

        });

        return this;
    }

})(jQuery);