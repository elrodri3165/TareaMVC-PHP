<?php
require_once 'conexion.php';

class usuariosModelos{
        public static function CrearUsuario($datos){
        
        $query = 'INSERT INTO usuarios (apellido, nombre, email, password, activo) VALUES (:apellido, :nombre, :email, :password, :activo)';
        
        $conexion = conexion::conectar();
        $resultado = $conexion->prepare($query);
                
        $resultado ->bindParam(":apellido", $datos['apellido'], PDO::PARAM_STR);
        $resultado ->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $resultado ->bindParam(":email", $datos['email'], PDO::PARAM_STR);
        $resultado ->bindParam(":password", $datos['password'], PDO::PARAM_STR);
        $resultado ->bindParam(":activo", $datos['activo'], PDO::PARAM_INT);
        
        $resultado_sql = $resultado->execute();
            
        if($resultado_sql){
            return true;
        }else{
            echo '<pre>';
            print_r($conexion->errorInfo());
            echo '</pre>';
        }
        
        $resultado ->closeCursor();
        $resultado = null;
    }
    
    public static function ValidarUsuarios($datos){
        $query = 'SELECT * FROM usuarios WHERE email = :email AND activo = 1';
        
        $conexion = conexion::conectar();
        $resultado = $conexion->prepare($query);
            
        $resultado ->bindParam(":email", $datos['email'], PDO::PARAM_STR);
        //$resultado ->bindParam(":password", $datos['password'], PDO::PARAM_STR);
        
        if($resultado->execute()){
            $result = $resultado->fetch(PDO::FETCH_ASSOC);
            
            if($result != null && $result['email'] == $datos['email'] && password_verify($datos['password'], $result['password'])){
                session_start();
                $_SESSION['user'] = $datos['email'];
                return true;
            }   
        }else{
            echo '<pre>';
            print_r($conexion->errorInfo());
            echo '</pre>';
        }
        
        $resultado ->closeCursor();
        $resultado = null;
    }
    

    public static function ValidarEmail($email){
        $query = 'SELECT email FROM usuarios WHERE email = :email AND activo = 1';
        
        $conexion = conexion::conectar();
        $resultado = $conexion->prepare($query);
            
        $resultado ->bindParam(":email", $email, PDO::PARAM_STR);
        //$resultado ->bindParam(":password", $datos['password'], PDO::PARAM_STR);
        
        if($resultado->execute()){
            $result = $resultado->fetch(PDO::FETCH_ASSOC);
            
            if($result != null ){
                return $result;
            }   
        }else{
            return false;
        }
        
        $resultado ->closeCursor();
        $resultado = null;
    }
    
}
