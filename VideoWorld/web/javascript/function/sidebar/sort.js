function bindSort() {
	initFieldNames();
	initDirection();
}

function initFieldNames() {
	jQuery('#field-name-select').change(function() {
		loadContent();
	});
}

function initDirection() {
	jQuery("#direction-buttons").buttonset();
	jQuery('input', jQuery("#direction-buttons")).click(function() {
		loadContent();
	});
}

function getSorting() {
	var orderByClause = " ORDER BY ";
	orderByClause += jQuery('#field-name-select option:selected').attr('value');
	orderByClause += " ";
	orderByClause += jQuery('#direction-buttons input:checked').attr('value');

	return orderByClause;
}