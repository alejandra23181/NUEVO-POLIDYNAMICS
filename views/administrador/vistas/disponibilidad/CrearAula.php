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
    FROM AULA AU
    INNER JOIN DISPONIBILIDAD DI ON AU.DISPONIBILIDAD = I.ID_SISPONIBILIDAD
    WHERE username = '".$_SESSION['username']."'";
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
      <li ><a href="\PoliDynamics\views\administrador\Index.php"> Inicio</a></li>
      <li  ><a href="\PoliDynamics\views\administrador\vistas\tareas\ListarTareas.php"> Gestión de tareas</a></li>
      <li class="active"><a href="\PoliDynamics\views\administrador\vistas\disponibilidad\ListarDisponibilidad.php"> Gestión de disponibilidad</a></li>
      <li><a href="\PoliDynamics\views\administrador\vistas\prestamo\ListarPrestamos.php"> Administración de préstamos</a></li>
      <li  ><a href="\PoliDynamics\views\administrador\vistas\solicitudes\ListarSolicitudes.php"> Administración de solicitudes</a></li>
      <li><a href="\PoliDynamics\views\administrador\vistas\usuarios\ListarUsuarios.php"> Administración de usuarios</a></li>
      <li  ><a href="\PoliDynamics\views\administrador\vistas\inventario\ListarInventario.php"> Administración de inventario</a></li>
      <li ><a href="\PoliDynamics\views\administrador\vistas\ListarAuditoria.php"> Auditoría</a></li>
      <li><a href="\PoliDynamics\views\administrador\vistas\ListarReportes.php"> Reportes</a></li>
      <li><a href="\PoliDynamics\views\administrador\vistas\ManualTecnico.php"> Manual de usuario</a></li>     
      <li><a href="\PoliDynamics\Index.php"> Cerrar sesión</a></li>
      
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

  <h1>CREACIÓN DE AULAS</h1>
  <br>

  <form method = "POST" action = "metodos/MetodoInsertar.php">
        <div class="form-group">
            <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Número aula*:</label><br>   
                        <input type="text" class="form-control" name="NUMERO_AULA" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Bloque*:</label><br>   
                        <input type="number" class="form-control" name="BLOQUE" required>
                    </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">

            
                    <div class="col-md-6 mb-3" >
                        <label>Disponibilidad*:</label><br>   
                        <select name="DISPONIBILIDAD" class="form-control">
                    <?php 
                        $Query = "SELECT * FROM DISPONIBILIDAD";
                        $Resultado = mysqli_query($link, $Query);
                        while($Filas = $Resultado->fetch_assoc()){
                            echo '<option value="'.$Filas["ID_DISPONIBILIDAD"].'">'.$Filas["ID_DISPONIBILIDAD"].'-'.$Filas["DESCRIPCION"].'</option>';   
                        }
                    ?>
                </select>
                <br>
                </div>
            </div>
        </div>

        <br>

        <button class="btn btn-primary" type="submit"><strong>Crear aula</strong></button>

    </form>
      
  </section>

</body>

</html>