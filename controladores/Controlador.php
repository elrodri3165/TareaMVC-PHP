<?php

class Controlador{

    public $contenido;
    public $ruta;

    public function __construct(){
        
        require_once 'modelos/productoModelo.php';
        require_once 'modelos/usuarioModelo.php';
        
        
        if (isset ($_GET['ruta'])){
            $this->ruta = $_GET['ruta'];
        }
        
        $this->contenido = file_get_contents('vistas/html_basica.php');
    
        if (isset ($_POST['producto'], $_POST['id_producto']) && $_POST['id_producto'] != null){
            $array = [
                'nombre' => $_POST['producto'],
                'id_producto' => $_POST['id_producto'],
            ];
            
            if (productoModelo::EditarProducto($array)){
                header('Location: index.php?ruta=login');
                die;
            }else{
                header('Location: index.php?ruta=error');
                die;
            }
        }
        
        
        if (isset ($_POST['producto'])){
            $array = [
                'nombre' => $_POST['producto'],
            ];
            
            if (productoModelo::CrearProducto($array)){
                header('Location: index.php?ruta=login');
                die;
            }else{
                header('Location: index.php?ruta=error');
                die;
            }
        }
        
        
        if (isset ($_POST['login_email'], $_POST['login_password'])){
            /*voy a validar login*/
            $array = [
                'email' => $_POST['login_email'],
                'password' => $_POST['login_password'],
            ];
            
            if (usuarioModelo::ValidarUsuarios($array)){
                header('Location: index.php?ruta=login');
                die;
            }else{
                header('Location: index.php?ruta=error');
                die;
            }
        }
        
        if (isset ($_POST['apellido'], $_POST['nombre'], $_POST['email'], $_POST['password'])){
            $array = [
                'apellido' => $_POST['apellido'],
                'nombre' => $_POST['nombre'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'activo' => intval(1),
            ];
            usuarioModelo::CrearUsuario($array);
            /*redirecciono para que no se cree dos veces 
            el mismo usuario si actualizan el navegador*/
            header('Location: index.php');
            die;
        }
        
        
        if($this->ruta == 'login'){
            $this->EjecutaValidacionSession();
        }
        
        if($this->ruta == 'cerrarsesion'){
            $this->CerrarSesion(); 
        }
            
        if($this->ruta == 'eliminar'){
            productoModelo::EliminarProducto($_GET['id_producto']);
            header('Location: index.php?ruta=login');
        }
        
        if (isset ($_GET['ruta'])){
            $this->EjecutaRuta();
        }
        
    }

    public function __destruct(){
        echo $this->contenido;
    }


    private function EjecutaRuta(){
        $ruta = 'vistas/'.$this->ruta.'.php';
        
        if (is_file($ruta)){
            $contenido_parcial = file_get_contents($ruta);
        }else{
            $contenido_parcial = file_get_contents('vistas/error404.php');
        }
        
        $this->contenido = str_replace("<main></main>", $contenido_parcial, $this->contenido);
    }
    
    private function EjecutaValidacionSession(){
        session_start();
        
        if (isset ($_SESSION['user'])){
            $contenido_parcial = file_get_contents('vistas/login.php');
            $productos = productoModelo::BuscarProductos();
            echo '<script> var productos = ';
            echo json_encode($productos);
            echo ';</script>';
            
            if (isset ($_GET['id_producto'])){
                $producto = productoModelo::BuscarProductos($_GET['id_producto']);echo '<script> var producto = ';
                echo json_encode($producto);
                echo ';</script>';
            }
            $this->contenido = str_replace("<main></main>", $contenido_parcial, $this->contenido);
        }
        die;
        /*ejecuto die para que no se ejecute igual la ruta y muestre el contenido del login sino hay usuario en la session*/
    }
    
    private function CerrarSesion(){
        session_start();
        session_destroy();
    }
    
    public static function ValidarEmail($email){
        require_once '../modelos/usuarioModelo.php';
        $resultado = usuarioModelo::ValidarEmail($email);
        return $resultado;
    }
}