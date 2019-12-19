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
    <title>Login</title>
</head>

<body>
    <div class="form-screen">
        <a href="prueba.php" class="spur-card-title text-white mb-4"><i class="fas fa-feather-alt"></i> Prueba</a>
        <form class="form-conatiner" method="post" action="login.php">
            <div class="form-group">
                <div class="spur-card-title text-white"><i class="fas fa-cloud"></i> Cuenta (Admin)</div>
            </div>
            <div class="form-group">
                <input name="nom-admin" type="text" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group">
                <input name="pass-admin" type="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <input name="entrar" type="submit" class="btn btn-outline-dark" value="Entrar">
            </div>
        </form>
        <span id="msg" class="text-white mt-4"></span>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="js/chart-js-config.js"></script>
    <script src="js/spur.js"></script>

</body>

</html>

<?php
    include('conexion.php');
    session_start();

    if (isset($_POST['entrar'])) {

        $nom = $_POST['nom-admin'];
        $pass = $_POST['pass-admin'];
        
        $sql = "SELECT * FROM admin WHERE nombre = '$nom' AND contraseña = '$pass'";
        
        $cons = mysqli_query($conn, $sql);

        $row = mysqli_fetch_array($cons);

        if (empty($nom) || empty($pass)) {
            echo '<script>
                document.getElementById("msg").innerHTML = "Llene todos los campos.";
                </script>';
        }else {
            if ($row[0] == $nom and $row[1] == $pass) {
                $_SESSION['loggedin'] = true;
    	        $_SESSION['start'] = time();
	            $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);            
                $_SESSION['nombre'] = $nom;
                header("Location:prueba.php");
            }else {
                echo '<script>
                document.getElementById("msg").innerHTML = "El nombre y/o clave son incorrectas, vuelva a intentarlo.";
                </script>';
            }
        }
    }
    mysqli_close($conn);
?>