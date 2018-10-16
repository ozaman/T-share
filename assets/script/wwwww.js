(function($) {
	"use strict";

	var App = function() {
		var o = this; // Create reference to this instance
		$(document).ready(function() {
			o.initialize();
		}); // Initialize app when document is ready

	};
	var p = App.prototype;

	// =========================================================================
	// MEMBERS
	// =========================================================================

	// Constant
	// =========================================================================
	// INIT
	// =========================================================================

	p.initialize = function() {
		// Init events
		this._enableEvents();

		// Init base
		this._invalidateMenu();
		this._evalMenuScrollbar();

		// Init components
		this._initValidation();
		this._initSlimscroll();
		this._initTasks();
		this._initTabs();
		this._initForms();
		this._initTooltips();
		this._initPopover();
	};

	// =========================================================================
	// EVENTS
	// =========================================================================

	// events
	p._enableEvents = function() {
		var o = this;

		$('.btn-menu').on('click', function(e) {
			o._handleMenuState(e);
		});
		$('.main-menu').on('click', 'li', function(e) {
			o._handleMenuItemClick(e);
		});
		$('.sidebar-search > a').on('click', function(e) {
			o._toggleMenuSearchState(e);
		});
		$(window).on('resize', function(e) {
			o._handleScreenSize(e);
			o._evalMenuScrollbar(e);
			
			clearTimeout(o._resizeTimer);
			o._resizeTimer = setTimeout(function() {
				o._handleFunctionCalls(e);
			}, 300);
		});
	};

	// handlers
	p._handleScreenSize = function() {
		this._invalidateMenu();
	};

	
	
}(jQuery)); // pass in (jQuery):