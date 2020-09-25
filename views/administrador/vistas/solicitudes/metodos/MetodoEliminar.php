<?php
    include('C:\xampp\htdocs\polidynamics\database\db.php');
    $id = $_GET['ID_SOLICITUD'];

    $Query = "DELETE FROM SOLICITUD WHERE ID_SOLICITUD = '".$id."'";
    mysqli_query($link, $Query);  
    header('location: ../ListarSolicitudes.php');
?>