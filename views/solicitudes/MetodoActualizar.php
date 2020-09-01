<?php
    include('C:\xampp\htdocs\polidynamics\database\db.php');

    $id = $_GET['idsolicitud'];
    $descripcion = $_GET['descripcion'];
    $fecha =  $_GET['fecha'];
    $hora =  $_GET['hora'];
    $categoria =  $_GET['categoria'];
    $aula =  $_GET['aula'];
    $estado =  $_GET['estado'];

    if($descripcion!=null|| $fecha!=null|| $hora!=null|| $categoria!=null|| $aula!=null|| $estado!=null){
        $Query = "UPDATE SOLICITUD SET ID_SOLICITUD= '".$id."', DESCRIPCION = '".$descripcion."', FECHA_CREACION = '".$fecha."',
        HORA = '".$hora."', CATEGORIA = '".$categoria."', AULA = '".$aula."', ESTADO = '".$estado."' WHERE ID_SOLICITUD= '".$id."'";

        mysqli_query($link, $Query); 
        header('location: ListarSolicitud.php');
    }
?>