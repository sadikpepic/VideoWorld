function login() {
	var jQueryform = jQuery('#login'), name = jQuery('.login-name', jQueryform)
			.val(), pw = jQuery('.login-pw', jQueryform).val();

	jQuery.ajax({
		type : 'POST',
		url : 'php/data/login.php',
		data : 'name=' + name + '&pw=' + pw,
		success : function(data) {

			if (data) {
				jQueryform.find('#login-error').html(data);
				jQueryform.find('#login-error').addClass('loginError');
				return;
			}

			window.location.href = 'index.php';
		}
	});
}