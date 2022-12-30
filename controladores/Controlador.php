<?php

class Controlador{

    public $contenido;
    public $ruta;

    public function __construct(){
        $this->contenido = file_get_contents('vistas/html_basica.php');
        $this->TomarRuta();
    }

    public function __destruct(){
        echo $this->contenido;
    }

    private function TomarRuta(){
        if (isset ($_GET['ruta'])){
            $this->ruta = $_GET['ruta'];
            $this->EjecutaRuta();
        }else{

        }
    }

    private function EjecutaRuta(){
        $ruta = 'vistas/'.$this->ruta.'.php';
        
        if (is_file($ruta)){
            $contenido_parcial = file_get_contents($ruta);
            $this->contenido = str_replace("<main> </main>", $contenido_parcial, $this->contenido);
        }else{
            $contenido_parcial = file_get_contents('vistas/error404.php');
        }
        
    }






}