<?php

require_once '../config/config.php';
require_once '../modelos/conexion.php';
require_once '../controladores/Controlador.php';

class AjaxProductos{
    public static function BuscarProductos(){
        $resultado = Controlador::BuscarProductos();
        echo json_encode($resultado);
    }
}


AjaxProductos::BuscarProductos();