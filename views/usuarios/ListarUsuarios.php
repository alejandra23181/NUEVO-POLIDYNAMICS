<?php
// Initialize the session
session_start();

?>

<div class="page-header">
        <h1>Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenid@ a nuestro sitio.</h1>
        
    </div>


<?php 
    include('C:\xampp\htdocs\polidynamics\database\db.php');    
    $Query = "SELECT * FROM USUARIO A INNER JOIN PERFIL_USUARIO B ON A.PERFIL = B.ID_PERFIL INNER JOIN TIPO_DOCUMENTO C ON A.TIPO_DOCUMENTO = C.ID_TIPO_DOCUMENTO INNER JOIN GENERO D ON A.GENERO = D.ID_GENERO WHERE username = '".$_SESSION['username']."'";
	$Resultado = mysqli_query($link, $Query);
?>


<div>

	<table>
		<thead>
			<tr>
				<th>Identificacion</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Tipo documento</th>
				<th>Genero</th>
				<th>Perfil</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<?php while($Filas = $Resultado->fetch_assoc()) {	

			?>
			<tr>
				<td><?php echo $Filas['ID_USUARIO'] ?></td>
				<td><?php echo $Filas['PRIMER_NOMBRE_USUARIO'] ?></td>
				<td><?php echo $Filas['PRIMER_APELLIDO_USUARIO'] ?></td>
				<td><?php echo $Filas['DESCRIPCION_TIPO'] ?></td>
				<td><?php echo $Filas['DESCRIPCION_GENERO'] ?></td>
				<td><?php echo $Filas['DESCRIPCION_PERFIL'] ?></td>
				<td><?php echo $Filas['EMAIL'] ?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>

</div>
