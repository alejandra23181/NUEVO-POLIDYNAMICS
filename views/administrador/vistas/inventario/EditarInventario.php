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
    $id = $_GET['ID_INVENTARIO'];              
    $QuerySQL = "SELECT * FROM INVENTARIO WHERE ID_INVENTARIO = '".$id."'";
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
    <li class="active"><a href="#"> Home</a></li>
      <li><a href="#"> Gestión de tareas</a></li>
      <li><a href="vistas/prestamo/ListarPrestamos.php"> Gestión de prestamos</a></li>
      <li><a href="#"> Gestión de disponibilidad</a></li>
      <li><a href="#"> Administración de prestamos</a></li>
      <li><a href="#"> Administración de solicitudes</a></li>
      <li><a href="#"> Administración de usuarios</a></li>
      <li><a href="vistas/inventario/ListarInventario.php"> Administración de inventario</a></li>
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

  <h1>MODIFICAR INVENTARIO</h1>
  <br>

  <form  action = "metodos/MetodoEditar.php">
        <div class="form-group">
        <input type="hidden" name="idinventario" value="<?php echo $Filas['ID_INVENTARIO'] ?>">
            <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Referencia:</label><br>   
                        <input type="text" class="form-control" name="referencia" value="<?php echo $Filas['REFERENCIA'] ?>">   
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Cantidad:</label><br>   
                        <input type="text" class="form-control" name="cantidad" value="<?php echo $Filas['CANTIDAD'] ?>">

                    </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                    <div class="col-md-6 mb-3">
                    <label>Detalle entrada:</label><br>   
                    <input type="text" class="form-control" name="detalle_entrada" value="<?php echo $Filas['DETALLE_ENTRADA'] ?>">
           </div>
    <br>
    <button class="btn btn-primary" type="submit"><strong> Actualizar inventario</strong></button>
    </form>
    <?php } ?>
  </section>
</body>
</html>