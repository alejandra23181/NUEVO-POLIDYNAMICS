<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Login.php");
    exit;
}
?>

<?php


include('C:\xampp\htdocs\polidynamics\database\db.php');    

    $id = $_GET['ID_SOLICITUD'];              
    $QuerySQL = "SELECT * FROM SOLICITUD SO
	INNER JOIN USUARIO US ON SO.USUARIO = US.ID_USUARIO
	INNER JOIN CATEGORIA CA ON SO.CATEGORIA = CA.ID_CATEGORIA
	INNER JOIN AULA AU ON SO.AULA = AU.ID_AULA
    INNER JOIN ESTADO ES ON SO.ESTADO = ES.ID_ESTADO WHERE ID_SOLICITUD = '".$id."'";
    
    $Resultado = mysqli_query($link, $QuerySQL);
     while($Filas = $Resultado->fetch_assoc()) {	
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PoliDynamics</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="icon" href="/PoliDynamics/style/image/IconoPoli.png" />
    <link rel="stylesheet" href="/PoliDynamics/views/docente/style/CrearSolicitudes.css" type="text/css" >
</head>
<body>

    <section id="sidebar"> 
    <div class="white-label">
    </div> 
  <nav class="menu">
  <div id="sidebar-nav">   
  <ul id="Secciones">
  <li ><a href="/PoliDynamics/views/docente/Index.php"> Home</a></li>
      <li class="active" ><a href="\PoliDynamics\views\docente\vistas\solicitudes\ListarSolicitudes.php"> Gestión de solicitudes</a></li>
      <li ><a href="\PoliDynamics\views\docente\vistas\ListarTareas.php"> Seguimiento de solicitudes</a></li>
      <li ><a href="\PoliDynamics\views\docente\vistas\prestamo\ListarPrestamos.php"> Gestión de prestamos</a></li>
      <li ><a href="\PoliDynamics\views\docente\vistas\ListarDisponibilidad.php"> Disponibilidad</a></li>
      <li ><a href="\PoliDynamics\views\docente\vistas\ListarAuditoria.php"> Auditoria</a></li>
      <li><a href="\PoliDynamics\views\docente\vistas\ManualUsuario.php"> Manual de usuario</a></li>     
      <li><a href="/polidynamics/views/login/Login.php"> Cerrar sesión</a></li>
      
    </ul>
  </div>
</nav>
    </section>

   
    <section id="content">

    <div id="header">
    <div class="header-nav">

      <div class="nav">
        <ul>
          <li class="nav-profile">
            <div class="nav-profile-image">
              <img src="/PoliDynamics/style/image/User.png" alt="profile-img" alt="profile image">
              <div class="nav-profile-name"><?php echo htmlspecialchars($_SESSION["username"]); ?></div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <h1>MODIFICAR SOLICITUD</h1>
  <br>

  <form  action = "metodos/MetodoEditar.php">
        <div class="form-group">
        <input type="hidden" name="idsolicitud" value="<?php echo $Filas['ID_SOLICITUD'] ?>">
            <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Descripcion*:</label><br>   
                        <input type="text" class="form-control" name="descripcion" value="<?php echo $Filas['DESCRIPCION'] ?>" required>   
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Fecha esperada*:</label><br>   
                        <input type="date" name="fecha"  class="form-control" Min="<?php echo date("Y-m-d");?>" value="<?php echo $Filas['FECHA_CREACION'] ?>" required>

                    </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                    <div class="col-md-6 mb-3">
                    <label>Hora esperada*:</label><br>   
                    <input type="time" max="22:00:00" min="06:00:00" step="1" name="hora" class="form-control" value="<?php echo $Filas['HORA'] ?>" required>
                    </div>
                    <input  type="hidden" name="usuario" value="<?php echo $Filas['username'] ?>">

                    
                    <div class="col-md-6 mb-3">

                    <label>Estado*:</label><br>
                    <select name="estado" class="form-control" readonly>
                    <option  disabled selected hidden value="<?php echo $Filas['ID_ESTADO'] ?>"><?php echo $Filas['DESCRIPCION_ESTADO'] ?></option>
                    <?php 
                            $Query = "SELECT ID_ESTADO, DESCRIPCION_ESTADO FROM ESTADO";
                            $Resultado = mysqli_query($link, $Query);
                            while($Filas = $Resultado->fetch_assoc()){
                                echo '<option value="'.$Filas["ID_ESTADO"].'">'.$Filas["DESCRIPCION_ESTADO"].'</option>';   
                            }
                        ?>
                    </select>
            </div>
        </div>
      </div>
    
    <br>
    <button class="btn btn-primary" type="submit"><strong> Actualizar solicitud</strong></button>


    </form>
    <?php } ?>
  </section>


</body>
</html>