<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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

            <h1 style="color: white;font-size: 30px;"><span class="resaltado"> Poli </span> Dynamics</h1>
        </div>

        <nav>
            <ul>
            <li ><a href="\PoliDynamics\Index.php">Inicio</a></li>
                <li><a href="\PoliDynamics\secciones\nosotros.php">Acerca de nosotros</a></li>
                <li><a href="\PoliDynamics\secciones\servicios.php">Nuestros servicios</a></li>
                <li ><a href="\PoliDynamics\secciones\clientes.php">A quién servimos</a></li>
                <li><a href="\PoliDynamics\secciones\disponibilidad.php">Disponibilidad aulas</a></li>
                <li class="actual"><a href="\PoliDynamics\views\login\Login.php">Inicio de sesión</a></li>
            </ul>
        </nav>
        </div>
    </header>


          <h1 style="font-size: 28px;
    margin-top: 100px;
    text-align: center;
    font-family: 'Oswald', sans-serif;
    color: #196F3D;font-weight: bold;">Cambio de clave</h1>
    <div class="container" style="margin-top: -140px;">
        <form class="form-signin" action="CambioClave.php" method="POST">
        <div class="form-group ">
                <label>Email*:</label>
            <input type="text" name="email" value="" placeholder="Email" class="form-control" require/>
            <span class="help-block"></span>
            </div>    
            <div class="form-group ">
                <label>Nueva clave*:</label>
            <input type="password" name="pass" value="" placeholder="Password" class="form-control" require/>
            <span class="help-block"></span>
            </div>
            <div class="form-group">
            <input type="submit" class="btn btn-primary" style="margin-left: 360px;margin-top: 30px;background: #196844;" value="ENVIAR" />
            </div>
        </form>
    </div>

        <?php
        
		try{
			if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pass']) && !empty($_POST['pass'])){
                $pass = $_POST['pass'];
                $mail = $_POST['email'];
                
                define('DB_SERVER', 'localhost');
                define('DB_USERNAME', 'root');
                define('DB_PASSWORD', '');
                define('DB_NAME', 'polidynamics');

                //Conexion con la base
                $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 
                
                $sql = "Update usuario Set password='$pass' where email='$mail'";

                if ($conn->query($sql) === TRUE) {
                    header('location: /PoliDynamics/views/login/Login.php');
                } else {
                    echo "Error modificando: " . $conn->error;
                }
                
            }
            else 
                echo 'Información incompleta';
		}
		catch (Exception $e) {
			echo 'Excepción capturada: ',  $e->getMessage(), "\n";
		}
            
        ?>

<footer>
        <p>Poli Dynamics &copy; Software institucional </p>
    </footer>
    </body>
</html>