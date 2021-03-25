<?php
 include('C:\xampp\htdocs\polidynamics\database\db.php');   

 
    $id_aula = $_GET['ID_AULA'];

    $Query = "DELETE FROM AULA WHERE ID_AULA = '".$id_aula."'";
    mysqli_query($link, $Query);  
    header('location: ../ListarDisponibilidad.php');
?>