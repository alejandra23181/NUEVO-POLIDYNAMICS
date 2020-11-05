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
    $Query = "SELECT * FROM INVENTARIO";
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
      <li  ><a href="\PoliDynamics\views\administrador\vistas\tareas\ListarTareas.php"> Gestión de tareas</a></li>
      <li><a href="\PoliDynamics\views\administrador\vistas\disponibilidad\ListarDisponibilidad.php"> Gestión de disponibilidad</a></li>
      <li><a href="\PoliDynamics\views\administrador\vistas\prestamo\ListarPrestamos.php"> Administración de prestamos</a></li>
      <li  ><a href="\PoliDynamics\views\administrador\vistas\solicitudes\ListarSolicitudes.php"> Administración de solicitudes</a></li>
      <li><a href="\PoliDynamics\views\administrador\vistas\usuarios\ListarUsuarios.php"> Administración de usuarios</a></li>
      <li  class="active"><a href="\PoliDynamics\views\administrador\vistas\inventario\ListarInventario.php"> Administración de inventario</a></li>
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

  <h1>GESTIÓN DE INVENTARIO</h1>

  <button type="button" class="btn btn-warning" style="background-color: #F1C40F;border-color: #F1C40F;"><a href="CrearInventario.php">Nuevo inventario</a></button>
  
	<table class="table table-bordered">
		<thead>
			<tr>
        <th scope="col">Id inventario</th>
				<th scope="col">Referencia</th>
				<th scope="col">Cantidad</th>
				<th scope="col">Detalle entrada</th>
        <th scope="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
		<?php while($Filas = $Resultado->fetch_assoc()) {	

   ?>
    <tr>
        <td><?php echo $Filas['ID_INVENTARIO'] ?></td>
        <td><?php echo $Filas['REFERENCIA'] ?></td>
        <td><?php echo $Filas['CANTIDAD'] ?></td>
        <td><?php echo $Filas['DETALLE_ENTRADA'] ?></td>
				<td>
        <button type="button" class="btn btn-primary" ><a href="EditarInventario.php?ID_INVENTARIO=<?php echo $Filas['ID_INVENTARIO'] ?>">Modificar</a></button>
				<button type="button" class="btn btn-danger" ><a href="metodos/MetodoEliminar.php?ID_INVENTARIO=<?php echo $Filas['ID_INVENTARIO'] ?>">Desactivar</a></button>			
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>  
  </section>
</body>
</html>