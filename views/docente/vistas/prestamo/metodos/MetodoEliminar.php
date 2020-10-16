<?php
    include('C:\xampp\htdocs\polidynamics\database\db.php');
    $id = $_GET['ID_PRESTAMO'];

    $Query = "DELETE FROM PRESTAMO WHERE ID_PRESTAMO = '".$id."'";
    mysqli_query($link, $Query);  
    header('location: ../ListarPrestamos.php');
?>