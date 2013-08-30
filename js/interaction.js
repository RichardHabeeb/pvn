

$(document).ready(function(){
	$.ajaxSetup({
		url: "interaction.php"
	});
	
	$.ajax({
	  data: "ping"
	}).done(function ( data ) {
	  if( console && console.log ) {
	    console.log("ping... ", data);
	  }
	});
	
	
	
	getEntity("de1ed2d85f4ac1928869203f67578d5f", function( json_entity ) {
		entity = json_parse(json_entity);	
		if( console && console.log ) {
			console.log("User: ", entity);
		}
	});
	
});





function getEntity(_id, done)
{
	$.ajax({
	  data: "user="+_id
	}).done(function ( data ) { done( data ); });
}
