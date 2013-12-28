function calculateSidebar() {
	// define sidebar
	var jQueryheader = jQuery('#header'), jQueryheaderPosition = jQueryheader
			.position(), sidebarRightLeft = jQueryheaderPosition.left
			+ jQueryheader.width() + 5, sidebarLeftLeft = jQueryheaderPosition.left - 200 - 15;

	jQuery('#sidebar-right').css({
		left : sidebarRightLeft
	});
	jQuery('#sidebar-left').css({
		left : sidebarLeftLeft
	});

	jQuery.lockfixed("#sidebar-right", {
		offset : {
			top : 10
		}
	});
	jQuery.lockfixed("#sidebar-left", {
		offset : {
			top : 10
		}
	});
}

window.onresize = function(event) {
	// define sidebar
	var jQueryheader = jQuery('#header'), jQueryheaderPosition = jQueryheader
			.position(), sidebarRightLeft = jQueryheaderPosition.left
			+ jQueryheader.width() + 5, sidebarLeftLeft = jQueryheaderPosition.left - 200 - 15;

	jQuery('#sidebar-right').css({
		left : sidebarRightLeft
	});
	jQuery('#sidebar-left').css({
		left : sidebarLeftLeft
	});

	jQuery.lockfixed("#sidebar-right", {
		offset : {
			top : 10
		}
	});
	jQuery.lockfixed("#sidebar-left", {
		offset : {
			top : 10
		}
	});
};