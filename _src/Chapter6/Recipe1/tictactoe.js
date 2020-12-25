$(document).ready(function()
{
	function game() {};
	
	game.init = function(size)
	{
		if(parseInt(size,10) <=0)	return;
		this.gridSize = size;
		this.player = 0;	// 0 - player 1; 1- player 2
		this.marker;
		//create grid
		this.createGrid();
		
		$('.col').hover(
			function()
			{
				$(this).css('background-color', '#FBF9EA');
			},
			function()
			{
				$(this).css('background-color', '#FFF');
			}
		);
		
		$('.col').click(function()
		{
			//check if already clicked
			if($(this).hasClass('cross') || $(this).hasClass('round'))	{ return; }// cant
			var who = (game.player ==0 ) ? "Player 1" : "Player 2";
			game.marker = (game.player == 0 ) ? 'cross' : 'round';
			$(this).addClass(game.marker);
			var won = game.checkForWin(this);
			if(!won)
			{
				//change players turn
				game.player = (game.player == 0) ? 1 : 0;
				var player = (game.player ==0 ) ? "Player 1" : "Player 2";
				$('#log').html('Waiting for '+ player);
			}
			else
			{
				$('.col').unbind('click');
				$('#log').html(who + ' Wins!!!');
				$('h2:last').show('slow');
			}
		});
	}
	
	game.checkForWin = function(current)
	{
		var size = this.gridSize;
		var row = $(current).attr('i');
		var col = $(current).attr('j');
		//check horizontal and vertical rows
		var hDone = true, vDone = true;
		for(var i=0; i< size; i++)
		{
			if($('#'+(row + i)).hasClass(this.marker) != true)	hDone = false;
			if($('#'+(i + col)).hasClass(this.marker) != true)	vDone = false;
		}
		if(hDone == true || vDone == true) return true; 
		
		//check diagonals
		if(row == col || ((parseInt(row) + parseInt(col)) == (this.gridSize)-1))
		{
			var ldDone = true, rdDone = true;
			for(var i = 0, j = size-1; i< size; i++, j--)
			{
				if($('#'+i+i).hasClass(this.marker) != true)	ldDone = false;
				if($('#'+i+j).hasClass(this.marker) != true)	rdDone = false;
			}
			if(ldDone == true || rdDone == true) return true; 
		}
		return false;
	}

	game.createGrid = function()
	{
		var size = this.gridSize;
		var str = '<div id="table">';
		for(var i=0; i<size; i++)
		{
			str+= '<div class="row">';
			for(var j=0; j<size; j++)
			{
				var cssClass='col';
				if(j< size-1)	cssClass+= " hr";
				if(i< size-1)	cssClass+= " vr";
				str+= '<div id="'+i+j+'" class="' + cssClass +'" i="'+i+'" j="'+j+'"></div>';
			}
			str+= '</div>';
		}
		$('#container').html(str);
	}
	
	$('#size').change(function()
	{
		game.init($(this).val());
		$('#log').html('Waiting for Player 1');
	});
	
	$('h2:last').click(function()
	{
		game.init($('#size').val());
		$('#log').html('Waiting for Player 1');
		$(this).hide('slow');
	});
	
	game.init(3);
});
