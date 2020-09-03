<?php
// Initialize the session
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PoliDynamics</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="icon" href="/PoliDynamics/style/image/IconoPoli.png" />
    <link rel="stylesheet" href="style/PerfilDocente.css" type="text/css" >
</head>
<body>

<div class="page-header">
        <h1>Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenid@ a nuestro sitio.</h1>
        
    </div>


<?php 
    include('C:\xampp\htdocs\polidynamics\database\db.php');    
    $Query = "SELECT *
	FROM SOLICITUD SO
	INNER JOIN USUARIO US ON SO.USUARIO = US.ID_USUARIO
	INNER JOIN CATEGORIA CA ON SO.CATEGORIA = CA.ID_CATEGORIA
	INNER JOIN AULA AU ON SO.AULA = AU.ID_AULA
	INNER JOIN ESTADO ES ON SO.ESTADO = ES.ID_ESTADO WHERE username = '".$_SESSION['username']."' AND estado = 1";
	$Resultado = mysqli_query($link, $Query);
?>


<div>
<a href="NuevaSolicitud.php">Nuevo</a>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">Id. solicitud</th>
				<th scope="col">Descripción de la solicitud</th>
				<th scope="col">Fecha de creación</th>
				<th scope="col">Hora</th>
				<th scope="col">Usuario</th>
				<th scope="col">Categoria</th>
				<th scope="col">Aula</th>
				<th scope="col">Estado</th>
			</tr>
		</thead>
		<tbody>
			<?php while($Filas = $Resultado->fetch_assoc()) {	

			?>
			<tr>
				<th scope="row"><?php echo $Filas['ID_SOLICITUD'] ?></th>
				<td><?php echo $Filas['DESCRIPCION'] ?></td>
				<td><?php echo $Filas['FECHA_CREACION'] ?></td>
				<td><?php echo $Filas['HORA'] ?></td>
				<td><?php echo $Filas['PRIMER_NOMBRE_USUARIO'] ?></td>
				<td><?php echo $Filas['DESCRIPCION_CATEGORIA'] ?></td>
				<td><?php echo $Filas['NUMERO_AULA'] ?></td>
				<td><?php echo $Filas['DESCRIPCION_ESTADO'] ?></td>
				<td>
					<button type="button" class="btn btn-primary"><a href="ModificarSolicitud.php?ID_SOLICITUD=<?php echo $Filas['ID_SOLICITUD'] ?>">Editar</a></button>
					<button type="button" class="btn btn-danger"><a href="MetodoEliminar.php?ID_SOLICITUD=<?php echo $Filas['ID_SOLICITUD'] ?>"">Eliminar</a></button>			
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

</div>
</body>
</html>