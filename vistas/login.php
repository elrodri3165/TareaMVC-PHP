<main>
    <div class="container">
        <p class="h1 text-center mb-5">Bienvenidos al login</p>
        <div class="fs-4 lh-lg bg-dark-subtle p-2 rounded-top">
            <p>Bienvenidos al login de Usuarios</p>
            <a class="btn btn-danger btn-block" href="cerrarsesion" role="button">Salir</a>
        </div>

        <div class="fs-4 lh-lg bg-dark-subtle p-2 mb-2 rounded-bottom">
            <form action="index.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_producto" id="id_producto" value="">
                <label for="input" class="form-label">Por favor ingrese producto</label>
                <input type="text" name="producto" id="input" class="form-control mb-2" aria-describedby="Agregar Producto">
                
                <label for="precio" class="form-label">Por favor ingrese el precio del producto</label>
                <input type="number" name="precio" id="precio" class="form-control mb-2" aria-describedby="Precio">
                
                <label for="foto" class="form-label">Por favor ingrese la foto</label>
                <input type="file" name="foto" id="foto" class="form-control mb-2" aria-describedby="Agregar foto del producto">

                <input class="btn btn-primary" type="submit" value="Guardar">
            </form>
        </div>


        <table id="productos" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID_PRODUCTO</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>Modifcar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#productos').DataTable({
                data: productos,
                columns: [{
                        data: 'id_producto'
                    },
                    {
                        data: 'nombre'
                    },
                    {
                        data: 'precio'
                    },
                    {
                        data: 'id_producto',
                        render: function(data, type, row) {
                            return '<a class="btn btn-success" role="button" href="login?id_producto=' + data + '">Modificar<a/>';
                    }
                    },
                    {
                        data: 'id_producto',
                        render: function(data, type, row) {
                            return '<a class="btn btn-danger" role="button" href="eliminar?id_producto=' + data + '">Eliminar<a/>';
                        }
                    },
                ],
            });
        });


        $.extend(true, $.fn.dataTable.defaults, {
            "language": {
                "decimal": ",",
                "thousands": ".",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoPostFix": "",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "loadingRecords": "Cargando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "processing": "Procesando...",
                "search": "Buscar:",
                "searchPlaceholder": "Término de búsqueda",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "aria": {
                    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                //only works for built-in buttons, not for custom buttons
                "buttons": {
                    "create": "Nuevo",
                    "edit": "Cambiar",
                    "remove": "Borrar",
                    "copy": "Copiar",
                    "pdf": "documento PDF",
                    "print": "Imprimir",
                    "colvis": "Visibilidad columnas",
                    "collection": "Colección",
                    "upload": "Seleccione fichero...."
                },

                "select": {
                    "rows": {
                        _: '%d filas seleccionadas',
                        0: 'clic fila para seleccionar',
                        1: 'una fila seleccionada'
                    }
                }
            }
        });
        
        
        if(producto != null){
            $('#input').val(producto['0'].nombre);
            $('#id_producto').val(producto['0'].id_producto);
            $('#precio').val(producto['0'].precio);
        }

    </script>

</main>
