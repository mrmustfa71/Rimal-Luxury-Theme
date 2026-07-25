( function () {
    'use strict';

    function toggleComponent( container, openClass, state ) {
        if ( ! container ) {
            return;
        }

        container.classList.toggle( openClass, state );
        container.setAttribute( 'aria-hidden', String( ! state ) );
    }

    function initDrawer() {
        var triggers = document.querySelectorAll( '[data-drawer-target]' );
        triggers.forEach( function ( trigger ) {
            var targetId = trigger.getAttribute( 'data-drawer-target' );
            var drawer = document.getElementById( targetId );
            if ( ! drawer ) {
                return;
            }

            trigger.addEventListener( 'click', function () {
                toggleComponent( drawer, 'is-open', true );
            } );
        } );

        document.querySelectorAll( '.component-drawer__close' ).forEach( function ( button ) {
            button.addEventListener( 'click', function () {
                var drawer = button.closest( '.component-drawer' );
                toggleComponent( drawer, 'is-open', false );
            } );
        } );
    }

    function initModal() {
        document.querySelectorAll( '[data-modal-target]' ).forEach( function ( trigger ) {
            var modalId = trigger.getAttribute( 'data-modal-target' );
            var modal = document.getElementById( modalId );
            if ( ! modal ) {
                return;
            }

            trigger.addEventListener( 'click', function () {
                toggleComponent( modal, 'is-open', true );
            } );
        } );

        document.querySelectorAll( '.component-modal__close' ).forEach( function ( button ) {
            button.addEventListener( 'click', function () {
                var modal = button.closest( '.component-modal' );
                toggleComponent( modal, 'is-open', false );
            } );
        } );
    }

    function initToast() {
        document.querySelectorAll( '[data-toast-target]' ).forEach( function ( trigger ) {
            var toastId = trigger.getAttribute( 'data-toast-target' );
            var toast = document.getElementById( toastId );
            if ( ! toast ) {
                return;
            }

            trigger.addEventListener( 'click', function () {
                toast.classList.add( 'is-visible' );
                setTimeout( function () {
                    toast.classList.remove( 'is-visible' );
                }, 4200 );
            } );
        } );
    }

    function initQuantitySelector() {
        document.querySelectorAll( '.component-quantity-selector' ).forEach( function ( selector ) {
            var input = selector.querySelector( 'input' );
            var decrement = selector.querySelector( '.quantity-decrement' );
            var increment = selector.querySelector( '.quantity-increment' );
            if ( ! input || ! decrement || ! increment ) {
                return;
            }

            decrement.addEventListener( 'click', function () {
                var value = parseInt( input.value, 10 );
                if ( isNaN( value ) || value <= 1 ) {
                    return;
                }
                input.value = value - 1;
            } );

            increment.addEventListener( 'click', function () {
                var value = parseInt( input.value, 10 );
                if ( isNaN( value ) ) {
                    value = 1;
                }
                input.value = value + 1;
            } );
        } );
    }

    document.addEventListener( 'DOMContentLoaded', function () {
        initDrawer();
        initModal();
        initToast();
        initQuantitySelector();
    } );
} )();
