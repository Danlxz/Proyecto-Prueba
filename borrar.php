<?php
    include('conexion.php');
    
    if (isset($_POST['borrar'])) {

        $id = $_POST['borrar-id'];
        
        $sql = "DELETE FROM usuarios WHERE id = $id";
        
        if (mysqli_query($conn, $sql)) {
            echo 'Delete successfully';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
    header("Location:prueba.php");
?>