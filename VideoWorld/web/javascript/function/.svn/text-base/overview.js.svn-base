function bindMovieFunctions() {
	jQuery('.movie-image').hover(function() {
		jQuery(this).find(".play").show();

	}, function() {
		jQuery(this).find('.play').hide();
	});
}

function loadContent(type) {

	showLoader();

	var whereClause = getFilter(), orderByClause = getSorting();

	jQuery.ajax({
		type : 'POST',
		url : 'php/data/overview.php',
		data : 'whereClause=' + whereClause + '&orderByClause=' + orderByClause
				+ '&type=' + type,
		success : function(data) {
			jQuery('#content').html(data);
			jQuery('.movie').draggable({
				revert : true,
				helper : "clone",
				appendTo : "#wish-list",
				zIndex : 100
			});
		}
	});
}

function showLoader() {
	jQuery('#content')
			.html(
					"<div style='width:100%;text-align:center;'><img src='web/images/loader.gif' alt='Loading' width='50px' height='50px'></img><div>");
}