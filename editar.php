<?php
    include('conexion.php');
    
    if (isset($_POST['editar'])) {

        $idbus = $_POST['bus-id'];
        $id = $_POST['edit-id'];
        $nom = $_POST['edit-nom'];
        $ape = $_POST['edit-ape'];
        $email = $_POST['edit-cor'];
        
        $sql = "UPDATE usuarios 
        SET id = $id, nombres = '$nom', apellidos = '$ape', correo = '$email'
        WHERE id = $idbus";
        
        if (mysqli_query($conn, $sql)) {
            echo 'Updated successfully';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
    header("Location:prueba.php");
?>