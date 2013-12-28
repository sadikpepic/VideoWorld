function bindWishList() {
	jQuery('#wish-list').droppable({
		activeClass : "wishList-active",
		drop : function(event, ui) {
			var jQueryitem = ui.draggable, id = jQueryitem.attr('data-id');

			var wishList = new Array();
			if (localStorage.wishList) {
				wishList = jQuery.evalJSON(localStorage.wishList);
			}

			if (wishList.length == 5) {
				return true;
			}

			if (jQuery.inArray(id, wishList) != -1) {
				return true;
			}

			wishList.push(id);
			localStorage.wishList = jQuery.toJSON(wishList);
			refreshWishList();
		}
	});

	refreshWishList();
}

function resetWishList() {
	localStorage.wishList = "";

	refreshWishList();
}

function removeFromWishList(element) {
	var jQueryelement = jQuery(element), idToRemove = jQueryelement.closest(
			'.wish-list-entry').attr('data-id');

	var wishList = jQuery.evalJSON(localStorage.wishList), newWishList = new Array();

	jQuery.each(wishList, function(key, value) {
		if (value != idToRemove) {
			newWishList.push(value);
		}
	});
	localStorage.wishList = jQuery.toJSON(newWishList);

	refreshWishList();
}

function refreshWishList() {
	jQuery('#wish-list').empty();
	var jQuerywishListEntry = jQuery('<div style="margin:5px;font-size:14pt;">Wishlist</div>');
	jQuery('#wish-list').append(jQuerywishListEntry);
	if (!localStorage.wishList) {
		return;
	}

	var wishList = jQuery.evalJSON(localStorage.wishList);
	jQuery.each(wishList, function(key, value) {
		getTitleById(value);
	});
}

function getTitleById(id) {
	jQuery.ajax({
		type : 'POST',
		url : 'php/data/query.php',
		data : 'id=' + id,
		success : function(data) {
			displayTitle(id, data);
		}
	});
}

function displayTitle(id, title) {
	var jQuerywishListEntry = jQuery('<div class="wish-list-entry" data-id="'
			+ id
			+ '"><a href="index.php?page=videoplay&id='
			+ id
			+ '"><div style="margin:5px;width:166px;float:left;">'
			+ title
			+ '</div></a><a href="#" class="removeIcon"><div style="margin-top:5px;width:16px;float:left;"><img src="web/images/icons/delete.gif"></img></div></a></div>');
	jQuery('#wish-list').append(jQuerywishListEntry);

	jQuery('.removeIcon', jQuerywishListEntry).click(function() {
		removeFromWishList(this);
	});
}