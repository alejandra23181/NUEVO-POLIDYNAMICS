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
      <li><a href="ListarSolicitudes.php"> Gestión de solicitudes</a></li>
      <li><a href="ListarTareas.php"> Seguimiento de solicitudes</a></li>
      <li><a href="#"> Gestión de prestamos</a></li>
      <li><a href="ListarDisponibilidad.php"> Disponibilidad</a></li>
      <li><a href="ListarAuditoria.php"> Auditoria</a></li>
      <li class="active"><a href="ListarReportes.php"> Reportes</a></li>
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

  <h1>DISPONIBILIDAD DE AULAS</h1>
  <br>
	<table class="table table-bordered">
		<thead>
			<tr>
                <th scope="col">Bloque</th>
				<th scope="col">Número de aula</th>
				<th scope="col">Estado del aula</th>
			</tr>
		</thead>
		<tbody>
			<?php while($Filas = $Resultado->fetch_assoc()) {	

			?>
			<tr>
				<td style="text-align: center;"><?php echo $Filas['BLOQUE'] ?></td>
				<td style="text-align: center;"><?php echo $Filas['NUMERO_AULA'] ?></td>
                <?php
                 if($Filas['DISPONIBILIDAD'] == 1){
                    echo '<td style="color:#196F3D;text-transform: uppercase;text-align: center;"><strong>'.$Filas['DESCRIPCION'].'</strong></td>';
                 }else{
                    echo '<td style="color:#D12B2B;text-transform: uppercase;text-align: center;"><strong>'.$Filas['DESCRIPCION'].'</strong></td>';
                 }
                 
                 ?>
			</tr>
			<?php } ?>
		</tbody>
	</table>
  
      
  </section>


</body>
</html>