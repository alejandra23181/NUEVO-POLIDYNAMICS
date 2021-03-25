<?php
 include('C:\xampp\htdocs\polidynamics\database\db.php');   
    $NUMERO_AULA =$_POST['NUMERO_AULA'];
    $BLOQUE =$_POST['BLOQUE'];
    $DISPONIBILIDAD =$_POST['DISPONIBILIDAD'];

    if (isset($NUMERO_AULA) && !empty($BLOQUE) && isset($DISPONIBILIDAD)) {

        if($NUMERO_AULA != null || $BLOQUE != null || $DISPONIBILIDAD != null){
            $QuerySQL = "INSERT INTO AULA (ID_AULA, NUMERO_AULA, BLOQUE, DISPONIBILIDAD)
            VALUES (NULL, '".$NUMERO_AULA."', '".$BLOQUE."', '".$DISPONIBILIDAD."')";


            if (mysqli_query($link,$QuerySQL)){
                header('location: ../ListarDisponibilidad.php');
            }
        }
}
?>