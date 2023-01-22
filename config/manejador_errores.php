<?php

function manejador_errores($nivel, $mensaje){
    switch($nivel){
        case 2:
            $str = 'Advertencia';
            break;
        case 8:
            $str = 'Notificacion';
            break;
        default:
            $str = 'Error';
    }
    
    if (ERRORES_POR_CONSOLAJS == true){
        echo "<script> console.log('nivel de error: $str - mensaje: $mensaje')</script><br>";
    }else{
        echo "<br><strong> $str</strong><br> $mensaje <hr>";
    }
}

if(ERRORES_PERSONALIZADOS == true){
    set_error_handler('manejador_errores');
}
