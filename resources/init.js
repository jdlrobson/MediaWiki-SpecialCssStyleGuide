jQuery( function( $ ) {
	var style, module = mw.config.get( 'wgTitle' ).split( '/' )[1], container;

	$.get( mw.config.get( 'wgLoadScript' ) + '?modules=' + module + '&only=styles&debug=true' ).done( function( resp ) {
		style = document.createElement( 'style' );
		style.appendChild( document.createTextNode( resp ) );
		document.head.appendChild( style );
		container = $( '<div style="position:relative">' ).appendTo( '#content' )[0];
		window.lsg.init( { sheets: [ style.sheet ], container: container } );
	} );
} );
