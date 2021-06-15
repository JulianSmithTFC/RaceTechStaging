$( document ).ready(function() {
    $( "li.menu-item-has-children" ).append( '<span class="grower CLOSE"></span>' );

    $( '.grower' ).click( function () {
        $( this ).parent().children( 'ul li ul' ).toggle( 300 );
        $( this ).toggleClass( 'CLOSE' );
        $( this ).toggleClass( 'OPEN' );
    } );



    $( "label.navbar-toggle" ).on( "click", function () {
        $( "html, body" ).animate( { scrollTop: 0 }, "slow" );
        // return false;
    } );

    $( ".toggle_cat_nav" ).on( 'click', function () {
        $( ".pagecontent #sidebar-shop_sidebar_new" ).toggle();
    } );


    /*Keep the category nav open after click*/

    var getUrlParameter = function getUrlParameter( sParam ) {
        var sPageURL      = window.location.search.substring( 1 ),
            sURLVariables = sPageURL.split( '&' ),
            sParameterName,
            i;

        for ( i = 0; i < sURLVariables.length; i++ ) {
            sParameterName = sURLVariables[ i ].split( '=' );

            if ( sParameterName[ 0 ] === sParam ) {
                return sParameterName[ 1 ] === undefined ? true : decodeURIComponent( sParameterName[ 1 ] );
            }
        }
    };

    var selected_menu_page_id = getUrlParameter( 'selected_menu_page_id' );

    if ( selected_menu_page_id ) {
        $( "body" ).addClass( 'navigation_engaged' );
    }

    var selected_item = $( '.menu-item a[data-page-id="' + selected_menu_page_id + '"]' );
    selected_item.closest( ".widget_nav_menu" ).addClass( "open_menu_nav" );

    $( ".open_menu_nav div > ul.menu li span.grower" ).click(); // open all of them from the gate
    $( ".open_menu_nav div > ul.menu li li span.grower" ).click(); // quickly close the sub levels
    $( ".open_menu_nav div > ul.menu li li.current-menu-item > span.grower" ).click();
    $( ".open_menu_nav li li.current-menu-ancestor > ul.sub-menu + span.grower" ).click();


    $( "#genesis-sidebar-primary" ).removeClass( "sidebar sidebar-primary widget-area" );
    $( "aside#genesis-sidebar-primary" ).attr( "id","tm_categories" );
    $( "#tm_categories" ).removeAttr( "aria-label");
    $( "#tm_categories" ).removeAttr( "role");

    $( "#sidebar-shop_sidebar_new" ).removeAttr( "class");

    console.log( "ready!" );
});