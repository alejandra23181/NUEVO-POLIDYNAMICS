<?php
    include('C:\xampp\htdocs\polidynamics\database\db.php');    

 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    $id = $_GET['idsolicitud'];
    $descripcion = $_GET['descripcion'];
    $fecha =  $_GET['fecha'];
    $hora =  $_GET['hora'];
    $estado =  $_GET['estado'];

    $Query = "UPDATE SOLICITUD SET  DESCRIPCION = '".$descripcion."', FECHA_CREACION = '".$fecha."',
    HORA = '".$hora."', ESTADO = '".$estado."' WHERE ID_SOLICITUD= '".$id."'";

    mysqli_query($link, $Query); 
    header('location: ../ListarSolicitudes.php');
    
?>




