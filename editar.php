<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['sp_id'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $sp_id = $_GET['sp_id'];

    $sentencia = $bd->prepare("select * from cliente where sp_id = ?;");
    $sentencia->execute([$sp_id]);
    $cliente = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($cliente);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $cliente->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido Paterno: </label>
                        <input type="text" class="form-control" name="txta" required 
                        value="<?php echo $cliente->ap_paterno; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido Materno: </label>
                        <input type="text" class="form-control" name="txtam" required 
                        value="<?php echo $cliente->ap_materno; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Numero Telefonico: </label>
                        <input type="text" class="form-control" name="txtt" autofocus required
                        value="<?php echo $cliente->num; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Direccion: </label>
                        <input type="text" class="form-control" name="txtd" autofocus required
                        value="<?php echo $cliente->direccion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Producto: </label>
                        <input type="text" class="form-control" name="txtp" required 
                        value="<?php echo $cliente->producto; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo Electronico: </label>
                        <input type="text" class="form-control" name="txtc" required 
                        value="<?php echo $cliente->correo; ?>">
                    </div>

                    <div class="d-grid">
                        <input type="hidden" name="sp_id" value="<?php echo $cliente->sp_id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php include 'template/footer.php' ?>