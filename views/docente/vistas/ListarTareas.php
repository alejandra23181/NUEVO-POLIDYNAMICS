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
    INNER JOIN ESTADO ES ON SO.ESTADO = ES.ID_ESTADO
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
    <li ><a href="../Index.php"> Home</a></li>
      <li><a href="solicitudes/ListarSolicitudes.php"> Gestión de solicitudes</a></li>
      <li class="active"><a href="ListarTareas.php"> Seguimiento de solicitudes</a></li>
      <li><a href="#"> Gestión de prestamos</a></li>
      <li><a href="ListarDisponibilidad.php"> Disponibilidad</a></li>
      <li><a href="ListarAuditoria.php"> Auditoria</a></li>
      <li><a href="ListarReportes.php"> Reportes</a></li>
      <li><a href="ManualUsuario.php"> Manual de usuario</a></li>     
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

  <h1>SEGUIMIENTO DE SOLICITUDES EN EJECUCIÓN</h1>
  <br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th scope="col">Id. tarea</th>
				<th scope="col">Id. solicitud</th>
				<th scope="col">Detalle solicitud</th>
				<th scope="col">Detalle tarea</th>
				<th scope="col">Recomendaciones</th>
				<th scope="col">Tipo de tarea</th>
				<th scope="col">Fecha de solución</th>
				<th scope="col">Hora inicio</th>
        <th scope="col">Hora fin</th>
        <th scope="col">Estado</th>
			</tr>
		</thead>
		<tbody>
			<?php while($Filas = $Resultado->fetch_assoc()) {	

			?>
			<tr>
				<th scope="row"><?php echo $Filas['ID_TAREA'] ?></th>
				<td><?php echo $Filas['ID_SOLICITUD'] ?></td>
				<td><?php echo $Filas['DESCRIPCION'] ?></td>
				<td><?php echo $Filas['DETALLE'] ?></td>
				<td><?php echo $Filas['RECOMENDACION'] ?></td>
				<td><?php echo $Filas['DESCRIPCION_TAREA'] ?></td>
				<td><?php echo $Filas['FECHA_INICIO'] ?></td>
        <td><?php echo $Filas['HORA_INICIO'] ?></td>
        <td><?php echo $Filas['HORA_FINAL'] ?></td>
          <?php
          if($Filas['ID_ESTADO'] == 1){
              echo '<td style="color:#196F3D;text-transform: uppercase;text-align: center;"><strong>'.$Filas['DESCRIPCION_ESTADO'].'</strong></td>';
          }elseif($Filas['ID_ESTADO'] == 2){
              echo '<td style="color:#D12B2B;text-transform: uppercase;text-align: center;"><strong>'.$Filas['DESCRIPCION_ESTADO'].'</strong></td>';
          }elseif($Filas['ID_ESTADO'] == 3){
              echo '<td style="color:#F1C40F;text-transform: uppercase;text-align: center;"><strong>'.$Filas['DESCRIPCION_ESTADO'].'</strong></td>';
          }else{
            echo '<td style="color:#686C6A;text-transform: uppercase;text-align: center;"><strong>SIN ESTADO</strong></td>';
          }
          
          ?>

			</tr>
			<?php } ?>
		</tbody>
	</table>
  
      
  </section>


</body>
</html>