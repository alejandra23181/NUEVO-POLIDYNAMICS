<?php
    include('C:\xampp\htdocs\polidynamics\database\db.php');

    $id = $_GET['ID_TAREA'];   
    $detalle =$_POST['detalle'];
    $recomendaciones =$_POST['recomendaciones'];
    $fechainicio =$_POST['fechainicio'];
    $horainicio =$_POST['horainicio'];
    $horafin =$_POST['horafin'];
    $solicitud =$_POST['solicitud'];
    $tipotarea =$_POST['tipotarea'];

    $Query = "UPDATE TAREA SET  detalle = '".$detalle."', recomendacion = '".$recomendaciones."',
    fecha_inicio = '".$fechainicio."', hora_inicio = '".$horainicio."', hora_final = '".$horafin."'
    , tipo_tarea = '".$tipotarea."' WHERE ID_TAREA= '".$id."'";

    mysqli_query($link, $Query); 
    header('location: ../ListarTareas.php');
    
?>