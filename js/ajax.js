$("#email").change(function () {
	$(".alerta").remove();


	let datos = new FormData();
	datos.append("email", email);
	

	$.ajax({
		url: "ajax/ajaxEmail.php",
		method: "GET",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {
		if (respuesta) {
			$("#email").val("");

			$("#email").parent().after(`
						
						<div class="alerta alerta-advertencia">

								<strong>ERROR:</strong>

								El correo electrónico ya existe en la base de datos,  por favor ingrese otro diferente
						</div>


					`);
		}
		},
	});
	});
