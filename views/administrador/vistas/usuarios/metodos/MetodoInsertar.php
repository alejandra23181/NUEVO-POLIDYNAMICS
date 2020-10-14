<?php

include('C:\xampp\htdocs\polidynamics\database\db.php');

if(isset($_REQUEST['btn_guardar'])){

    

    $PRIMER_NOMBRE_USUARIO=$_POST['PRIMER_NOMBRE_USUARIO'];
    $SEGUNDO_NOMBRE_USUARIO=$_POST['SEGUNDO_NOMBRE_USUARIO'];
    $PRIMER_APELLIDO_USUARIO=$_POST['PRIMER_APELLIDO_USUARIO'];
    $SEGUNDO_APELLIDO_USUARIO=$_POST['SEGUNDO_APELLIDO_USUARIO'];
    $TELEFONO=$_POST['TELEFONO'];
    $EMAIL=$_POST['EMAIL'];
    $TIPO_DOCUMENTO=$_POST['TIPO_DOCUMENTO'];
    $IDENTIFICACION=$_POST['IDENTIFICACION'];
    $GENERO=$_POST['GENERO'];
    $PERFIL=$_POST['PERFIL'];
    $username=$_POST['username'];
    $password=$_POST['password'];

        $PERFIL=$_POST['PERFIL'];
    $sql="INSERT INTO usuario (PRIMER_NOMBRE_USUARIO,SEGUNDO_NOMBRE_USUARIO,PRIMER_APELLIDO_USUARIO,SEGUNDO_APELLIDO_USUARIO,
                                TELEFONO,EMAIL,TIPO_DOCUMENTO,IDENTIFICACION,GENERO,PERFIL,username,password) 
                VALUES ('$PRIMER_NOMBRE_USUARIO','$SEGUNDO_NOMBRE_USUARIO','$PRIMER_APELLIDO_USUARIO','$SEGUNDO_APELLIDO_USUARIO',
                        '$TELEFONO','$EMAIL','$TIPO_DOCUMENTO','$IDENTIFICACION','$GENERO',' $PERFIL','$username','$password')";

    $ejecutar=mysqli_query($link, $sql);

    if($ejecutar){
        header("Location: ../ListarUsuarios.php");

    }

}


?>