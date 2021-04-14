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
    $Query = "SELECT * FROM AUDITORIA AU
    INNER JOIN USUARIO US ON AU.USUARIO = US.ID_USUARIO 
    WHERE username = '".$_SESSION['username']."' ";
	$Resultado = mysqli_query($link, $Query);
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PoliDynamics</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="icon" href="/PoliDynamics/style/image/IconoPoli.png" />
    <link rel="stylesheet" href="../style/General.css" type="text/css" >
</head>
<body>

    <section id="sidebar"> 
    <div class="white-label">
    </div> 
  <nav class="menu">
  <div id="sidebar-nav">   
  <ul id="Secciones">
    <li ><a href="/PoliDynamics/views/docente/Index.php"> Home</a></li>
      <li ><a href="\PoliDynamics\views\docente\vistas\solicitudes\ListarSolicitudes.php"> Gestión de solicitudes</a></li>
      <li ><a href="\PoliDynamics\views\docente\vistas\ListarTareas.php"> Seguimiento de solicitudes</a></li>
      <li ><a href="\PoliDynamics\views\docente\vistas\prestamo\ListarPrestamos.php"> Gestión de prestamos</a></li>
      <li ><a href="\PoliDynamics\views\docente\vistas\ListarDisponibilidad.php"> Disponibilidad</a></li>
      <li class="active"><a href="\PoliDynamics\views\docente\vistas\ListarAuditoria.php"> Auditoria</a></li>
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

  <h1>SEGUIMIENTO DE MOVIMIENTOS REALIZADOS</h1>
  <br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th scope="col">Usuario</th>
				<th scope="col">Fecha de movimiento</th>
				<th scope="col">Movimiento realizado</th>
                <th scope="col">Detalle de movimiento</th>
			</tr>
		</thead>
		<tbody>
			<?php while($Filas = $Resultado->fetch_assoc()) {	

			?>
			<tr>
				<th scope="row"><?php echo $Filas['username'] ?></th>
				<td><?php echo $Filas['FECHA'] ?></td>
				<td><?php echo $Filas['OPERACION'] ?></td>
				<td><?php echo $Filas['DESCRIPCION'] ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
  
      
  </section>


</body>
</html>