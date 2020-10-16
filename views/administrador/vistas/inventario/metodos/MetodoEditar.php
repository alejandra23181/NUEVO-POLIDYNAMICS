<?php
    include('C:\xampp\htdocs\polidynamics\database\db.php');

    $id = $_GET['idinventario'];
    $referencia = $_GET['referencia'];
    $cantidad =  $_GET['cantidad'];
    $detalle_entrada =  $_GET['detalle_entrada'];

    $Query = "UPDATE INVENTARIO SET REFERENCIA = '".$referencia."', CANTIDAD = '".$cantidad."',
    DETALLE_ENTRADA = '".$detalle_entrada."' WHERE ID_INVENTARIO = '".$id."'";

    mysqli_query($link, $Query); 
    header('location: ../ListarInventario.php');
    
?>