$("#email").change(function () {
	$(".alerta").remove();

    let email = $(this).val();
	// Para chequear que el script funciona
	//console.log("email", email)

	let datos = new FormData();
	datos.append("email", email);
    
    //console.log(datos);
	

	$.ajax({
		url: "ajax/ajaxEmail.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {
		if (respuesta != null) {
			$("#email").val("");

			$("#email").parent().after(`
						
						<div class="alerta alerta-advertencia bg-danger text-white p-2 rounded mb-3">

								El correo electrónico ya existe en la base de datos,  por favor ingrese otro diferente
						</div>


					`);
		}
		},
	});
	});
