<?php
    include('C:\xampp\htdocs\PoliDynamics\database\db.php');

    $detalle =$_POST['detalle'];
    $recomendaciones =$_POST['recomendaciones'];
    $fechainicio =$_POST['fechainicio'];
    $horainicio =$_POST['horainicio'];
    $horafin =$_POST['horafin'];
    $solicitud =$_POST['solicitud'];
    $tipotarea =$_POST['tipotarea'];



    $QuerySQL = "INSERT INTO TAREA (ID_TAREA, DETALLE, RECOMENDACION, FECHA_INICIO,HORA_INICIO,HORA_FINAL,SOLICITUD,TIPO_TAREA) 
    VALUES (NULL, '".$detalle."', '".$recomendaciones."', '".$fechainicio."', '".$horainicio."', '".$horafin."', 
    '".$solicitud."', '".$tipotarea."')";

    if (mysqli_query($link,$QuerySQL)){
        header('location: ../ListarTareas.php');
        
        } else {
            header('location: ../Error.php');
        }

?>