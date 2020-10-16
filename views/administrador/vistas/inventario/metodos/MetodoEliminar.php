<?php
    include('C:\xampp\htdocs\polidynamics\database\db.php');
    $id_inventario = $_GET['ID_INVENTARIO'];

    $Query = "DELETE FROM INVENTARIO WHERE ID_INVENTARIO = '".$id_inventario."'";
    mysqli_query($link, $Query);  
    header('location: ../ListarInventario.php');
?>