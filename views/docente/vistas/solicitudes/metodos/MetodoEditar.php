<?php
    include('C:\xampp\htdocs\polidynamics\database\db.php');

    $id = $_GET['idsolicitud'];
    $descripcion = $_GET['descripcion'];
    $fecha =  $_GET['fecha'];
    $hora =  $_GET['hora'];
    $categoria =  $_GET['categoria'];
    $aula =  $_GET['aula'];
    $estado =  $_GET['estado'];

    $Query = "UPDATE SOLICITUD SET  DESCRIPCION = '".$descripcion."', FECHA_CREACION = '".$fecha."',
    HORA = '".$hora."', AULA = '".$aula."' WHERE ID_SOLICITUD= '".$id."'";

    mysqli_query($link, $Query); 
    header('location: ../ListarSolicitudes.php');
    
?>