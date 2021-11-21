<?php
include "includes/header.php";
include "../conexion.php";


// Mostrar Datos

if (empty($_REQUEST['id'])) {
  header("Location: lista_usuarios.php");
}
$idusuario = $_GET['id'];
$sql = "SELECT * FROM usuario WHERE idusuario = '$idusuario' ";
$resultado = mysqli_query($conexion, $sql );
/*$result_sql = mysqli_num_rows($sql);*/
if (0) {
  header("Location: lista_usuarios.php");
} else {
 
 $data = mysqli_fetch_row($resultado); 
  
    $idcliente = $data[0];
    $nombre = $data[1];
    $correo = $data[2];
    $usuario = $data[3];
    $rol = $data[5];
    $imagen = $data[6];

    
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-lg-6 m-auto">
      <form class="" action="prueba.php" method="post" enctype="multipart/form-data">
        <?php echo isset($alert) ? $alert : ''; ?>
        <input type="hidden" name="id" value="<?php echo $idcliente; ?>">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" placeholder="Ingrese nombre" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre; ?>">

        </div>
        <div class="form-group">
          <label for="correo">Correo</label>
          <input type="text" placeholder="Ingrese correo" class="form-control" name="correo" id="correo" value="<?php echo $correo; ?>">

        </div>
        <div class="form-group">
          <label for="usuario">Usuario</label>
          <input type="text" placeholder="Ingrese usuario" class="form-control" name="usuario" id="usuario" value="<?php echo $usuario; ?>">
        </div>

        <div class="form-group">
          <label for="ima">Imagen</label>
          <input type="file" class="form-control" name="ima" id="ima">
          <div><img src="data:img/jpg;base64,<?php echo base64_encode($imagen);?>"></div>

        </div>
        <div class="form-group">
          <label for="rol">Rol</label>
          <select name="rol" id="rol" class="form-control">
            <option value="1" <?php
                              if ($rol == 1) {
                                echo "selected";
                              }
                              ?>>Administrador</option>
            <option value="4" <?php
                              if ($rol == 4) {
                                echo "selected";
                              }
                              ?>>Supervisor</option>
            <option value="2" <?php
                              if ($rol == 2) {
                                echo "selected";
                              }
                              ?>>Vendedor</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Editar Usuario</button>
      </form>
    </div>
  </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>