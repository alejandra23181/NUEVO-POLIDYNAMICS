<?php
// Initialize the session
session_start();
 


 
// Include config file
require_once 'C:\xampp\htdocs\polidynamics\database\db.php';

if(isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])){
$username = mysqli_real_escape_string($link,$_POST['username']);
    $password = mysqli_real_escape_string($link,$_POST['password']);
 
    $sql = mysqli_query($link,"SELECT ID_USUARIO, username, PERFIL ,password FROM usuario WHERE username='$username' AND password='$password' LIMIT 1");
 
    if(mysqli_num_rows($sql)===1) {
 
       $_SESSION['loggedin']=true; //esta conectado//
       $_SESSION['username']=$username;
       $perm = array();
       while ($registro = $sql->fetch_assoc())
       {
           $perm[] = $registro['PERFIL'];
       }



       if($perm[0]==1){
        session_start();
        $_SESSION['loggedin']=true; //esta conectado//
        $_SESSION['username']=$username;
        header('location: \polidynamics\views\docente\Index.php');
            
       }elseif($perm[0]==2){
        session_start();
        $_SESSION['loggedin']=true; //esta conectado//
        $_SESSION['username']=$username;
        header('location: \polidynamics\views\administrador\Index.php');
       }else{
           echo "pailas";
       }
    }
}

?>
 
<!DOCTYPE html>
<html>
<head>
    
    <title>Poli Dynamics </title>
    <meta charset="uft-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width-device-width">
    <meta name="descripcion" content="Diseño y Desarrollo Web">    
    <meta name="Keywords" content="Diseño Web, desarrollo, po,posicionamiento">
    <meta name="author" content="Render2Web">

    <link rel="stylesheet" type="text/css" href="/PoliDynamics/style/estilos.css">
    <link rel="icon" href="/PoliDynamics/style/image/IconoPoli.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href=/PoliDynamics/style/blog.css" rel="stylesheet">  
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="/PoliDynamics/style/Login.css" rel="stylesheet">  


</head>
<!DOCTYPE html>
<html>
<head>
    
    <title>Poli Dynamics </title>
    <meta charset="uft-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width-device-width">
    <meta name="descripcion" content="Diseño y Desarrollo Web">    
    <meta name="Keywords" content="Diseño Web, desarrollo, po,posicionamiento">
    <meta name="author" content="Render2Web">

    <link rel="stylesheet" type="text/css" href="/PoliDynamics/style/estilos.css">
    <link rel="icon" href="/PoliDynamics/style/image/IconoPoli.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href=/PoliDynamics/style/blog.css" rel="stylesheet">
</head>
<body>
    
    <header>
        <div class="contenedor">
            <div id="marca">

            <h1 style="
    color: white;
"><span class="resaltado"> Poli </span> Dynamics</h1>
        </div>

        <nav>
            <ul>
            <li ><a href="\PoliDynamics\Index.php">Inicio</a></li>
                <li><a href="\PoliDynamics\secciones\nosotros.php">Acerca de nosotros</a></li>
                <li><a href="\PoliDynamics\secciones\servicios.php">Nuestros servicios</a></li>
                <li ><a href="\PoliDynamics\secciones\clientes.php">A quien servimos</a></li>
                <li class="actual"><a href="\PoliDynamics\views\login\Login.php">Inicio de sesión</a></li>
            </ul>
        </nav>
        </div>
    </header>


    <h1 style="font-size: 28px;
    margin-top: 100px;
    text-align: center;
    font-family: 'Oswald', sans-serif;
    color: #196F3D;font-weight: bold;">Inicio de sesión</h1>
    <div class="container" style="margin-top: -140px;">
        <form  class="form-signin" method="post">
            <div class="form-group ">
                <label>Usuario:</label>
                <input type="text" name="username"  class="form-control" >
                <span class="help-block"></span>
            </div>    
            <div class="form-group ">
                <label>Clave:</label>
                <input type="password"   name="password" class="form-control">
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" style="margin-left: 360px;margin-top: 30px;background: #196844;" value="Ingresar">
            </div>
        </form>
    </div>    
</body>
    </body>
</html>