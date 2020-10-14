<?php

include('C:\xampp\htdocs\polidynamics\database\db.php');
$ID_USUARIO =$_GET['ID_USUARIO'];
  $sql="DELETE FROM usuario WHERE ID_USUARIO='$ID_USUARIO'";
  $ejecutar=mysqli_query($link, $sql);

  if($ejecutar){
      header("Location:../ListarUsuarios.php");

  }

?>