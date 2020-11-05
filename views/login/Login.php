<?php
// Initialize the session
session_start();
 

 
// Include config file
require_once 'C:\xampp\htdocs\polidynamics\database\db.php';
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese su usuario.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese su contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT ID_USUARIO, username, PERFIL ,password FROM usuario WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $perfil,$hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if($password){
                            if($perfil ==1){
                                 // Password is correct, so start a new session
                                 session_start();
                                
                                 // Store data in session variables
                                 $_SESSION["loggedin"] = true;
                                 $_SESSION["id"] = $id;
                                 $_SESSION["perfil"] = $perfil;
                                 $_SESSION["username"] = $username;                            
                                 
                                 // Redirect user to welcome page
                                 header('location: \polidynamics\views\docente\Index.php');
                            }else if($perfil ==2){
                                 // Password is correct, so start a new session
                                 session_start();
                                
                                 // Store data in session variables
                                 $_SESSION["loggedin"] = true;
                                 $_SESSION["id"] = $id;
                                 $_SESSION["perfil"] = $perfil;
                                 $_SESSION["username"] = $username;                            
                                 
                                 // Redirect user to welcome page
                                 header('location: \polidynamics\views\administrador\Index.php');
                            }else{
                                echo "Ha ocurrido un error con tu usuario, por favor verifica";
                            }                     
                            
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "La contraseña que has ingresado no es válida.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No existe cuenta registrada con ese nombre de usuario.";
                }
            } else{
                echo "Algo salió mal, por favor vuelve a intentarlo.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Poli Dynamics </title>
    <meta charset="uft-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width-device-width">
    <meta name="descripcion" content="Diseño y Desarrollo Web">    
    <meta name="Keywords" content="Diseño Web, desarrollo, po,posicionamiento">
    <meta name="author" content="Render2Web">
    <link rel="stylesheet" type="text/css" href="/PoliDynamics/style/estilos.css">

    <link rel="stylesheet" type="text/css" href="/PoliDynamics/style/Login.css">
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

            <h1><span class="resaltado"> Poli </span> Dynamics</h1>
        </div>

        <nav>
            <ul>
                <li><a href="Index.php">Inicio</a></li>
                <li><a href="secciones/nosotros.php">Acerca de nosotros</a></li>
                <li><a href="secciones/servicios.php">Nuestros servicios</a></li>
                <li><a href="secciones/clientes.php">A quien servimos</a></li>
                <li class="actual"><a href="views/login/Login.php">Inicio de sesión</a></li>
            </ul>
        </nav>
        </div>
        <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/">

<!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="../css/blog.css" rel="stylesheet">
    </header>

<body>

    <div class="container">
    <h1 >Inicio de sesión</h1>

        <form  class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Usuario</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ingresar">
            </div>
            <p>¿No tienes una cuenta? <a href="\polidynamics\views\usuarios\RegistroUsuarios.php">Regístrate ahora</a>.</p>
        </form>
    </div>    
</body>
</html>