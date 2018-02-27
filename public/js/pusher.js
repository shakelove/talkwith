( function( $, pusher, addMessage, removeMessage ) {

var messageActionChannel = pusher.subscribe( 'messageAction' );

messageActionChannel.bind( &quot;App\\Events\\MessageCreated&quot;, function( data ) {

    addMessage( data.id, false );
} );

} )( jQuery, pusher, addMessage, removeMessage);