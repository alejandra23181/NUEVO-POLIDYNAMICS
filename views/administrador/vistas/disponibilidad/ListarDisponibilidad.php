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
    $Query = "SELECT * FROM aula AU INNER JOIN DISPONIBILIDAD DI ON AU.DISPONIBILIDAD = ID_DISPONIBILIDAD";
	$Resultado = mysqli_query($link, $Query);
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
  <ul>
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

  <h1>GESTIÓN DE DISPONIBILIDAD DE AULAS</h1>
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
		
                <td>
					<button type="button" class="btn btn-primary" ><a href="ModificarDisponibilidad.php?ID_AULA=<?php echo $Filas['ID_AULA'] ?>">Modificar</a></button>
				</td>
                </tr>
			<?php } ?>
		</tbody>
	</table>
  
      
  </section>


</body>
</html>