(function( $ ) {
	$.widget( "custom.ajaxcombobox", {
		_create: function() {
			this.wrapper = $( "<span>" )
				.addClass( "custom-combobox" )
				.insertAfter( this.element );

			this.element.hide();
			this._createAutocomplete();
			this._createShowAllButton();
		},
		_createAutocomplete: function() {
			var selected = this.element.val();
			var value = this.element.data('text') || selected || "";

			this.input = $( "<input>" )
				.appendTo( this.wrapper )
				.val( value )
				.attr( "title", this.element.attr('placeholder') )
				.attr( "placeholder", this.element.attr('placeholder') )
				.addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
				.autocomplete({
					delay: 0,
					minLength: this.options.minLength || 1,
					source: this.options.source,
				})
				.tooltip({
					tooltipClass: "ui-state-highlight"
				});

			this._on( this.input, {
				autocompleteselect: function( event, ui ) {
					this.element.val(ui.item.value || ui.item.label)
					this.element.data('label', ui.item.label)
					this.input.val(ui.item.label);
					this._trigger( "select", event, {
						item: ui.item.value || ui.item.label,
						label: ui.item.label,
					});
					return false;
				},

				autocompletechange: "_removeIfInvalid"
			});
		},

		_createShowAllButton: function() {
			var input = this.input,
				wasOpen = false;

			$( "<a>" )
				.attr( "tabIndex", -1 )
				.attr( "title", "Listar Todos" )
				.tooltip()
				.appendTo( this.wrapper )
				.button({
					icons: {
						primary: "ui-icon-triangle-1-s"
					},
					text: false
				})
				.removeClass( "ui-corner-all" )
				.addClass( "custom-combobox-toggle ui-corner-right" )
				.mousedown(function() {
					wasOpen = input.autocomplete( "widget" ).is( ":visible" );
				})
				.click(function() {
					input.focus();

					if ( wasOpen ) {
						return;
					}
					
					var ml = input.autocomplete( "option", 'minLength');
					input.autocomplete( "option", 'minLength', 0);
					$thisbutton = $(this);
					$thisbutton.button('disable');
					input.autocomplete( "search", "" );
					input.autocomplete( "option", 'minLength', ml);
					input.on('autocompleteopen', function() {
						$thisbutton.button('enable');
						input.off('autocompleteopen');
					});
				});
		},

		_removeIfInvalid: function( event, ui ) {

			if ( ui.item ) {
				return;
			}

			var value = this.input.val(),
				valueLowerCase = value.toLowerCase(),
				valid = false;
			this.element.children( "option" ).each(function() {
				if ( $( this ).text().toLowerCase() === valueLowerCase ) {
					this.selected = valid = true;
					return false;
				}
			});

			if ( valid ) {
				return;
			}

			this.input
				.val( "" )
				.attr( "title", value + " não corresponde a nenhum item" )
				.tooltip( "open" );
			this.element.val( "" );
			this._delay(function() {
				this.input.tooltip( "close" ).attr( "title", "" );
			}, 2500 );
			this.input.data( "ui-autocomplete" ).term = "";
		},

		_destroy: function() {
			this.wrapper.remove();
			this.element.show();
		}
	});
})(jQuery);