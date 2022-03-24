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

function showPasswords() {
	var password1 = document.getElementById("pswrd_1");
	var password2 = document.getElementById("pswrd_2");
	if (password1.type === "password" && password2.type === "password") {
		password1.type = "text";
		password2.type = "text";
	} else {
		password1.type = "password";
		password2.type = "password";
	}
}

$(document).ready(function () {
	"use strict";
	i18next.init({
		lng: 'es',
		resources: {
			es: {
				translation: {
					"wordLength": "Tu contrase&ntilde;a es demasiado corta",
					"wordNotEmail": "No uses tu email como tu contrase&ntilde;a",
					"wordSimilarToUsername": "Tu contrase&ntilde;a no puede contener tu nombre de usuario",
					"wordTwoCharacterClasses": "Mezcla diferentes clases de caracteres",
					"wordRepetitions": "Demasiadas repeticiones",
					"wordSequences": "Tu contrase&ntilde;a contiene secuencias",
					"errorList": "Errores:",
					"veryWeak": "Muy D&eacute;bil",
					"weak": "D&eacute;bil",
					"normal": "Normal",
					"medium": "Media",
					"strong": "Fuerte",
					"veryStrong": "Muy Fuerte",

					"start": "Comience a escribir la contrase&ntilde;a",
					"label": "Contrase&ntilde;a",
					"pageTitle": "Bootstrap 4 Password Strength Meter - Ejemplo de Traducciones",
					"goBack": "Atr&aacute;s"
				}
			}
		}
	},
		function () {
			var options = {};
			options.ui = {
				showVerdictsInsideProgressBar: true,
				showErrors: true,
				progressBarExtraCssClasses: "progress-bar-striped progress-bar-animated"
			};
			$('#pswrd_1').pwstrength(options);
			$('#pswrd_2').pwstrength(options);
		});
});

function disableBackspace() {
	window.location.hash = "no-back-button";
	window.location.hash = "Again-No-back-button"
	window.onhashchange = function () { window.location.hash = "no-back-button"; }
}