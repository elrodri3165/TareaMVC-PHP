<?php

require_once '../config/config.php';
require_once '../modelos/conexion.php';
require_once '../modelos/usuariosModelos.php';


class AjaxEmail{

    public static function ValidarEmail($email){

        $resultado = usuariosModelos::ValidarEmail($email);

        echo json_encode($resultado);

    }


}


if (isset ($_POST['email'])){
    AjaxEmail::ValidarEmail($_POST['email']);
}

if (isset ($_GET['email'])){
    AjaxEmail::ValidarEmail($_GET['email']);
}