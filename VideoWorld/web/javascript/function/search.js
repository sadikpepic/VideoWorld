function bindSearchFunctions() {
	jQuery('.blink').focus(function() {
		if (this.title == this.value) {
			this.value = '';
		}
	}).blur(function() {
		if (this.value == '') {
			this.value = this.title;
		}
	});

}

function myOnRate(element, memo) {
	new Ajax.Request('php/data/savestar.php', {
		parameters : memo,
		onComplete : function(xhr) {
		}
	});
}

function searchFor(element) {
	var suchbegriff = element.value;

	jQuery
			.ajax({
				type : 'POST',
				url : 'php/data/search.php',
				data : 'suchbegriff=' + suchbegriff,
				success : function(data) {
					if (!data) {
						jQuery('#results').slideUp('fast');
						return;
					}

					jQuery('#results').css({
						height : ''
					});
					jQuery('#results').html(data);

					var newHeight = 254;
					if (jQuery('#results').height() < newHeight) {
						newHeight = jQuery('#results').height();
					}

					var jQueryelement = jQuery(element), jQueryelementPosition = jQueryelement
							.position(), elementTop = jQueryelementPosition.top
							+ jQueryelement.height() + 5, elementLeft = jQueryelementPosition.left;

					jQuery('#results').css({
						top : elementTop,
						left : elementLeft
					});
					jQuery('#results').css({
						width : jQueryelement.width()
					});
					jQuery('#results').css({
						height : newHeight
					});

					jQuery('div', jQuery('#results')).hover(function() {
						var jQuerythis = jQuery(this);
						jQuerythis.css({
							'background-color' : '#787878'
						});
					});
					jQuery('div', jQuery('#results')).mouseout(function() {
						var jQuerythis = jQuery(this);
						jQuerythis.css({
							'background-color' : '#000'
						});
					});

					if (jQuery('#results').is(':hidden')) {
						jQuery('#results').slideDown('fast');
						jQuery('#results').scrollTop();
					}
				}
			});
}