( function () {
    'use strict';

    var ajaxSelectors = {
        addToCart: '.ajax_add_to_cart',
        updateCart: '[name="update_cart"]',
    };

    function initAjaxAddToCart() {
        document.querySelectorAll( ajaxSelectors.addToCart ).forEach( function ( button ) {
            button.addEventListener( 'click', function ( event ) {
                if ( ! button.closest( 'form' ) ) {
                    return;
                }

                event.preventDefault();
                var form = button.closest( 'form' );
                var data = new FormData( form );
                data.append( 'action', 'woocommerce_ajax_add_to_cart' );

                fetch( wc_add_to_cart_params.wc_ajax_url.toString().replace( '%%endpoint%%', 'add_to_cart' ), {
                    method: 'POST',
                    credentials: 'same-origin',
                    body: data,
                } )
                    .then( function ( response ) {
                        return response.text();
                    } )
                    .then( function () {
                        document.body.dispatchEvent( new CustomEvent( 'wc_cart_button_updated' ) );
                    } );
            } );
        } );
    }

    function init() {
        initAjaxAddToCart();
    }

    document.addEventListener( 'DOMContentLoaded', init );
} )();
