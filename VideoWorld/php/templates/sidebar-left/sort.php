<div id="overview-sort" class='sidebarBox'>

	<div class="sidebarTitle">
		<a href="#" id="sort-content-toggle"><img
			src="web/images/icons/minus.png" alt="" class='togglePic'></img></a>
		Sort
	</div>

	<div id="sort-content" class='filterAll'>
		<select id="field-name-select">
			<option value="title">Title</option>
			<option value="times_viewed">Times viewed</option>
			<option value="release_year">Release year</option>
			<option value="permit_age">Permit age</option>
			<option value="duration">Duration</option>
		</select>

		<div id="direction-buttons" class='elements'>
			<input type="radio" id="asc-radio-button" name="direction"
				value="ASC" checked="checked"><label for="asc-radio-button">ASC</label></input>
			<input type="radio" id="desc-radio-button" name="direction"
				value="DESC"><label for="desc-radio-button">DESC</label></input>
		</div>
	</div>
</div>

<script type="text/javascript">
	bindSort();

	jQuery('#sort-content-toggle').click(function(){
		var jQueryfilterContent = jQuery('#sort-content'),
			jQueryimg = jQuery(this).find('img');
		
		if ( jQueryfilterContent.is(':visible') ){
			jQueryimg.attr('src', 'web/images/icons/plus.png');
			jQueryfilterContent.slideUp();
			return;
		}

		jQueryimg.attr('src', 'web/images/icons/minus.png');
		jQueryfilterContent.slideDown();
	});
</script>