<?php
    print_r($_POST);
    if(!isset($_POST['sp_id'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $sp_id = $_POST['sp_id'];
    $nombre = $_POST['txtNombre'];
    $ap_paterno = $_POST['txta'];
    $ap_materno = $_POST['txtam'];
    $num = $_POST['txtt'];
    $direccion = $_POST['txtd'];
    $producto = $_POST['txtp'];
    $correo = $_POST['txtc'];

    $sentencia = $bd->prepare("UPDATE cliente SET  nombre = ?, ap_paterno = ?, ap_materno = ?,num = ?, direccion = ?, producto = ?,correo = ? where sp_id = ?;");
    $resultado = $sentencia->execute([$nombre, $ap_paterno, $ap_materno,$num, $direccion,$producto, $correo, $sp_id]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>