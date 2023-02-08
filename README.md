# TareaMVC-PHP

Proyecto Gallo Rodrigo Nicolas Curso PHP avanzado UTN BA

1. Clonar el proyecto completo en carpeta htdocs de xampp o servidor local instalado.
2. crear una base de datos con el nombre "php_avanzado"
3. el proyecto usa el user "root" y el pass vacío, de cualquier manera en el archivo config.php dentro de la carpeta config (config/config.php) 
se pueden setear estos datos.

/***********CONFIGURACION DE BASE DE DATOS************/

define ("DBUSER",                  "root");

define ("DBHOST",                  "localhost");

define ("DBPASSWORD",              "");

define ("DBNAME",                  "php_avanzado");

/***********CONFIGURACION DE BASE DE DATOS************/

4. con el user "admin@admin.com" y el pass "admin" se puede ingresar como administrador del sitio para comenzar a trabajar.

EL proyecto es un sitio web autoadministrable desarrolado bajo el patron modelo vista controlador.
A traves de apache y el archivo htaccess redirijo todas las peticiones al index.php.

Con la clase controlador que se instancia dentro del index y la ayuda de la varibale super global $_SERVER['REQUEST_URI'] obtengo la ruta solicitada 
por el navedador y con las funciones del controlador voy llamando, creando o editando las distinas funciones de los modeloUsuarios o modeloProducto.

modeloUsuario es la clase que se encargada de manejar los usuarios del sitio, (login, crear usuarios, validarEmail para la peticion ajax).

modeloProducto es la clase que se encargada de manejar los productos del sitio (crear, eliminar, modificar y buscar productos).

modeloUsuario y modeloProducto ambas usan la clase conexion para utilar la base de datos MySQL.

Si se crea una ruta nueva, por ej, /noticias luego creando un archivo que se llame noticias.php el proyecto enrutara automaticamente y mostrara el 
contenido de dicha vista en el <main></main> del documento generado.
