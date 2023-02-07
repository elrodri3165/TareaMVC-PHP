<?php
require_once 'config.php';
require_once '../modelos/conexion.php';
require_once '../controladores/controlador.php';

class Imagen{
    public static function MostarImagen(){
        $resultado = Controlador::BuscarProductoFoto($_GET['id_producto']);
            
        foreach ($resultado as $row){
            $imagenComoBase64 = base64_encode($row['foto']);
            echo $imagenComoBase64;
        }
    }
}

if (isset ($_GET['id_producto'])){
    Imagen::MostarImagen();
}
