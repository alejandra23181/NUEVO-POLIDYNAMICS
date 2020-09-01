<?php
// Initialize the session
session_start();

?>

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

	<table>
		<thead>
			<tr>
				<th>Id. solicitud</th>
				<th>Descripción de la solicitud</th>
				<th>Fecha de creación</th>
				<th>Hora</th>
				<th>Usuario</th>
				<th>Categoria</th>
				<th>Aula</th>
				<th>Estado</th>
			</tr>
		</thead>
		<tbody>
			<?php while($Filas = $Resultado->fetch_assoc()) {	

			?>
			<tr>
				<td><?php echo $Filas['ID_SOLICITUD'] ?></td>
				<td><?php echo $Filas['DESCRIPCION'] ?></td>
				<td><?php echo $Filas['FECHA_CREACION'] ?></td>
				<td><?php echo $Filas['HORA'] ?></td>
				<td><?php echo $Filas['PRIMER_NOMBRE_USUARIO'] ?></td>
				<td><?php echo $Filas['DESCRIPCION_CATEGORIA'] ?></td>
				<td><?php echo $Filas['NUMERO_AULA'] ?></td>
				<td><?php echo $Filas['DESCRIPCION_ESTADO'] ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

</div>
