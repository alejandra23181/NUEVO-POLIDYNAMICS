<?php
    include('C:\xampp\htdocs\polidynamics\database\db.php');

    $id = $_GET['ID_AULA'];
    $DISPONIBILIDAD = $_GET['DISPONIBILIDAD'];
    

    $Query = "UPDATE polidynamics.aula SET DISPONIBILIDAD = '".$DISPONIBILIDAD."' WHERE aula.ID_AULA = '".$id."'";

    mysqli_query($link, $Query); 
    header('location: ../ListarDisponibilidad.php');
    
?>