( function () {
    'use strict';

    var body = document.body;
    var siteHeader = document.querySelector( '.site-header' );
    var searchOverlay = document.getElementById( 'search-overlay' );
    var mobileDrawer = document.getElementById( 'mobile-drawer' );
    var menuToggle = document.querySelector( '.header-toggle-menu' );
    var searchToggle = document.querySelector( '.header-action--search' );
    var drawerClose = document.querySelector( '.mobile-drawer__close' );
    var searchClose = document.querySelector( '.search-overlay__close' );
    var focusableSelectors = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
    var firstFocusable;
    var lastFocusable;

    function toggleDrawer( open ) {
        if ( ! mobileDrawer ) {
            return;
        }

        mobileDrawer.classList.toggle( 'is-open', open );
        mobileDrawer.setAttribute( 'aria-hidden', String( ! open ) );
        body.classList.toggle( 'drawer-open', open );

        if ( open ) {
            enableTrapFocus( mobileDrawer );
        } else {
            disableTrapFocus();
        }
    }

    function toggleSearch( open ) {
        if ( ! searchOverlay ) {
            return;
        }

        searchOverlay.classList.toggle( 'is-open', open );
        searchOverlay.setAttribute( 'aria-hidden', String( ! open ) );
        body.classList.toggle( 'search-open', open );

        if ( open ) {
            enableTrapFocus( searchOverlay );
            var searchInput = searchOverlay.querySelector( 'input[type="search"]' );
            if ( searchInput ) {
                searchInput.focus();
            }
        } else {
            disableTrapFocus();
        }
    }

    function enableTrapFocus( container ) {
        var focusableElements = container.querySelectorAll( focusableSelectors );
        if ( ! focusableElements.length ) {
            return;
        }

        firstFocusable = focusableElements[0];
        lastFocusable = focusableElements[ focusableElements.length - 1 ];
        firstFocusable.focus();

        container.addEventListener( 'keydown', trapFocus );
    }

    function disableTrapFocus() {
        var openContainers = document.querySelectorAll( '.is-open' );
        openContainers.forEach( function ( container ) {
            container.removeEventListener( 'keydown', trapFocus );
        } );
    }

    function trapFocus( event ) {
        if ( event.key !== 'Tab' ) {
            return;
        }

        if ( event.shiftKey ) {
            if ( document.activeElement === firstFocusable ) {
                event.preventDefault();
                lastFocusable.focus();
            }
            return;
        }

        if ( document.activeElement === lastFocusable ) {
            event.preventDefault();
            firstFocusable.focus();
        }
    }

    function handleEscKey( event ) {
        if ( event.key !== 'Escape' ) {
            return;
        }

        if ( mobileDrawer && mobileDrawer.classList.contains( 'is-open' ) ) {
            toggleDrawer( false );
        }

        if ( searchOverlay && searchOverlay.classList.contains( 'is-open' ) ) {
            toggleSearch( false );
        }
    }

    function initMegaMenu() {
        var menuItems = document.querySelectorAll( '.menu--desktop .menu-item-has-children' );
        menuItems.forEach( function ( menuItem ) {
            var link = menuItem.querySelector( '> a' );
            menuItem.addEventListener( 'keydown', function ( event ) {
                if ( event.key === 'Enter' || event.key === ' ' ) {
                    event.preventDefault();
                    link.click();
                }
            } );
        } );
    }

    document.addEventListener( 'DOMContentLoaded', function () {
        if ( menuToggle ) {
            menuToggle.addEventListener( 'click', function () {
                toggleDrawer( ! mobileDrawer.classList.contains( 'is-open' ) );
            } );
        }

        if ( drawerClose ) {
            drawerClose.addEventListener( 'click', function () {
                toggleDrawer( false );
            } );
        }

        if ( searchToggle ) {
            searchToggle.addEventListener( 'click', function () {
                toggleSearch( ! searchOverlay.classList.contains( 'is-open' ) );
            } );
        }

        if ( searchClose ) {
            searchClose.addEventListener( 'click', function () {
                toggleSearch( false );
            } );
        }

        document.addEventListener( 'keydown', handleEscKey );

        initMegaMenu();
    } );
} )();
