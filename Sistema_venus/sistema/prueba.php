<?php
include "../conexion.php";

$id = $_POST['id'];
$nombre = $_POST['nombre'];
/*$ilustracion = addslashes(file_get_contents($_FILES['ima']['tmp_name']));*/
$rol = $_POST['rol'];


 
 
  if (empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['usuario']) || empty($_POST['rol'])) {
    $alert = '<p class"error">Todo los campos son requeridos</p>';
  } else {
    $idusuario = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $rol = $_POST['rol'];
    /*$ilustracion = addslashes(file_get_contents($_FILES['ima']['tmp_name']));*/
   
	
    


    if ($_FILES['ima']['tmp_name'])
    {
    	$ilustracion = addslashes(file_get_contents($_FILES['ima']['tmp_name']));
      $sql_update = mysqli_query($conexion,"UPDATE usuario SET nombre = '$nombre', correo = '$correo' , usuario = '$usuario', imagen ='$ilustracion',  rol= '$rol' WHERE idusuario = '$idusuario'");
     header("location: lista_usuarios.php");
     

    }else{


       $sql_update = mysqli_query($conexion, "UPDATE usuario SET nombre = '$nombre', correo = '$correo' , usuario = '$usuario',  rol= '$rol' WHERE idusuario = '$idusuario'");
        header("location: lista_usuarios.php");
    }


    
    $alert = '<p>Usuario Actualizado</p>';
  }


?>