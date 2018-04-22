( function( $, pusher, addMessage, removeMessage ) {

var messageActionChannel = pusher.subscribe( 'messageAction' );

messageActionChannel.bind( "App\\Events\\MessageCreated", function( data ) {

    addMessage( data.id, false );
} );

} )( jQuery, pusher, addMessage, removeMessage);