<?php

include('C:\xampp\htdocs\polidynamics\database\db.php'); 

$ID_USUARIO = $_GET['ID_USUARIO'];
$SEGUNDO_NOMBRE_USUARIO = $_GET['SEGUNDO_NOMBRE_USUARIO'];
$SEGUNDO_APELLIDO_USUARIO =  $_GET['SEGUNDO_APELLIDO_USUARIO'];
$TELEFONO =  $_GET['TELEFONO'];
$EMAIL =  $_GET['EMAIL'];
$username =  $_GET['username'];
$password =  $_GET['password'];

$Query = "UPDATE USUARIO SET  SEGUNDO_NOMBRE_USUARIO = '".$SEGUNDO_NOMBRE_USUARIO."', SEGUNDO_APELLIDO_USUARIO = '".$SEGUNDO_APELLIDO_USUARIO."',
    TELEFONO = '".$TELEFONO."', EMAIL = '".$EMAIL."',username = '".$username."', password = '".$password."' WHERE ID_USUARIO= '".$ID_USUARIO."'";

mysqli_query($link, $Query); 
header("Location: ../ListarUsuarios.php");

?>