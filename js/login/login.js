const notyf = new Notyf({
	types: [
		{
			type: 'success',
			duration: 5000,
			dismissible: true,
			ripple: true,
			position: {
				x: 'right',
				y: 'top',
			},
			background: 'green',
			icon: {
				className: 'material-icons',
				tagName: 'i',
				text: 'check_circle',
				color: 'white'
			}
		},
		{
			type: 'warning',
			duration: 5000,
			dismissible: true,
			ripple: true,
			position: {
				x: 'right',
				y: 'top',
			},
			background: 'orange',
			icon: {
				className: 'material-icons',
				tagName: 'i',
				text: 'report_problem',
				color: 'white'
			}
		},
		{
			type: 'danger',
			duration: 5000,
			dismissible: true,
			ripple: true,
			position: {
				x: 'right',
				y: 'top',
			},
			background: 'red',
			icon: {
				className: 'material-icons',
				tagName: 'i',
				text: 'dangerous',
				color: 'white'
			}
		},
	]
});

function disableBackspace() {
	window.location.hash = "no-back-button";
	window.location.hash = "Again-No-back-button"
	window.onhashchange = function () { window.location.hash = "no-back-button"; }
}

$(document).ready(function() {
	$(".toggle-password").click(function () {
		$(this).toggleClass("fa-eye fa-eye-slash");
		var input = $($(this).attr("toggle"));

		if (input.attr("type") == "password") {
			input.attr("type", "text");
		} else {
			input.attr("type", "password");
		}
	});

	var button_login = document.getElementById("loginbtn");
	button_login.addEventListener('click', function () {
		grecaptcha.ready(function () {
			grecaptcha.execute('6Lcdr00cAAAAAPUYKJxQK2mU6iE6Qnd_fRB43haD', {
				action: 'validateUser'
			}).then(function (token) {
				$('#formlogin').prepend('<input hidden name="token" value="' + token + '">');
				$('#formlogin').prepend('<input hidden name="action" value="validateUser">');
				$('#formlogin').submit();
			});
		});
	});
});