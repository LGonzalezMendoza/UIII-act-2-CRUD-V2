<?php
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txta"]) ||empty($_POST["txtam"]) ||empty($_POST["txtt"]) ||empty($_POST["txtd"]) ||empty($_POST["txtp"]) ||empty($_POST["txtc"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST['txtNombre'];
    $ap_paterno = $_POST['txta'];
    $ap_materno = $_POST['txtam'];
    $num = $_POST['txtt'];
    $direccion = $_POST['txtd'];
    $producto = $_POST['txtp'];
    $correo = $_POST['txtc'];

    $sentencia = $bd->prepare("INSERT INTO cliente(nombre,ap_paterno,ap_materno,num,direccion,producto,correo) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre, $ap_paterno, $ap_materno,$num, $direccion,$producto, $correo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>