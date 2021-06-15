$(window).on('resize load', function() {
    $(".__PrivateStripeElement-input").delay( 10000 ).css("position", "");
    console.log( "document loaded" );
})