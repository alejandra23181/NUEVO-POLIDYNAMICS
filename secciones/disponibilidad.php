
<?php 
    include('C:\xampp\htdocs\polidynamics\database\db.php');    

 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $Query = "SELECT * FROM AULA AU INNER JOIN DISPONIBILIDAD DI ON AU.DISPONIBILIDAD = ID_DISPONIBILIDAD";
	$Resultado = mysqli_query($link, $Query);
?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Poli Dynamics </title>
    <meta charset="uft-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width-device-width">
    <meta name="descripcion" content="Diseño y Desarrollo Web">    
    <meta name="Keywords" content="Diseño Web, desarrollo, po,posicionamiento">
    <meta name="author" content="Render2Web">

    <link rel="stylesheet" type="text/css" href="/PoliDynamics/style/estilos.css">
    <link rel="icon" href="/PoliDynamics/style/image/IconoPoli.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href=/PoliDynamics/style/blog.css" rel="stylesheet">
</head>
<body>
    
    <header>
        <div class="contenedor">
            <div id="marca">

            <h1 style="font-size: 30px;"><span class="resaltado"> Poli </span> Dynamics</h1>
        </div>

        <nav>
            <ul>
            <li ><a href="\PoliDynamics\Index.php">Inicio</a></li>
                <li><a href="\PoliDynamics\secciones\nosotros.php">Acerca de nosotros</a></li>
                <li><a href="\PoliDynamics\secciones\servicios.php">Nuestros servicios</a></li>
                <li><a href="\PoliDynamics\secciones\clientes.php">A quien servimos</a></li>
                <li  class="actual"><a href="\PoliDynamics\secciones\disponibilidad.php">Disponibilidad aulas</a></li>
                <li ><a href="\PoliDynamics\views\login\Login.php">Inicio de sesión</a></li>
            </ul>
        </nav>
        </div>
    </header>
	<br />

  <br>

    <div class="nosotros">
    <h10><strong><center>DISPONIBILIDAD AULAS</center></strong></h10>

    <br>

    <section id="cajitas">
        <div class="contenedores">
        <table class="table table-bordered">
		<thead>
			<tr>
                <th   style="text-align: center;" scope="col">Bloque</th>
				<th style="text-align: center;" scope="col">Número de aula</th>
				<th style="text-align: center;" scope="col">Estado del aula</th>
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
            
        </div>        
    </section>
    </div>
    <footer >
        <p>Poli Dynamics &copy; Software institucional </p>
    </footer>
</body>
</html>