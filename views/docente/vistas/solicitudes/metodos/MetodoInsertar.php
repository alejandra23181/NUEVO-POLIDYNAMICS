<?php
    include('C:\xampp\htdocs\PoliDynamics\database\db.php');

    $descripcion =$_POST['descripcion'];
    $fecha =$_POST['fecha'];
    $hora =$_POST['hora'];
    $usuario =$_POST['usuario'];
    $categoria =$_POST['categoria'];
    $aula =$_POST['aula'];
    $estado =$_POST['estado'];

    if (isset($descripcion) && !empty($fecha) && isset($hora) && !empty($usuario)
    && !empty($categoria) && !empty($aula) && !empty($estado)) {

        if($descripcion != null || $fecha != null || $hora != null || $usuario != null ||
        $categoria != null || $aula != null || $estado != null ){
            $QuerySQL = "INSERT INTO solicitud (ID_SOLICITUD, DESCRIPCION, FECHA_CREACION, HORA, USUARIO, CATEGORIA, AULA, ESTADO)
            VALUES (NULL, '".$descripcion."', '".$fecha."', '".$hora."', '".$usuario."', '".$categoria."', '".$aula."', '".$estado."')";

            if (mysqli_query($link,$QuerySQL)){
                header('location: ../ListarSolicitudes.php');
                mysqli_query($link,"INSERT INTO AUDITORIA (USUARIO, FECHA, TABLA, OPERACION, DESCRIPCION)
                VALUES ('".$usuario."', NOW(), 'SOLICITUDES', 'INSERTAR', 'SE REALIZO LA INSERCIÓN DE UNA SOLICITUD' )");
                } else {
                    header('location: ../Error.php');
                }

        }else{
            header('location: ../Error.php');
        }
    }else{
        header('location: ../Error.php');
    }
?>