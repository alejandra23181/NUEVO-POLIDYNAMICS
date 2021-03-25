<?php
  include('C:\xampp\htdocs\polidynamics\database\db.php'); 
 

    $fecha_prestamo =$_POST['fecha_prestamo'];
    $fecha_esperada =$_POST['fecha_esperada'];
    $hora_inicio =$_POST['hora_inicio'];
    $hora_fin =$_POST['hora_fin'];
    $usuario =$_POST['usuario'];
    $aula =$_POST['aula'];

    if (isset($fecha_prestamo) && !empty($fecha_esperada) && isset($hora_inicio) && !empty($hora_fin)
    && !empty($usuario) && !empty($aula)) {

        if($fecha_prestamo != null || $fecha_esperada != null || $hora_inicio != null || $hora_fin != null ||
        $usuario != null || $aula != null) {
           
            $usuario1 = mysqli_query($link,"SELECT * FROM USUARIO WHERE username = '".$usuario."'");

            while ($registro = $usuario1->fetch_assoc())
            {
                $usuario2 = $registro['ID_USUARIO'];
           
           $QuerySQL = "INSERT INTO PRESTAMO (ID_PRESTAMO, FECHA_PRESTAMO, FECHA_PRESTAMO_ESPERADA, HORA_INICIO, HORA_FIN, USUARIO, AULA)
            VALUES (NULL, '".$fecha_prestamo."', '".$fecha_esperada."', '".$hora_inicio."', '".$hora_fin."', '".$usuario2."', '".$aula."')";

        
}

            if (mysqli_query($link,$QuerySQL)){
                header('location: ../ListarPrestamos.php');
                mysqli_query($link,"INSERT INTO AUDITORIA (USUARIO, FECHA, TABLA, OPERACION, DESCRIPCION)
                VALUES ('".$usuario2."', NOW(), 'PRESTAMO', 'INSERTAR', 'SE REALIZO LA INSERCIÓN DE UN PRESTAMO')");
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