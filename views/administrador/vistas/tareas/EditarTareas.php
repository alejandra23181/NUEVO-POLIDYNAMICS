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
    $id = $_GET['ID_TAREA'];   
    $Query = "SELECT * FROM tarea TA
    INNER JOIN SOLICITUD SO ON TA.SOLICITUD = SO.ID_SOLICITUD
    INNER JOIN TIPO_TAREA TP ON TA.TIPO_TAREA = TP.ID_TIPO_TAREA 
    INNER JOIN USUARIO US ON SO.USUARIO = US.ID_USUARIO
	INNER JOIN ESTADO ES ON SO.ESTADO = ES.ID_ESTADO WHERE username = '".$_SESSION['username']."' AND ID_TAREA = '".$id."'";
    $Resultado = mysqli_query($link, $Query);
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
    <li class="active"><a href="#"> Home</a></li>
      <li><a href="#"> Gestión de tareas</a></li>
      <li><a href="#"> Gestión de prestamos</a></li>
      <li><a href="#"> Gestión de disponibilidad</a></li>
      <li><a href="#"> Administración de prestamos</a></li>
      <li><a href="#"> Administración de solicitudes</a></li>
      <li><a href="#"> Administración de usuarios</a></li>
      <li><a href="#"> Administración de inventario</a></li>
      <li><a href="#"> Auditoria</a></li>
      <li><a href="#"> Reportes</a></li>
      <li><a href="#"> Manual de usuario</a></li>     
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

  <form  action = "metodos/MetodoEditar.php">
        <div class="form-group">
            <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Detalle de reporte:</label><br>   
                        <input type="text" class="form-control" name="detalle" value="<?php echo $Filas['DETALLE'] ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label>Recomendaciones:</label><br>   
                        <input type="textarea" class="form-control" name="recomendaciones" value="<?php echo $Filas['RECOMENDACION'] ?>" required>
                    </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Fecha inicio:</label><br>   
                        <input type="date" name="fechainicio"  class="form-control" value="<?php echo $Filas['FECHA_INICIO'] ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Hora inicio:</label><br>   
                        <input type="time" name="horainicio"  class="form-control" value="<?php echo $Filas['HORA_INICIO'] ?>" required>
                    </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Hora fin:</label><br>   
                    <input type="time" name="horafin"  class="form-control" value="<?php echo $Filas['HORA_FINAL'] ?>"  required>
                </div>

         
                <div class="col-md-6 mb-3">
                    <label>Tipo de tarea:</label><br>   
                    <select name="tipotarea" class="form-control">
                    <option value="<?php echo $Filas['ID_TIPO_TAREA'] ?>" disabled selected hidden><?php echo $Filas['DESCRIPCION_TAREA'] ?></option>
                    <?php 
                        $Query = "SELECT ID_TIPO_TAREA, DESCRIPCION_TAREA FROM TIPO_TAREA";
                        $Resultado = mysqli_query($link, $Query);
                        while($Filas = $Resultado->fetch_assoc()){
                            echo '<option value="'.$Filas[ID_TIPO_TAREA].'">'.$Filas[DESCRIPCION_TAREA].'</option>';   
                        }
                    ?>
                </select>
                </div>

                
        </div>


              

        <button class="btn btn-primary" style="margin-left: 360px;margin-top: 30px;" type="submit"><strong> Actualizar tarea</strong></button>


    </form>
    <?php } ?>
  </section>


</body>
</html>