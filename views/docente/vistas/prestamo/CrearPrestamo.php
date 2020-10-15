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
    $Query = "SELECT *
    FROM PRESTAMO PR
    INNER JOIN USUARIO US ON PR.USUARIO = US.ID_USUARIO
    INNER JOIN AULA AU ON PR.AULA = AU.ID_AULA
    INNER JOIN SOLICITUD SO ON PR.SOLICITUD = SO.ID_SOLICITUD WHERE username = '".$_SESSION['username']."'";
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
    <li class="active"><a href="#"> Home</a></li>
    <li ><a href="/PoliDynamics/views/docente/Index.php"> Home</a></li>
      <li class="active"><a href="ListarSolicitudes.php"> Gestión de solicitudes</a></li>
      <li ><a href="../ListarTareas.php"> Seguimiento de solicitudes</a></li>
      <li><a href="../ListarPrestamos.php"> Gestión de prestamos</a></li>
      <li><a href="../ListarDisponibilidad.php"> Disponibilidad</a></li>
      <li><a href="../ListarAuditoria.php"> Auditoria</a></li>
      <li><a href="../ListarReportes.php"> Reportes</a></li>
      <li><a href="../ManualUsuario.php"> Manual de usuario</a></li>     
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

  <h1>CREACIÓN DE PRESTAMOS</h1>
  <br>

  <form method = "POST" action = "metodos/MetodoInsertar.php">
        <div class="form-group">
            <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Fecha prestamo:</label><br>   
                        <input type="date" name="fecha_prestamo"  class="form-control" value="<?php echo date("Y-m-d");?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Fecha esperada prestamo:</label><br>   
                        <input type="date" name="fecha_esperada"  class="form-control" value="<?php echo date("Y-m-d");?>" required>
                    </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                    <div class="col-md-6 mb-3">
                    <label>Hora inicio:</label><br>   
                    <input type="time" class="form-control" name="hora_inicio" required>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label>Hora fin:</label><br>   
                    <input type="time" class="form-control" name="hora_fin" required>
                    </div>
                    <input  type="hidden" name="usuario" value="<?php echo htmlspecialchars($_SESSION["id"]); ?>">
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                    <div class="col-md-6 mb-3">
                    <label>Aula:</label><br>
                    <select name="aula" class="form-control">
                        <option value="0">Seleccione una de las opciones:</option>
                        <?php 
                            $Query = "SELECT ID_AULA, NUMERO_AULA FROM AULA";
                            $Resultado = mysqli_query($link, $Query);
                            while($Filas = $Resultado->fetch_assoc()){
                                echo '<option value="'.$Filas[ID_AULA].'">'.$Filas[NUMERO_AULA].'</option>';   
                            }
                        ?>
                    </select>
                    </div>
                    <div class="col-md-6 mb-3">
                    <label>Solicitud:</label><br>
                    <select name="solicitud" class="form-control">
                        <option value="0">Seleccione una de las opciones:</option>
                        <?php 
                            $Query = "SELECT ID_SOLICITUD, DESCRIPCION FROM SOLICITUD";
                            $Resultado = mysqli_query($link, $Query);
                            while($Filas = $Resultado->fetch_assoc()){
                                echo '<option value="'.$Filas[ID_SOLICITUD].'">'.$Filas[DESCRIPCION].'</option>';   
                            }
                        ?>
                    </select>
                    </div>
            </div>
        </div>
        <br>
        <button class="btn btn-primary" type="submit"><strong> Crear prestamo</strong></button>
    </form>
  </section>
</body>
</html>