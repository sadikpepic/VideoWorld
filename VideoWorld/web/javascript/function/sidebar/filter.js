function bindFilter(permitAgeMin, permitAgeMax, releaseYearMin, releaseYearMax,
		durationMin, durationMax) {
	initPermitAgeSlider(permitAgeMin, permitAgeMax);
	initReleaseYearSlider(releaseYearMin, releaseYearMax);
	initLanguageCheckboxes();
	initResolutionButtons();
	initRatingSlider();
	initDurationSlider(durationMin, durationMax);
}

function initPermitAgeSlider(permitAgeMin, permitAgeMax) {
	initSlider("permit-age", permitAgeMin, permitAgeMax, permitAgeMin,
			permitAgeMax);
}

function initReleaseYearSlider(releaseYearMin, releaseYearMax) {
	initSlider("release-year", releaseYearMin, releaseYearMax, releaseYearMin,
			releaseYearMax);
}

function initLanguageCheckboxes() {
	jQuery("#language-checkboxes").buttonset();
	jQuery('input', jQuery("#language-checkboxes")).click(function() {
		loadContent();
	});
}

function initResolutionButtons() {
	jQuery("#resolution-buttons").buttonset();
	jQuery('input', jQuery("#resolution-buttons")).click(function() {
		loadContent();
	});
}

function initRatingSlider() {
	initSlider("rating", 0, 5, 0, 5);
}

function initDurationSlider(durationMin, durationMax) {
	initSlider("duration", durationMin, durationMax, durationMin, durationMax);
}

function initSlider(name, min, max, defaultMin, defaultMax) {
	jQuery("#" + name + "-slider").slider({
		range : true,
		min : min,
		max : max,
		values : [ defaultMin, defaultMax ],
		slide : function(event, ui) {
			jQuery("#min-" + name).html(ui.values[0]);
			jQuery("#max-" + name).html(ui.values[1]);
		},
		change : function(event, ui) {
			loadContent();
		}
	});

	jQuery("#min-" + name).html(
			jQuery("#" + name + "-slider").slider("values", 0));
	jQuery("#max-" + name).html(
			jQuery("#" + name + "-slider").slider("values", 1));
}

function getFilter() {
	return buildWhereQuery();
}

function buildWhereQuery() {
	var whereClause = "WHERE ";

	whereClause += buildRangeSQL("permit_age",
			jQuery("#min-permit-age").html(), jQuery("#max-permit-age").html());
	whereClause += " AND ";
	whereClause += buildRangeSQL("release_year", jQuery("#min-release-year")
			.html(), jQuery("#max-release-year").html());
	whereClause += " AND ";
	whereClause += buildInSQL("language", jQuery("#language-checkboxes"));
	whereClause += " AND ";
	whereClause += buildEqualsSQL("hd", "'HD'", "'BOTH'",
			jQuery("#resolution-buttons"));
	whereClause += " AND ";
	whereClause += buildRangeSQL("duration", jQuery("#min-duration").html(),
			jQuery("#max-duration").html());

	return whereClause;
}

function buildRangeSQL(fieldName, min, max) {
	return "(" + fieldName + " BETWEEN " + min + " AND " + max + ")";
}

function buildInSQL(fieldName, jQueryelement) {
	var checkedValues = getCheckedValues(jQueryelement);
	if (checkedValues.length == 0) {
		return "1 = 2";
	}
	return fieldName + " IN (" + checkedValues.join() + ")";
}

function getCheckedValues(jQueryelement) {
	var checkedValues = new Array();
	jQuery('input:checked', jQueryelement).each(function(key, input) {
		checkedValues.push("'" + input.value + "'");
	});
	return checkedValues;
}

function buildEqualsSQL(fieldName, referenceValue, allValue, jQueryelement) {
	var equalsSQL = fieldName + " = 0";

	jQuery.each(getCheckedValues(jQueryelement), function(key, value) {
		if (referenceValue == value) {
			equalsSQL = fieldName + " = 1";
			return false;
		}

		if (allValue == value) {
			equalsSQL = fieldName + " = 1 OR " + fieldName + " = 0";
			return false;
		}
	});

	return "(" + equalsSQL + ")";
}