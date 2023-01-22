<?php
class conexion{
    public static function conectar(){
        $texto = 'mysql:host='.DBHOST.';'.'dbname='.DBNAME;
        echo $texto;
        try {
            $mbd = new PDO($texto, DBUSER, DBPASSWORD);
            return $mbd; 
        } catch (PDOException $e) {
            print "¡Error!: " . $e->getMessage() . "<br/>";
            die();
        }    
    }
}