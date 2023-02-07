<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="result">

            
        </div>
    </div>
</div>


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
        
            for (var i = 0; i < respuesta.length; i++){
                $("#result").append(`
						
				<div class="col">
                    <div class="card shadow-sm">
                        <img src="data:image/png;base64, http://localhost/TareaMVC-PHP/config/imagen.php?id_producto=`+ respuesta[i].id_producto +`" alt="" width="100%" height="425">

                            <div class="text-center bg-dark text-white p-3"></div>
                            <div class="card-body" style="min-height:150px;">
                                <p class="card-text">`+ respuesta[i].nombre +`</p>
                                <div class="d-flex justify-content-between align-items-end">
                                <div class="btn-group">
                                    Precio: `+ respuesta[i].precio +`
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

					`);
            }
		}
		},
	});
	});


</script>
   