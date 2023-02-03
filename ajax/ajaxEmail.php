<?php

require_once '../config/config.php';
require_once '../modelos/conexion.php';
require_once '../controladores/Controlador.php';

class AjaxEmail{
    public static function ValidarEmail($email){
        $resultado = Controlador::ValidarEmail($email);
        echo json_encode($resultado);
    }
}


if (isset ($_POST['email'])){
    AjaxEmail::ValidarEmail($_POST['email']);
}