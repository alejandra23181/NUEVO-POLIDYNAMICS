<?php
    include('C:\xampp\htdocs\PoliDynamics\database\db.php');

    $referencia =$_POST['referencia'];
    $cantidad =$_POST['cantidad'];
    $detalle_entrada =$_POST['detalle_entrada'];

    if (isset($referencia) && !empty($cantidad) && isset($detalle_entrada)) {

        if($referencia != null || $cantidad != null || $detalle_entrada != null){
            $QuerySQL = "INSERT INTO inventario (ID_INVENTARIO, REFERENCIA, CANTIDAD, DETALLE_ENTRADA)
            VALUES (NULL, '".$referencia."', '".$cantidad."', '".$detalle_entrada."')";

            if (mysqli_query($link,$QuerySQL)){
                header('location: ../ListarInventario.php');
                mysqli_query($link,"INSERT INTO AUDITORIA (USUARIO, FECHA, TABLA, OPERACION, DESCRIPCION)
                VALUES ('".$usuario."', NOW(), 'INVENTARIO', 'INSERTAR', 'SE REALIZO LA INSERCIÓN DE UN INVENTARIO' )");
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