<?php
$join = "";
if ($type == 'tvshow') {
	$join = " JOIN tvshow t on t.video_idvideo = v.idvideo";
} else if ($type == 'movie') {
	$join = " JOIN movie m on m.video_idvideo = v.idvideo";
}

$durationMin = getMinValueVideoAttribute ( 'duration', $join );
$durationMax = getMaxValueVideoAttribute ( 'duration', $join );
$permitAgeMin = getMinValueVideoAttribute ( 'permit_age', $join );
$permitAgeMax = getMaxValueVideoAttribute ( 'permit_age', $join );
$releaseYearMin = getMinValueVideoAttribute ( 'release_year', $join );
$releaseYearMax = getMaxValueVideoAttribute ( 'release_year', $join );

echo "<div id='overview-filter' class='sidebarBox'>

	<div class='sidebarTitle'>
		<a href='#' id='filter-content-toggle' ><img src='web/images/icons/minus.png' class='togglePic'></img></a>
		Filter
	</div>

	<div id='filter-content' class='filterAll'>
		Permit Age:
		<span id='min-permit-age'></span> - <span id='max-permit-age'></span>
		<div id='permit-age-slider' class='elements'></div>
	
		Release Year:
		<span id='min-release-year'></span> - <span id='max-release-year'></span>
		<div id='release-year-slider' class='elements'></div>
	
		Language:
		<div id='language-checkboxes' class='elements'>
			<input type='checkbox' id='en-checkbox' checked='checked' value='EN' /><label for='en-checkbox'>EN</label>
			<input type='checkbox' id='de-checkbox' checked='checked' value='DE' /><label for='de-checkbox'>DE</label>
			<input type='checkbox' id='fr-checkbox' checked='checked' value='FR' /><label for='fr-checkbox'>FR</label>
		</div>
	
		Resolution:
		<div id='resolution-buttons' class='elements'>
			<input type='radio' id='both-radio-button' name='resolution' checked='checked' value='BOTH'><label for='both-radio-button'>Both</label></input>
			<input type='radio' id='hd-radio-button' name='resolution' value='HD' ><label for='hd-radio-button'>HD</label></input>
			<input type='radio' id='sd-radio-button' name='resolution' value='SD' ><label for='sd-radio-button'>SD</label></input>
		</div>
	
		<!-- reimplement  
		Rating:
		<span id='min-rating'></span> - <span id='max-rating'></span>
		<div id='rating-slider' class='elements'></div>
		-->
		
		Duration:
		<span id='min-duration'></span> - <span id='max-duration'></span>
		<div id='duration-slider' class='elements'></div>
	</div>

</div>

<script type='text/javascript'>
	bindFilter($permitAgeMin, $permitAgeMax, $releaseYearMin, $releaseYearMax, $durationMin, $durationMax);
	
	jQuery('#filter-content-toggle').click(function(){
		var jQueryfilterContent = jQuery('#filter-content'),
			jQueryimg = jQuery(this).find('img');
		
		if ( jQueryfilterContent.is(':visible') ){
			jQueryimg.attr('src', 'web/images/icons/plus.png');
			jQueryfilterContent.slideUp();
			return;
		}

		jQueryimg.attr('src', 'web/images/icons/minus.png');
		jQueryfilterContent.slideDown();
	});
</script>";

?>