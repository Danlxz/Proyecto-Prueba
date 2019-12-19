<?php
    include('conexion.php');
    
    if (isset($_POST['insertar'])) {

        $id = $_POST['nuevo-id'];
        $nom = $_POST['nuevo-nom'];
        $ape = $_POST['nuevo-ape'];
        $email = $_POST['nuevo-cor'];
        
        $sql = "INSERT INTO usuarios VALUES ($id,'$nom','$ape','$email')";
        
        if (mysqli_query($conn, $sql)) {
            echo 'Insert successfully';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
    header("Location:prueba.php");
?>