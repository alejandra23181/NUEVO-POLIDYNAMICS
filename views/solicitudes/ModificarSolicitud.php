<?php
    include('C:\xampp\htdocs\polidynamics\database\db.php');
    $id = $_GET['ID_SOLICITUD'];
    $QuerySQL = "SELECT *FROM SOLICITUD SO
	INNER JOIN USUARIO US ON SO.USUARIO = US.ID_USUARIO
	INNER JOIN CATEGORIA CA ON SO.CATEGORIA = CA.ID_CATEGORIA
	INNER JOIN AULA AU ON SO.AULA = AU.ID_AULA
	INNER JOIN ESTADO ES ON SO.ESTADO = ES.ID_ESTADO WHERE ID_SOLICITUD = '".$id."'";
    $Resultado = mysqli_query($link, $QuerySQL);
     while($Filas = $Resultado->fetch_assoc()) {	
?>

<div>
    <form action = "MetodoActualizar.php">

        <input type="hidden" name="idsolicitud" value="<?php echo $Filas['ID_SOLICITUD'] ?>"><br>

        <label>Descripcion:</label><br>   
        <input type="text" name="descripcion" value="<?php echo $Filas['DESCRIPCION'] ?>"><br>

        <label>Fecha esperada:</label><br>   
        <input type="date" name="fecha"  value="<?php echo $Filas['FECHA_CREACION'] ?>"><br> 

        <label>Hora esperada:</label><br>   
        <input type="time" name="hora" value="<?php echo $Filas['HORA'] ?>"><br> 

        <input  type="hidden" name="usuario" value="<?php echo $Filas['username'] ?>"><br>

        <input type="text" name="categoria" value="<?php echo $Filas['DESCRIPCION_CATEGORIA'] ?>"><br> 
        <input type="text" name="aula" value="<?php echo $Filas['NUMERO_AULA'] ?>"><br> 
        <input type="text" name="estado" value="<?php echo $Filas['DESCRIPCION_ESTADO'] ?>"><br> 

               
        <br>
        <input type="submit" name="" value="Actualizar">
    </form>
    <?php } ?>
</div>



