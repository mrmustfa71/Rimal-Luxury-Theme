(function () {
    'use strict';

    window.addEventListener( 'DOMContentLoaded', function () {
        var nav = document.querySelector( '.primary-navigation' );
        if ( ! nav ) {
            return;
        }
        var menuToggle = document.querySelector( '.menu-toggle' );
        if ( menuToggle ) {
            menuToggle.addEventListener( 'click', function () {
                nav.classList.toggle( 'is-open' );
            } );
        }
    } );
})();
