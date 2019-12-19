<?php
    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    } else {
        echo "Esta pagina es solo para administradores.";
        exit;
    }

    $now = time();

    if($now > $_SESSION['expire']) {
        session_destroy();
        echo "Su sesion a terminado";
        exit;
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600|Open+Sans:400,600,700" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
    <link rel="stylesheet" href="css/spur.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Prueba</title>
  </head>

  <body>
    <div class="dash">
        <div class="dash-nav dash-nav-dark">
            <header>
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </a>
                <a href="https://fontawesome.com/icons?d=gallery" class="spur-logo"> <i class="fas fa-feather-alt"></i><span>Prueba</span></a>
            </header>
            <nav class="dash-nav-list">
                <div class="dash-nav-dropdown">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fas fa-laptop"></i> BD </a>
                    <div class="dash-nav-dropdown-menu">
                        <a href="prueba.php" class="dash-nav-dropdown-item">Prueba</a>
                        <a href="world.php" class="dash-nav-dropdown-item">World</a>
                    </div>
                </div>
                <a href="prueba.php" class="dash-nav-item">
                    <i class="fas fa-laptop"></i> Tablas </a>
                <div class="dash-nav-dropdown">
                    <a href="#!" class="dash-nav-item dash-nav-dropdown-toggle">
                        <i class="fas fa-microchip"></i> Gestion </a>
                    <div class="dash-nav-dropdown-menu">
                        <a class="dash-nav-dropdown-item" data-toggle="modal" data-target="#modal1">Nuevo</a>
                        <a class="dash-nav-dropdown-item" data-toggle="modal" data-target="#modal2">Buscar</a>
                        <a class="dash-nav-dropdown-item" data-toggle="modal" data-target="#modal3">Editar</a>
                        <a class="dash-nav-dropdown-item" data-toggle="modal" data-target="#modal4">Borrar</a>
                    </div>
                </div>
                <a href="prueba.php" class="dash-nav-item">
                    <i class="fas fa-database"></i> Consultar </a>
                
            </nav>
        </div>
        <div class="dash-app">
            <header class="dash-toolbar">
                <a href="#!" class="menu-toggle">
                    <i class="fas fa-chevron-circle-left"></i>
                </a>
                <div class="tools">
                    <div class="dropdown tools-item">
                        <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-question-circle"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="#!"><?php echo 'Admin - '.$_SESSION['nombre'] ?></a>
                            <a class="dropdown-item" href="logout.php">Salir</a>
                        </div>
                    </div>
                </div>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <h1 class="dash-title">Tablas BD - Prueba</h1>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-table"></i>
                                    </div>
                                    <div class="spur-card-title">Tabla 1 - Usuarios</div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover table-in-card">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nombres</th>
                                                <th scope="col">Apellidos</th>
                                                <th scope="col">Correo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include('conexion.php');
                                                  
                                                $sql = "SELECT * FROM usuarios";
                                                $cons = mysqli_query($conn, $sql);

                                                while ($row = mysqli_fetch_array($cons)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['id'] ?></td>
                                                <td><?php echo $row['nombres'] ?></td>
                                                <td><?php echo $row['apellidos'] ?></td>
                                                <td><?php echo $row['correo'] ?></td>
                                            </tr>
                                            <?php
                                                }
                                                mysqli_close($conn);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-table"></i>
                                    </div>
                                    <div class="spur-card-title">Tabla 2 - Admin</div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover table-in-card">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Contraseña</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                include('conexion.php');
                                                  
                                                $sql = "SELECT * FROM admin";
                                                $cons = mysqli_query($conn, $sql);

                                                while ($row = mysqli_fetch_array($cons)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['nombre'] ?></td>
                                                <td><?php echo $row['contraseña'] ?></td>
                                            </tr>
                                            <?php
                                                }
                                                mysqli_close($conn);
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
  
    <!-- Ventanas Modal -->

    <!-- Nuevo -->
    <div class="modal" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post" action="insertar.php">
            <div class="modal-header">   
                <div class="spur-card-icon">
                    <i class="fas fa-keyboard"></i>
                </div>
                <div class="spur-card-title">Nuevo</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="spur-card-title">ID</div>
                    <input name="nuevo-id" type="number" class="form-control">
                </div>
                <div class="form-group">
                    <div class="spur-card-title">Nombres</div>
                    <input name="nuevo-nom" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <div class="spur-card-title">Apellidos</div>    
                    <input name="nuevo-ape" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <div class="spur-card-title">Correo</div>    
                    <input name="nuevo-cor" type="email" class="form-control" placeholder="name@example.com">
                </div>
            </div>
            <div class="modal-footer">
                <input name="insertar" type="submit" class="btn btn-outline-dark" value="Insert">
            </div>
            </form>
        </div>
    </div>
    </div>

    <!-- Buscar -->
    <div class="modal" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="prueba.php">
            <div class="modal-header">   
                <div class="spur-card-icon">
                    <i class="fas fa-search"></i>
                </div>
                <div class="spur-card-title">Buscar</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="spur-card-title">ID</div>
                    <input name="buscar-id" type="number" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button name="buscar" type="submit" class="btn btn-outline-dark"><i class="fas fa-search"></i></button>
            </div>
            </form>
        </div>
    </div>
    </div>

    <?php
        include('conexion.php');

        if (isset($_POST['buscar'])) {
    
            $idbus = $_POST['buscar-id'];
            $sql = "SELECT * FROM usuarios WHERE id=$idbus";
            $cons = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($cons)) {
    ?>

    <!-- Editar -->
    <div class="modal" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="post" action="editar.php">
            <div class="modal-header">   
                <div class="spur-card-icon">
                    <i class="fas fa-edit"></i>
                </div>
                <div class="spur-card-title">Editar</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="spur-card-title">Filtro</div>
                    <input name="bus-id" type="number" class="form-control" value= <?php echo $idbus ?> readonly="readonly" >
                </div>
                <div class="form-group">
                    <div class="spur-card-title">ID</div>
                    <input name="edit-id" type="number" class="form-control" value= <?php echo $row['id'] ?> >
                </div>
                <div class="form-group">
                    <div class="spur-card-title">Nombres</div>
                    <input name="edit-nom" type="text" class="form-control" value= <?php echo $row['nombres'] ?> >
                </div>
                <div class="form-group">
                    <div class="spur-card-title">Apellidos</div>    
                    <input name="edit-ape" type="text" class="form-control" value= <?php echo $row['apellidos'] ?> >
                </div>
                <div class="form-group">
                    <div class="spur-card-title">Correo</div>    
                    <input name="edit-cor" type="email" class="form-control" value= <?php echo $row['correo'] ?> >
                </div>
            </div>
            <div class="modal-footer">
                <input name="editar" type="submit" class="btn btn-outline-dark" value="Update">
            </div>
            </form>
        </div>
    </div>
    </div>

    <?php 
            }
        }
        mysqli_close($conn);
    ?> 

    <!-- Borrar -->
    <div class="modal" id="modal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="borrar.php">
            <div class="modal-header">   
                <div class="spur-card-icon">
                    <i class="fas fa-eraser"></i>
                </div>
                <div class="spur-card-title">Borrar</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="spur-card-title">ID</div>
                    <input name="borrar-id" type="number" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <input name="borrar" type="submit" class="btn btn-outline-dark" value="Delete">
            </div>
            </form>
        </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="js/chart-js-config.js"></script>
    <script src="js/spur.js"></script>
    
  </body>
</html>

