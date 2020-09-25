<?php
    include('C:\xampp\htdocs\polidynamics\database\db.php');
    $id = $_GET['ID_TAREA'];

    $Query = "DELETE FROM TAREA WHERE ID_TAREA = '".$id."'";
    mysqli_query($link, $Query);  
    header('location: ../ListarTareas.php');
?>