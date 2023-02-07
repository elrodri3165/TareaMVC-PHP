<?php
require_once 'config.php';
require_once '../modelos/conexion.php';
require_once '../controladores/controlador.php';

class Imagen{
    public static function MostarImagen(){
        $resultado = Controlador::BuscarProductoFoto($_GET['id_producto']);
        
        
            
        foreach ($resultado as $row){
            $imagenComoBase64 = base64_encode($row['foto']);
            $img = '<img src="data:image/png;base64, '.$imagenComoBase64.' " alt="" width="100%" height="425">';
            echo $img;
        }
    }
}

if (isset ($_GET['id_producto'])){
    Imagen::MostarImagen();
}
