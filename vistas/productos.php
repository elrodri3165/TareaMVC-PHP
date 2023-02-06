<script>
$("#body").ready(function () {

	$.ajax({
		url: "ajax/ajaxProductos.php",
		method: "POST",
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (respuesta) {
		if (respuesta != null) {
			$("#result").val("");

			$("#result").parent().after(`
						
						<div class="alerta alerta-advertencia bg-danger text-white p-2 rounded mb-3">

								El correo electrónico ya existe en la base de datos,  por favor ingrese otro diferente
						</div>


					`);
		}
		},
	});
	});


</script>
   

   
<div class="album py-5 bg-light">
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="result">

            <div class="col">
                <div class="card shadow-sm">

                    <img src="data:image/png;base64, " alt="" width="100%" height="425">

                    <div class="text-center bg-dark text-white p-3"></div>


                    <div class="card-body" style="min-height:150px;">
                        <p class="card-text"></p>
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="btn-group">

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
