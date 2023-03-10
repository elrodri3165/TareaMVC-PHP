<?php
require_once 'conexion.php';

class productoModelo{
    
        public static function CrearProducto($datos){
        
        $query = 'INSERT INTO productos (nombre, foto, precio) VALUES (:nombre, :foto, :precio)';
        
        $conexion = conexion::conectar();
        $resultado = $conexion->prepare($query);
                
        $resultado ->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $resultado ->bindParam(":foto", $datos['foto'], PDO::PARAM_STR);
        $resultado ->bindParam(":precio", $datos['precio'], PDO::PARAM_STR);
        
        $resultado_sql = $resultado->execute();
            
        if($resultado_sql){
            $resultado ->closeCursor();
            $resultado = null;
            productoModelo::SubirArchivo();
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
            $query = 'SELECT id_producto, nombre, precio, foto FROM productos';
        }else{
            $query = 'SELECT id_producto, nombre, precio, foto FROM productos WHERE id_producto = :id_producto';
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
        
        $query = 'UPDATE productos SET nombre = :nombre, precio = :precio, foto = :foto WHERE id_producto = :id_producto';
        
        $conexion = conexion::conectar();
        $resultado = $conexion->prepare($query);
                
        $resultado ->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $resultado ->bindParam(":id_producto", $datos['id_producto'], PDO::PARAM_INT);
        $resultado ->bindParam(":precio", $datos['precio'], PDO::PARAM_INT);
        $resultado ->bindParam(":foto", $datos['foto'], PDO::PARAM_STR);
        
        $resultado_sql = $resultado->execute();
            
        if($resultado_sql){
            $resultado ->closeCursor();
            $resultado = null;
            productoModelo::SubirArchivo();
            return true;
        }else{
            echo '<pre>';
            print_r($conexion->errorInfo());
            echo '</pre>';
        }
        
        $resultado ->closeCursor();
        $resultado = null;
    }
    
    
    public static function SubirArchivo(){
        $carpeta = getcwd().DIRECTORY_SEPARATOR.'img-productos'.DIRECTORY_SEPARATOR;
        if (opendir($carpeta)==false){
            mkdir($carpeta, 0777, true);
        }
        $destino = $carpeta.$_FILES['foto']['name'];
        
        copy ($_FILES['foto']['tmp_name'], $destino);
        
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $destino)) {
            echo "El fichero es v??lido y se subi?? con ??xito.\n";
            return true;
        }
        else {
            echo "??Posible ataque de subida de ficheros!\n";
            return false;
            die;
        }    
    }
}