<?php
 include('C:\xampp\htdocs\polidynamics\database\db.php');   

 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $id_aula = $_GET['ID_AULA'];

    $Query = "DELETE FROM AULA WHERE ID_AULA = '".$id_aula."'";
    mysqli_query($link, $Query);  
    header('location: ../ListarDisponibilidad.php');
?>