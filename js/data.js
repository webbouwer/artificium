/* Data Javascript file */
jQuery(function($) {
	$(document).ready(function(){
		console.log( JSON.parse( site_data['customdata'] ) );
    console.log( JSON.parse( site_data['tagdata'] ) );
    console.log( JSON.parse( site_data['catdata'] ) );
		console.log( JSON.parse( site_data['postdata'] ) );
	});
});
