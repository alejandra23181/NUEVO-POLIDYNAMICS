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


$Query = "SELECT * FROM USUARIO US
INNER JOIN GENERO GE ON US.GENERO = GE.ID_GENERO
INNER JOIN TIPO_DOCUMENTO TI ON US.TIPO_DOCUMENTO = TI.ID_TIPO_DOCUMENTO
INNER JOIN PERFIL_USUARIO PE ON US.PERFIL = PE.ID_PERFIL"; 
$ejecutar = mysqli_query($link,$Query);

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
      <li><a href="\PoliDynamics\views\administrador\vistas\tareas\ListarTareas.php"> Gestión de tareas</a></li>
      <li><a href="\PoliDynamics\views\administrador\vistas\disponibilidad\ListarDisponibilidad.php"> Gestión de disponibilidad</a></li>
      <li><a href="\PoliDynamics\views\administrador\vistas\prestamo\ListarPrestamos.php"> Administración de préstamos</a></li>
      <li  ><a href="\PoliDynamics\views\administrador\vistas\solicitudes\ListarSolicitudes.php"> Administración de solicitudes</a></li>
      <li class="active"><a href="\PoliDynamics\views\administrador\vistas\usuarios\ListarUsuarios.php"> Administración de usuarios</a></li>
      <li><a href="\PoliDynamics\views\administrador\vistas\inventario\ListarInventario.php"> Administración de inventario</a></li>
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

  <h1 style="margin-bottom: 13px;margin-top: 58px;">CREACIÓN DE USUARIOS</h1>

  <form action="metodos/MetodoInsertar.php" method="POST" accept-charset="utf-8">
        
  <div class="form-group">
            <div class="row"> 
        <div class="col-md-6 mb-3">
            <label for="PRIMER_NOMBRE_USUARIO">Primer nombre*:</label><br>
            <input class="form-control" type="text" name="PRIMER_NOMBRE_USUARIO" value="" placeholder="" required>
            
            </div>

            <div class="col-md-6 mb-3">
            <label for="SEGUNDO_NOMBRE_USUARIO">Segundo nombre:</label><br>
            <input class="form-control" type="text" name="SEGUNDO_NOMBRE_USUARIO" value="" placeholder="" >
            </div>
            </diV>
            </div>


<div class="form-group">
            <div class="row">
            <div class="col-md-6 mb-3">
            <label for="PRIMER_APELLIDO_USUARIO">Primer apellido*:</label><br>
            <input class="form-control" type="text" name="PRIMER_APELLIDO_USUARIO" value="" placeholder="" required>
            </div>

            <div class="col-md-6 mb-3">
            <label for="SEGUNDO_APELLIDO_USUARIO">Segundo apellido:</label><br>
            <input class="form-control" type="text" name="SEGUNDO_APELLIDO_USUARIO" value="" placeholder="" >
           
            </div>
            </diV>
            </div>

<div class="form-group">
            <div class="row">
            <div class="col-md-6 mb-3">
            <label for="TELEFONO">Teléfono*:</label><br>
            <input class="form-control" type="tel" name="TELEFONO" value="" placeholder="" title="El rango permitido para este cambo es entre 7 y 10" pattern="^@?(\w){7,10}$">            
            </div>

            <div class="col-md-6 mb-3">
            <label for="EMAIL">Email*:</label><br>
            <input class="form-control" type="email" name="EMAIL" value="" placeholder="" required>
            </div>

            </div>
            </div>

            <div class="form-group">
            <div class="row">
            <div class="col-md-6 mb-3">
            <label>Tipo documento*:</label> <br>
                <select class="form-control" name="TIPO_DOCUMENTO" value="" required>
                    <option value="0">Seleccione una de las opciones:</option>
                    <?php 
                        $Query = "SELECT ID_TIPO_DOCUMENTO, DESCRIPCION_TIPO FROM TIPO_DOCUMENTO";
                        $Resultado = mysqli_query($link, $Query);
                        while($Filas = $Resultado->fetch_assoc()){
                            echo '<option value="'.$Filas["ID_TIPO_DOCUMENTO"].'">'.$Filas["DESCRIPCION_TIPO"].'</option>';   
                        }
                    ?>
                </select>
                     
            </div>

            <div class="col-md-6 mb-3">
            <label for="IDENTIFICACION">Identificación*:</label><br>
            <input class="form-control" type="number" name="IDENTIFICACION" value="" placeholder="" required>
            
            </div>

            </div>
            </div>


<div class="form-group">
            <div class="row">
            <div class="col-md-6 mb-3">
            <label>Género*:</label><br>
                <select class="form-control" name="GENERO" value="" required>
                    <option value="0">Seleccione una de las opciones:</option>
                    <?php 
                        $Query = "SELECT ID_GENERO, DESCRIPCION_GENERO FROM GENERO";
                        $Resultado = mysqli_query($link, $Query);
                        while($Filas = $Resultado->fetch_assoc()){
                            echo '<option value="'.$Filas["ID_GENERO"].'">'.$Filas["DESCRIPCION_GENERO"].'</option>';   
                        }
                    ?>
                </select>
                
            </div>

            <div class="col-md-6 mb-3">
            <label>Perfil*:</label><br>
                <select class="form-control" name="PERFIL" value="" required>
                    <option value="0">Seleccione una de las opciones:</option>
                    <?php 
                        $Query = "SELECT ID_PERFIL, DESCRIPCION_PERFIL FROM PERFIL_USUARIO";
                        $Resultado = mysqli_query($link, $Query);
                        while($Filas = $Resultado->fetch_assoc()){
                            echo '<option value="'.$Filas["ID_PERFIL"].'">'.$Filas["DESCRIPCION_PERFIL"].'</option>';   
                        }
                    ?>
                </select>
                
            </div>

            </div>
            </div>

            <div class="form-group">
            <div class="row">

            <div class="col-md-6 mb-3">
            <label for="USERNAME">Nombre usuario*:</label><br>
            <input class="form-control" type="text" name="username" value="" placeholder="" required>
            
            </div>

            <div class="col-md-6 mb-3">
            <label for="PASSWORD">Clave*:</label>
            <input class="form-control" type="text" name="password" value="" placeholder="" required>
            
            </div>

            </div>
            </div>

            <br>
            <button class="btn btn-primary" type="submit"><strong> Crear usuario</strong></button>
           

            
        </form>
  
  </section>


</body>
</html>