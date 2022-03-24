		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var startdt = $('#start_dt').val();
			var enddt = $('#end_dt').val();
			var nmcomrl= $("#nmcomrl").val();
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/events.php?action=ajax&page='+page+'&nmcomrl='+nmcomrl+'&startdt='+startdt+'&enddt='+enddt,
				beforeSend: function(objeto){
				$('#loader').html('<img src="./img/gif/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
				}
			})
		}

		function eliminar (id){
			var nmcomrl= $("#nmcomrl").val();
			if (confirm("¿Realmente deseas eliminar el Evento?")){	
			$.ajax({
				type: "GET",
				url: "./ajax/events.php",
				data: "id="+id,"nmcomrl":nmcomrl,
				beforeSend: function(objeto){
					$("#resultados").html('<img src="./img/gif/ajax-loader.gif"> Cargando...');
				},
				success: function(datos){
					$("#resultados").html(datos);
					load(1);
				}
			});
		}}