(function($){
	

	function initialize_field( $el ) {

		$el.find('.mdi-list li').on('click', function(){
			var _this = $(this),
				value = _this.attr("data-value"),
				container = _this.closest(".mdi-icon-wrapper"),
				select = container.find("select"),
				iconPreviewSpace = container.find(".mdi-icon-preview");

			container.find("select [value='" + value + "']").attr("selected", "selected");
			container.find(".mdi-list").removeClass("active");
			_this.addClass("active").siblings().removeClass('active');
			iconPreviewSpace.removeClass().addClass('_' + value + ' ' + 'mdi-icon-preview');

		});

		$el.find(".mdi-search-icon").on("keyup", function() {
			var _this = $(this),
				container = _this.closest(".mdi-icon-wrapper"),
		   	value = _this.val().toLowerCase();
		    container.find(".mdi-list li").filter(function() {
		      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		    });
		 });

		$el.find(".mdi-search-icon").on("focus", function() {
			var _this = $(this),
				container = _this.closest(".mdi-icon-wrapper");
		   container.find(".mdi-list").addClass("active");
		});
		$el.find(".mdi-search-icon").on("blur", function() {
			var _this = $(this),
				container = _this.closest(".mdi-icon-wrapper");
		   container.find(".mdi-list").removeClass("active");
		});
		
	}
	
	
	if( typeof acf.add_action !== 'undefined' ) {
	
		/*
		*  ready append (ACF5)
		*
		*  These are 2 events which are fired during the page load
		*  ready = on page load similar to $(document).ready()
		*  append = on new DOM elements appended via repeater field
		*
		*  @type	event
		*  @date	20/07/13
		*
		*  @param	$el (jQuery selection) the jQuery element which contains the ACF fields
		*  @return	n/a
		*/
		
		acf.add_action('ready append', function( $el ){
			
			// search $el for fields of type 'icon_font'
			acf.get_fields({ type : 'icon_font'}, $el).each(function(){
				
				initialize_field( $(this) );
				
			});

		});
		
		
	} else {
		
		
		/*
		*  acf/setup_fields (ACF4)
		*
		*  This event is triggered when ACF adds any new elements to the DOM. 
		*
		*  @type	function
		*  @since	1.0.0
		*  @date	01/01/12
		*
		*  @param	event		e: an event object. This can be ignored
		*  @param	Element		postbox: An element which contains the new HTML
		*
		*  @return	n/a
		*/
		
		$(document).on('acf/setup_fields', function(e, postbox){
			
			$(postbox).find('.field[data-field_type="icon_font"]').each(function(){
				
				initialize_field( $(this) );
				
			});
		
		});
	
	
	}


})(jQuery);
