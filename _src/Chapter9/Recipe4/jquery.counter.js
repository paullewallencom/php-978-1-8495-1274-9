(function( $ )
{
	$.fn.cashCounter = function(options) 
	{
		return this.each(function()
		{
			settings = $.extend
			(
				{
					start: 0,
					end: 0,
					step: .5
				}, 
				options
			);
			var e = $(this);
			if(isNaN(settings.start) || isNaN(settings.end) || ((settings.start) == (settings.end)))
			{
				return this; 
			}
			settings.increasing = (settings.start < settings.end) ? true : false;
			if(settings.increasing)
			{
				if(settings.start >= settings.end)
				{ 
					return this; 
				}
			}
			else
			{
				if(settings.start <= settings.end)  
				{ 
					return this; 
				}
			}		
			var diff = parseInt(settings.end,10) - parseInt(settings.start,10);
			var changeBy;
			if(settings.increasing)
			{
				changeBy = Math.ceil(diff * settings.step);
			}
			else
			{
				changeBy = Math.floor(diff * settings.step);
			}
			settings.start = parseInt(settings.start,10) + changeBy;
			e.html(settings.start);
			setTimeout(function()
			{
				e.cashCounter(settings);
			}, 100); 
		
	  });//each
	};
})( jQuery );
