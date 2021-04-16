<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PoliDynamics</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="icon" href="/PoliDynamics/style/image/IconoPoli.png" />
    <link rel="stylesheet" href="/PoliDynamics/views/administrador/style/General.css" type="text/css" >
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
      <li><a href="\PoliDynamics\views\administrador\vistas\solicitudes\ListarSolicitudes.php"> Administración de solicitudes</a></li>
      <li><a href="\PoliDynamics\views\administrador\vistas\usuarios\ListarUsuarios.php"> Administración de usuarios</a></li>
      <li><a href="\PoliDynamics\views\administrador\vistas\inventario\ListarInventario.php"> Administración de inventario</a></li>
      <li ><a href="\PoliDynamics\views\administrador\vistas\ListarAuditoria.php"> Auditoria</a></li>
      <li class="active"><a href="\PoliDynamics\views\administrador\vistas\ListarReportes.php"> Reportes</a></li>
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

  <h1>REPORTES Y ESTADÍSTICAS</h1>
  <br>
	<table class="table table-bordered">
		<thead>
			<tr>
        <th scope="col">Nombre del reporte</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="text-align: center;">Solicitudes realizadas en vida útil de la plataforma semestralmente</td>
				<td style="width: 10px;"><a href="\PoliDynamics\files\reportes-admin\Reporte-1.php"><button type="button" class="btn btn-danger">PDF</button></td>
      </tr>
      
      <tr>
				<td style="text-align: center;">Solucitudes reportadas y solucionadas semestralmente</td>
				<td style="width: 10px;"><a href="\PoliDynamics\files\reportes-admin\Reporte-2.php"><button type="button" class="btn btn-danger">PDF</button></td>
      </tr>
      
      <tr>
				<td style="text-align: center;">Solucitudes reportadas por sala semestralmente</td>
				<td style="width: 10px;"><a href="\PoliDynamics\files\reportes-admin\Reporte-3.php"><button type="button" class="btn btn-danger">PDF</button></td>
      </tr>

      <tr>
				<td style="text-align: center;">Reporte de daños de equipos semestralmente</td>
				<td style="width: 10px;"><a href="\PoliDynamics\files\reportes-admin\Reporte-4.php"><button type="button" class="btn btn-danger">PDF</button></td>
      </tr>

      <tr>
				<td style="text-align: center;">Movientos realizados en vida útil de la plataforma semestralmente</td>
				<td style="width: 10px;"><a href="\PoliDynamics\files\reportes-admin\Reporte-5.php"><button type="button" class="btn btn-danger">PDF</button></td>
      </tr>
      
		</tbody>
	</table>
  
      
  </section>


</body>
</html>