<?php
ini_set('display_error', 1);
ini_set('display_startup', 1);
error_reporting(E_ALL);



/***********CONFIGURACION DE BASE DE DATOS************/
define ("DBUSER",                  "root");

define ("DBHOST",                  "localhost");

define ("DBPASSWORD",              "");

define ("DBNAME",                  "php_avanzado");
/***********CONFIGURACION DE BASE DE DATOS************/




/******CONFIGURACION DE GESTION DE ERRORES*********/
define ("ERRORES_POR_CONSOLAJS",   false);
define ("ERRORES_PERSONALIZADOS",  true);
/******CONFIGURACION DE GESTION DE ERRORES*********/


require_once 'manejador_errores.php';