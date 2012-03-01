$(document).ready(function() {
        $(".datalist ul li").draggable( {revert:true, appendTo: 'body', containment: 'window', scroll: false, helper: 'clone'} );
        $('body>div').bind("dragstart", function(event, ui){
        	event.stopPropagation();
        });
        $( "#favorieten" ).droppable({
			drop: function( event, ui ) {
				alert( "Dropped!" );
			}
		});
});