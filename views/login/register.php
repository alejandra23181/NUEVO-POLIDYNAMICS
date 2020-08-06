<?php
// Include config file
require_once 'C:\xampp\htdocs\polidynamics\database\db.php';
 
// Define variables and initialize with empty values
$ID_USUARIO = $PRIMER_NOMBRE_USUARIO = $PRIMER_APELLIDO_USUARIO = $EMAIL = $TIPO_DOCUMENTO = $GENERO = $PERFIL = $username = $password = $confirm_password = "";
$ID_USUARIO_err = $PRIMER_NOMBRE_USUARIO_err =  $PRIMER_APELLIDO_USUARIO_err  = $EMAIL_err = $TIPO_DOCUMENTO_err = $GENERO_err = $PERFIL_err = $username_err = $password_err = $confirm_password_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate password
    if(empty(trim($_POST["ID_USUARIO"]))){
        $ID_USUARIO_err = "Por favor ingresa tú documento de identidad.";     
    } elseif(strlen(trim($_POST["ID_USUARIO"])) < 9){
        $ID_USUARIO_err = "El documento debe contar con más de 9 caracteres.";
    } else{
        $ID_USUARIO = trim($_POST["ID_USUARIO"]);
    }

    // Validate password
    if(empty(trim($_POST["PRIMER_NOMBRE_USUARIO"]))){
        $PRIMER_NOMBRE_USUARIO_err = "Por favor ingresa tú nombre de identidad.";     
    } elseif(strlen(trim($_POST["PRIMER_NOMBRE_USUARIO"])) < 3){
        $PRIMER_NOMBRE_USUARIO_err = "El nombre debe contar con más de 3 caracteres.";
    } else{
        $PRIMER_NOMBRE_USUARIO = trim($_POST["PRIMER_NOMBRE_USUARIO"]);
    }

    // Validate password
    if(empty(trim($_POST["PRIMER_APELLIDO_USUARIO"]))){
        $PRIMER_APELLIDO_USUARIO_err = "Por favor ingresa tú apellido de identidad.";     
    } elseif(strlen(trim($_POST["PRIMER_APELLIDO_USUARIO"])) < 3){
        $PRIMER_APELLIDO_USUARIO_err = "El apellido debe contar con más de 3 caracteres.";
    } else{
        $PRIMER_APELLIDO_USUARIO = trim($_POST["PRIMER_APELLIDO_USUARIO"]);
    }

  
    // Validate password
    if(empty(trim($_POST["EMAIL"]))){
        $EMAIL_err = "Por favor ingresa tú email de identidad.";     
    } elseif(strlen(trim($_POST["EMAIL"])) < 10){
        $EMAIL_err = "El email debe contar con más de 10 caracteres.";
    } else{
        $EMAIL = trim($_POST["EMAIL"]);
    }

      // Validate password
      if(empty(trim($_POST["TIPO_DOCUMENTO"]))){
        $TIPO_DOCUMENTO_err = "Por favor ingresa tú email de identidad.";     
    } elseif(strlen(trim($_POST["TIPO_DOCUMENTO"])) < 0){
        $TIPO_DOCUMENTO_err = "El email debe contar con más de 10 caracteres.";
    } else{
        $TIPO_DOCUMENTO = trim($_POST["TIPO_DOCUMENTO"]);
    }

      // Validate password
      if(empty(trim($_POST["GENERO"]))){
        $GENERO_err = "Por favor ingresa tú email de identidad.";     
    } elseif(strlen(trim($_POST["GENERO"])) < 0){
        $GENERO_err = "El email debe contar con más de 10 caracteres.";
    } else{
        $GENERO = trim($_POST["GENERO"]);
    }

    // Validate password
    if(empty(trim($_POST["PERFIL"]))){
        $PERFIL_err = "Por favor ingresa tú email de identidad.";     
    } elseif(strlen(trim($_POST["PERFIL"])) < 0){
        $PERFIL_err = "El email debe contar con más de 10 caracteres.";
    } else{
        $PERFIL = trim($_POST["PERFIL"]);
    }


    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese un usuario.";
    } else{
        // Prepare a select statement
        $sql = "SELECT ID_USUARIO FROM usuario WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Este usuario ya fue tomado.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Al parecer algo salió mal.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingresa una contraseña.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "La contraseña al menos debe tener 6 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Confirma tu contraseña.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "No coincide la contraseña.";
        }
    }
    
    // Check input errors before inserting in database
    if( empty($ID_USUARIO_err) && empty($PRIMER_NOMBRE_USUARIO_err) && empty($PRIMER_APELLIDO_USUARIO_err)  && empty($EMAIL_err) &&
    empty($TIPO_DOCUMENTO_err) && empty($GENERO_err) && empty($PERFIL_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO usuario (ID_USUARIO, PRIMER_NOMBRE_USUARIO  ,PRIMER_APELLIDO_USUARIO 
         ,EMAIL ,TIPO_DOCUMENTO ,GENERO ,PERFIL ,username ,password) VALUES (?,?, ?,?,?, ?,?,?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_id,$param_primern, $param_primera,  
             $param_email, $param_tipo,$param_genero, $param_perfil,$param_username, $param_password);
            
            // Set parameters
            $param_id = $ID_USUARIO;
            $param_primern = $PRIMER_NOMBRE_USUARIO;
            $param_primera = $PRIMER_APELLIDO_USUARIO;
            $param_email = $EMAIL;
            $param_tipo = $TIPO_DOCUMENTO;
            $param_genero = $GENERO;
            $param_perfil = $PERFIL;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: Login.php");
            } else{
                echo "Algo salió mal, por favor inténtalo de nuevo.";
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
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Registro</h2>
        <p>Por favor complete este formulario para crear una cuenta.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($ID_USUARIO_err)) ? 'has-error' : ''; ?>">
                <label>Identificación</label>
                <input type="text" name="ID_USUARIO" class="form-control" value="<?php echo $ID_USUARIO; ?>">
                <span class="help-block"><?php echo $ID_USUARIO_err; ?></span>
            </div> 

            <div class="form-group <?php echo (!empty($PRIMER_NOMBRE_USUARIO_err)) ? 'has-error' : ''; ?>">
                <label>Primer nombre:</label>
                <input type="text" name="PRIMER_NOMBRE_USUARIO" class="form-control" value="<?php echo $PRIMER_NOMBRE_USUARIO; ?>">
                <span class="help-block"><?php echo $PRIMER_NOMBRE_USUARIO_err; ?></span>
            </div>  

            <div class="form-group <?php echo (!empty($PRIMER_APELLIDO_USUARIO_err)) ? 'has-error' : ''; ?>">
                <label>Primer apellido:</label>
                <input type="text" name="PRIMER_APELLIDO_USUARIO" class="form-control" value="<?php echo $PRIMER_APELLIDO_USUARIO; ?>">
                <span class="help-block"><?php echo $PRIMER_APELLIDO_USUARIO_err; ?></span>
            </div>  

  
            <div class="form-group <?php echo (!empty($TIPO_DOCUMENTO_err)) ? 'has-error' : ''; ?>">
            <label>Tipo documento:</label>
            <?php
                    $query=mysqli_query($link, "select ID_TIPO_DOCUMENTO, DESCRIPCION from TIPO_DOCUMENTO");
                    ?>
                    <select name="TIPO_DOCUMENTO">
                    <option value="0">Seleccionar tipo de documento</option>
				<?php while($row = $query->fetch_assoc()) { ?>
					<option value="<?php echo $row['ID_TIPO_DOCUMENTO']; ?>"><?php echo $row['DESCRIPCION']; ?></option>
				<?php } ?>        
                    </select>
                    <span class="help-block"><?php echo $TIPO_DOCUMENTO_err; ?></span>
             
            </div>  

            <div class="form-group <?php echo (!empty($GENERO_err)) ? 'has-error' : ''; ?>">
                <label>Genero:</label>
                <?php
                    $query=mysqli_query($link, "select ID_GENERO, DESCRIPCION from GENERO");
                    ?>
                    <select name="GENERO">
                    <option value="0">Seleccionar genero</option>
				<?php while($row = $query->fetch_assoc()) { ?>
					<option value="<?php echo $row['ID_GENERO']; ?>"><?php echo $row['DESCRIPCION']; ?></option>
				<?php } ?>        
                    </select>
                <span class="help-block"><?php echo $GENERO_err; ?></span>
            </div>  

            <div class="form-group <?php echo (!empty($PERFIL_err)) ? 'has-error' : ''; ?>">
                <label>Perfil:</label>
                <?php
                    $query=mysqli_query($link, "select ID_PERFIL, DESCRIPCION from PERFIL_USUARIO");
                    ?>
                    <select name="PERFIL">
                    <option value="0">Seleccionar perfil</option>
				<?php while($row = $query->fetch_assoc()) { ?>
					<option value="<?php echo $row['ID_PERFIL']; ?>"><?php echo $row['DESCRIPCION']; ?></option>
				<?php } ?>     
                    </select>
                <span class="help-block"><?php echo $PERFIL_err; ?></span>
            </div>  

            <div class="form-group <?php echo (!empty($EMAIL_err)) ? 'has-error' : ''; ?>">
                <label>Email:</label>
                <input type="email" name="EMAIL" class="form-control" value="<?php echo $EMAIL; ?>">
                <span class="help-block"><?php echo $EMAIL_err; ?></span>
            </div>  

            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Usuario:</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña:</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirmar Contraseña:</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ingresar">
                <input type="reset" class="btn btn-default" value="Borrar">
            </div>
            <p>¿Ya tienes una cuenta? <a href="login.php">Ingresa aquí</a>.</p>
        </form>
    </div>    
</body>
</html>