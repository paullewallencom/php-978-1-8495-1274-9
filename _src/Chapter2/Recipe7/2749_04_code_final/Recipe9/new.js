function addEvents()
{
	$('.bold').click(function()
	  {
		  $('#container').css('font-weight', 'bold');
	  });
	
	$('.color').click(function()
	  {
		  $('#container').css('color', 'red');
	  });

	$('.change').click(function()
	  {
		  $('#container').html('<em>New html inserted</em>');
	  });
}