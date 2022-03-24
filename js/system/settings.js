function showPasswords() {
	var password1 = document.getElementById("pswrdNew");
	var password2 = document.getElementById("pswrdNew2");
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
			$('#pswrdNew').pwstrength(options);
			$('#pswrdNew2').pwstrength(options);
		});
});

$("#form_update_information").submit(function (event) {
	$('#updinfo').attr("disabled", false);

	var parametros = $(this).serialize();
	$.ajax({
		type: "POST",
		url: "../php/ajax/upd-profile.php",
		data: parametros,
		beforeSend: function (objeto) {
			$("#respuesta_info").html("Mensaje: Cargando...");
			notyf.open({
				type: 'info',
				message: '<i>Cargando...</i>'
			});
		},
		success: function (datos) {
			$("#respuesta_info").html(datos);
			$('#updinfo').attr("disabled", false);
			$('#page_content').load(`settings.php`);
			//window.location.reload();
		}
	});
	event.preventDefault();
});

$(function () {
	$("input[name='fileimg']").on("change", function () {
		var formData = new FormData($("#file_img")[0]);
		var ruta = "../php/ajax/upd-profile_image.php";
		$.ajax({
			xhr: function () {
				var xhr = new window.XMLHttpRequest();

				// Upload progress
				xhr.upload.addEventListener("progress", function (evt) {
					if (evt.lengthComputable) {
						var percentLoad = Math.round((evt.loaded * 100) / evt.total);//Calculate in percent
						const decimal_percentLoad = percentLoad.toFixed(2);//Percent in Decimal

						//console.log(decimal_percentLoad);
						img_uploadbar.setAttribute('aria-valuenow', decimal_percentLoad);
						img_uploadbar.style.width = decimal_percentLoad + "%";
						img_uploadbar.textContent = decimal_percentLoad + "%";
					}
				}, false);
				return xhr;
			},

			url: ruta,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			success: function (datos) {
				$("#respuesta_img").html(datos);
				$('#page_content').load(`settings.php`);
				//window.location.reload();
			}
		});
	});
});

$("#upd_password").submit(function (event) {
	$('#updpswrd').attr("disabled", false);

	var parametros = $(this).serialize();
	$.ajax({
		type: "POST",
		url: "../php/ajax/upd-password.php",
		data: parametros,
		beforeSend: function (objeto) {
			$("#respuesta_pswrd").html("Mensaje: Cargando...");
			notyf.open({
				type: 'info',
				message: '<i>Cargando...</i>'
			});
		},
		success: function (datos) {
			$("#respuesta_pswrd").html(datos);
			$('#updpswrd').attr("disabled", false);
			$('#page_content').load(`settings.php`);
		}
	});
	event.preventDefault();
})