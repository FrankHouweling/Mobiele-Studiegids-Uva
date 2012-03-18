var height;

$(document).ready(function() {
		
		resize();
		
		$(window).resize(function() {
			resize();
		});
		
});

function resize()
{
	height = $(document).height();
		
	$(".datalist").css( "height", height-140 );
}
