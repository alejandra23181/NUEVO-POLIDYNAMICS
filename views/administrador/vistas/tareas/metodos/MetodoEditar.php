<?php
    include('C:\xampp\htdocs\polidynamics\database\db.php');

    $id = $_GET['ID_TAREA'];   
    $detalle =$_GET['detalle'];
    $recomendaciones =$_GET['recomendaciones'];
    $fechainicio =$_GET['fechainicio'];
    $horainicio =$_GET['horainicio'];
    $horafin =$_GET['horafin'];
    $solicitud =$_GET['solicitud'];
    $tipotarea =$_GET['tipotarea'];

    $Query = "UPDATE TAREA SET  detalle = '".$detalle."', recomendacion = '".$recomendaciones."',
    fecha_inicio = '".$fechainicio."', hora_inicio = '".$horainicio."', hora_final = '".$horafin."' WHERE ID_TAREA= '".$id."'";

    mysqli_query($link, $Query); 
    header('location: ../ListarTareas.php');
    
?>