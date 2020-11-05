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
	FROM SOLICITUD SO
	INNER JOIN USUARIO US ON SO.USUARIO = US.ID_USUARIO
	INNER JOIN CATEGORIA CA ON SO.CATEGORIA = CA.ID_CATEGORIA
	INNER JOIN AULA AU ON SO.AULA = AU.ID_AULA
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
    <link rel="stylesheet" href="/PoliDynamics/views/docente/style/General.css" type="text/css" >
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
      <li  class="active"><a href="\PoliDynamics\views\administrador\vistas\solicitudes\ListarSolicitudes.php"> Administración de solicitudes</a></li>
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

  <h1>GESTIÓN DE SOLICITUDES</h1>

  <button type="button" class="btn btn-warning" style="background-color: #F1C40F;border-color: #F1C40F;"><a href="CrearSolicitudes.php">Nueva solicitud</a></button>
  
	<table class="table table-bordered">
		<thead>
			<tr>
				<th scope="col">Descripción de la solicitud</th>
				<th scope="col">Fecha de creación</th>
				<th scope="col">Hora</th>
				<th scope="col">Usuario</th>
				<th scope="col">Categoria</th>
				<th scope="col">Aula</th>
        <th scope="col">Estado</th>
        <th scope="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php while($Filas = $Resultado->fetch_assoc()) {	

			?>
			<tr>
				<td><?php echo $Filas['DESCRIPCION'] ?></td>
				<td><?php echo $Filas['FECHA_CREACION'] ?></td>
				<td><?php echo $Filas['HORA'] ?></td>
				<td><?php echo $Filas['PRIMER_NOMBRE_USUARIO'] ?></td>
				<td><?php echo $Filas['DESCRIPCION_CATEGORIA'] ?></td>
				<td><?php echo $Filas['NUMERO_AULA'] ?></td>
        <td><?php echo $Filas['DESCRIPCION_ESTADO'] ?></td>
				<td>
					<button type="button" class="btn btn-primary" ><a href="EditarSolicitudes.php?ID_SOLICITUD=<?php echo $Filas['ID_SOLICITUD'] ?>">Modificar</a></button>
					<button type="button" class="btn btn-danger" ><a href="metodos/MetodoEliminar.php?ID_SOLICITUD=<?php echo $Filas['ID_SOLICITUD'] ?>">Desactivar</a></button>			
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
  
      
  </section>


</body>
</html>