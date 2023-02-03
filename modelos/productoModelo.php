<?php
require_once 'conexion.php';

class productoModelo{
    
        public static function CrearProducto($datos){
        
        $query = 'INSERT INTO productos (nombre) VALUES (:nombre)';
        
        $conexion = conexion::conectar();
        $resultado = $conexion->prepare($query);
                
        $resultado ->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        
        $resultado_sql = $resultado->execute();
            
        if($resultado_sql){
            $resultado ->closeCursor();
            $resultado = null;
            return true;
        }else{
            echo '<pre>';
            print_r($conexion->errorInfo());
            echo '</pre>';
        }
        
        $resultado ->closeCursor();
        $resultado = null;
    }
    
    public static function BuscarProductos($id_productos = null){
        if ($id_productos == null){
            $query = 'SELECT * FROM productos';
        }else{
            $query = 'SELECT * FROM productos WHERE id_producto = :id_producto';
        }
        
        
        $conexion = conexion::conectar();
        $resultado = $conexion->prepare($query);
                
        if ($id_productos != null){
            $resultado ->bindParam(":id_producto", $id_productos, PDO::PARAM_STR);
        }
        
        $resultado_sql = $resultado->execute();
        
        if($resultado_sql){
            $result = $resultado->fetchAll(PDO::FETCH_ASSOC);
            $resultado ->closeCursor();
            $resultado = null;
            return $result;
        }else{
            echo '<pre>';
            print_r($conexion->errorInfo());
            echo '</pre>';
        }
        
        $resultado ->closeCursor();
        $resultado = null;
    }
    
    
    public static function EliminarProducto($id_producto){
        
        $query = 'DELETE FROM productos WHERE id_producto = :id_producto';
        
        $conexion = conexion::conectar();
        $resultado = $conexion->prepare($query);
                
        $resultado ->bindParam(":id_producto", $id_producto, PDO::PARAM_INT);
        
        $resultado_sql = $resultado->execute();
            
        if($resultado_sql){
            $resultado ->closeCursor();
            $resultado = null;
            return true;
        }else{
            echo '<pre>';
            print_r($conexion->errorInfo());
            echo '</pre>';
        }
        
        $resultado ->closeCursor();
        $resultado = null;
        
    }
    
    public static function EditarProducto($datos){
        
        $query = 'UPDATE FROM productos SET nombre = :nombre, WHERE id_producto = :id_producto';
        
        $conexion = conexion::conectar();
        $resultado = $conexion->prepare($query);
                
        $resultado ->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $resultado ->bindParam(":id_producto", $datos['id_producto'], PDO::PARAM_INT);
        
        $resultado_sql = $resultado->execute();
            
        if($resultado_sql){
            $resultado ->closeCursor();
            $resultado = null;
            return true;
        }else{
            echo '<pre>';
            print_r($conexion->errorInfo());
            echo '</pre>';
        }
        
        $resultado ->closeCursor();
        $resultado = null;
    }
}