<?php
    include('C:\xampp\htdocs\polidynamics\database\db.php');    

 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

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

            $usuario1 = mysqli_query($link,"SELECT * FROM USUARIO WHERE username = '".$usuario."'");

            while ($registro = $usuario1->fetch_assoc())
            {
                $usuario2 = $registro['ID_USUARIO'];
            }
            $QuerySQL = "INSERT INTO SOLICITUD (ID_SOLICITUD, DESCRIPCION, FECHA_CREACION, HORA, USUARIO, CATEGORIA, AULA, ESTADO)
            VALUES (NULL, '".$descripcion."', '".$fecha."', '".$hora."', '".$usuario2."', '".$categoria."', '".$aula."', '".$estado."')";

            if (mysqli_query($link,$QuerySQL)){
                header('location: ../ListarSolicitudes.php');
                mysqli_query($link,"INSERT INTO AUDITORIA (USUARIO, FECHA, TABLA, OPERACION, DESCRIPCION)
                VALUES ('".$usuario2."', NOW(), 'SOLICITUDES', 'INSERTAR', 'SE REALIZO LA INSERCIÓN DE UNA SOLICITUD' )");
                } else {
                   echo '1';
                }

        }else{
            echo '2';
        }
    }else{
        echo '3';
    }

?>