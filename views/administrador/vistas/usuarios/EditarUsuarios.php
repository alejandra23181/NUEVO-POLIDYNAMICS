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
    $ID_USUARIO = $_GET['ID_USUARIO'];
    $QuerySQL = "SELECT * FROM USUARIO US
	INNER JOIN GENERO GE ON US.GENERO = GE.ID_GENERO
    INNER JOIN TIPO_DOCUMENTO TI ON US.TIPO_DOCUMENTO = TI.ID_TIPO_DOCUMENTO
    INNER JOIN PERFIL_USUARIO PE ON US.PERFIL = PE.ID_PERFIL WHERE ID_USUARIO = '".$ID_USUARIO."'";
    
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
      <li ><a href="\PoliDynamics\views\administrador\Index.php"> Home</a></li>
      <li><a href="\PoliDynamics\views\administrador\vistas\tareas\ListarTareas.php"> Gestión de tareas</a></li>
      <li><a href="\PoliDynamics\views\administrador\vistas\disponibilidad\ListarDisponibilidad.php"> Gestión de disponibilidad</a></li>
      <li><a href="\PoliDynamics\views\administrador\vistas\prestamo\ListarPrestamos.php"> Administración de prestamos</a></li>
      <li  ><a href="\PoliDynamics\views\administrador\vistas\solicitudes\ListarSolicitudes.php"> Administración de solicitudes</a></li>
      <li class="active"><a href="\PoliDynamics\views\administrador\vistas\usuarios\ListarUsuarios.php"> Administración de usuarios</a></li>
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

  <h1>MODIFICAR USUARIO</h1>

  <form  action = "metodos/MetodoEditar.php">
        <div class="form-group">
        <input  type="hidden" name="ID_USUARIO" value="<?php echo $Filas['ID_USUARIO'] ?>">
            <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Segundo nombre:</label><br>   
                        <input type="text" class="form-control" name="SEGUNDO_NOMBRE_USUARIO" value="<?php echo $Filas['SEGUNDO_NOMBRE_USUARIO'] ?>">   
                    </div>
           
                    <div class="col-md-6 mb-3">
                        <label>Segundo apellido:</label><br>   
                        <input type="text" name="SEGUNDO_APELLIDO_USUARIO"  class="form-control" value="<?php echo $Filas['SEGUNDO_APELLIDO_USUARIO'] ?>">

                        </div>
            </div>

                    </div>
                    <div class="form-group">
            <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Télefono:</label><br>   
                        <input type="text" name="TELEFONO"  class="form-control" value="<?php echo $Filas['TELEFONO'] ?>">

                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Email:</label><br>   
                        <input type="text" name="EMAIL"  class="form-control" value="<?php echo $Filas['EMAIL'] ?>">

                    </div>

</div>
</div>

<div class="form-group">
            <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Nombre usuario:</label><br>   
                        <input type="text" name="username"  class="form-control" value="<?php echo $Filas['username'] ?>">

                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Clave:</label><br>   
                        <input type="text" name="password"  class="form-control" value="<?php echo $Filas['password'] ?>">

                    </div>
            </div>
            </div>
        
        <button class="btn btn-primary" type="submit"><strong> Crear usuario</strong></button>
        
    </form>
    <?php } ?>
  </section>


</body>
</html>