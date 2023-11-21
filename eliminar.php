<?php 
    if(!isset($_GET['sp_id'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $sp_id = $_GET['sp_id'];

    $sentencia = $bd->prepare("DELETE FROM cliente where sp_id = ?;");
    $resultado = $sentencia->execute([$sp_id]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    
?>