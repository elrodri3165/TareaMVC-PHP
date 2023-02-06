<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.dataTables.css"/>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/dataTables.buttons.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.3/js/buttons.html5.js"></script>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/estilos.css">
    

    <title>Proyecto MVC - PHP</title>
</head>

<body class="bg-body-secondary" id="body">
    <header>
        <div class="container">
            <div class="container">
                <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                            <use xlink:href="#bootstrap" />
                        </svg>
                    </a>

                    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="index.php?ruta=inicio" class="nav-link px-2 link-secondary">Inicio</a></li>
                        <li><a href="index.php?ruta=productos" class="nav-link px-2 link-secondary">Productos</a></li>
                        <li><a href="index.php?ruta=nosotros" class="nav-link px-2 link-dark">Nosotros</a></li>
                        <li><a href="index.php?ruta=contacto" class="nav-link px-2 link-dark">Contacto</a></li>

                    </ul>

                    <div class="col-md-3 text-end">
                        <button type="button" class="btn btn-outline-dark me-2" data-bs-toggle="modal" data-bs-target="#modallogin">Login</button>
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalregistro">
                            Registro
                        </button>
                    </div>
                </header>
            </div>
        </div>
    </header>
    
    <main></main>

    <!-- Modal -->
    <div class="modal fade" id="modalregistro" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" action="" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" name="apellido" class="form-control rounded-3" id="apellido" placeholder="Apellido" required>
                            <label for="apellido">Apellido</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="nombre" class="form-control rounded-3" id="nombre" placeholder="Nombre" required>
                            <label for="nombre">Nombre</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control rounded-3" id="email" placeholder="name@example.com" required>
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control rounded-3" id="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-dark" type="submit">Crear usuario</button>
                        

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modallogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="" action="" method="post">
                        <div class="form-floating mb-3">
                            <input type="email" name="login_email" class="form-control rounded-3" id="login_email" placeholder="name@example.com" required>
                            <label for="login_email">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="login_password" class="form-control rounded-3" id="login_password" placeholder="Password" required>
                            <label for="login_password">Password</label>
                        </div>
                        <button class="w-100 mb-2 btn btn-lg rounded-3 btn-dark" type="submit">Login</button>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                </div>
            </div>
        </div>
    </div>



    <footer class="bg-dark text-white">
        <div class="container">
            <footer class="py-5">
                <div class="row">
                    <div class="col-6 col-md-2 mb-3">
                        <h5>Secciones</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="index.php?ruta=inicio" class="nav-link p-0 text-white">Inicio</a></li>
                            <li class="nav-item mb-2"><a href="index.php?ruta=productos" class="nav-link p-0 text-white">Productos</a></li>
                            <li class="nav-item mb-2"><a href="index.php?ruta=nosotros" class="nav-link p-0 text-white">Nosotros</a></li>
                            <li class="nav-item mb-2"><a href="index.php?ruta=contacto" class="nav-link p-0 text-white">Contacto</a></li>
                        </ul>
                    </div>

                    

                    <div class="col-md-5 offset-md-1 mb-3">
                        <form>
                            <h5>Suscribite a nuestro newsletter</h5>
                            <p>Mensualmente envianos nuestras promos y novedades</p>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                <label for="newsletter1" class="visually-hidden">Email</label>
                                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                                <button class="btn btn-outline-light" type="button">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                    <p>&copy; 2022 Company, Inc. All rights reserved.</p>
                    <ul class="list-unstyled d-flex">
                        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                    <use xlink:href="#twitter" />
                                </svg></a></li>
                        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                    <use xlink:href="#instagram" />
                                </svg></a></li>
                        <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                    <use xlink:href="#facebook" />
                                </svg></a></li>
                    </ul>
                </div>
            </footer>
        </div>
    </footer>
    <script src="js/ajax.js" type="text/javascript"></script>
</body>

</html>
