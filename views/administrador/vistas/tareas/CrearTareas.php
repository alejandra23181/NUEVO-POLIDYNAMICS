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
    $Query = "SELECT * FROM tarea TA
    INNER JOIN SOLICITUD SO ON TA.SOLICITUD = SO.ID_SOLICITUD
    INNER JOIN TIPO_TAREA TP ON TA.TIPO_TAREA = TP.ID_TIPO_TAREA 
    INNER JOIN USUARIO US ON SO.USUARIO = US.ID_USUARIO
	  INNER JOIN ESTADO ES ON SO.ESTADO = ES.ID_ESTADO WHERE username = '".$_SESSION['username']."'";
	$Resultado = mysqli_query($link, $Query);
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
      <li ><a href="\PoliDynamics\views\administrador\Index.php"> Home</a></li>
      <li  class="active"><a href="\PoliDynamics\views\administrador\vistas\tareas\ListarTareas.php"> Gestión de tareas</a></li>
      <li><a href="\PoliDynamics\views\administrador\vistas\disponibilidad\ListarDisponibilidad.php"> Gestión de disponibilidad</a></li>
      <li><a href="\PoliDynamics\views\administrador\vistas\prestamo\ListarPrestamos.php"> Administración de prestamos</a></li>
      <li  ><a href="\PoliDynamics\views\administrador\vistas\solicitudes\ListarSolicitudes.php"> Administración de solicitudes</a></li>
      <li><a href="\PoliDynamics\views\administrador\vistas\usuarios\ListarUsuarios.php"> Administración de usuarios</a></li>
      <li><a href="\PoliDynamics\views\administrador\vistas\inventario\ListarInventario.php"> Administración de inventario</a></li>
      <li ><a href="\PoliDynamics\views\administrador\vistas\ListarAuditoria.php"> Auditoria</a></li>
      <li><a href="\PoliDynamics\views\administrador\vistas\ListarReportes.php"> Reportes</a></li>
      <li><a href="\PoliDynamics\views\administrador\vistas\ManualTecnico.php"> Manual de usuario</a></li>     
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

  <h1>CREACIÓN DE TAREAS</h1>
  <br>

  <form method = "POST" action = "metodos/MetodoInsertar.php">
        <div class="form-group">
            <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Detalle de reporte*:</label><br>   
                        <input type="text" class="form-control" name="detalle" required>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label>Recomendaciones*:</label><br>   
                        <input type="textarea" class="form-control" name="recomendaciones" required>
                    </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Fecha inicio*:</label><br>   
                        <input type="localdate" name="fechainicio"  class="form-control" value="<?php echo date("Y-m-d");?>" readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Hora inicio*:</label><br>   
                        <input type="time" max="22:00:00" min="06:00:00"  name="horainicio"  class="form-control" required>
                    </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Hora fin*:</label><br>   
                    <input type="time" name="horafin"  max="22:00:00" min="06:00:00"  class="form-control" required>
                </div>

            <div class="col-md-6 mb-3">
                <label>Solicitud*:</label><br>
                <select name="solicitud" class="form-control">
                <option value="0">Seleccione una de las opciones:</option>

                    <?php 
                        $Query = "SELECT ID_SOLICITUD, DESCRIPCION FROM SOLICITUD WHERE ESTADO=1";
                        $Resultado = mysqli_query($link, $Query);
                        while($Filas = $Resultado->fetch_assoc()){
                            echo '<option value="'.$Filas['ID_SOLICITUD'].'">'.$Filas['ID_SOLICITUD'].'-'.$Filas['DESCRIPCION'].'</option>';   
                        }
                    ?>
                </select>
                <br>
                </div>
                
        </div>


        <div class="form-group">
            <div class="row">
                <div class="col-md-6 mb-3" style="margin-left: -166px;width: 504px;">
                    <label>Tipo de tarea*:</label><br>    
                    <select name="tipotarea" class="form-control">
                    <option value="0">Seleccione una de las opciones:</option>
                    <option value="1">Servicio aplicaciones</option>
                    <option value="2">Servicio pc</option>
                    <option value="3">Servicio redes</option>
                </select>
                </div>


                </select>
                </div>


                </select>
                </div>

                          
        </div>
        <br>

        

        <button class="btn btn-primary" style="margin-left: 510px;margin-top: 10px;" type="submit"><strong> Crear tarea</strong></button>


    </form>
      
  </section>


</body>
</html>