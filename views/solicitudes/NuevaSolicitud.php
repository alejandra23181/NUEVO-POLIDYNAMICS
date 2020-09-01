<?php
    session_start();
    include('C:\xampp\htdocs\PoliDynamics\database\db.php');
?>

<div>
    <form method = "POST" action = "MetodoGuardar.php">
        <label>Descripcion:</label><br>   
        <input type="text" name="descripcion"><br>

        <label>Fecha esperada:</label><br>   
        <input type="date" name="fecha"  value="<?php echo date("Y-m-d");?>"><br> 

        <label>Hora esperada:</label><br>   
        <input type="time" name="hora"><br> 

        <input  type="hidden" name="usuario" value="<?php echo htmlspecialchars($_SESSION["id"]); ?>"><br> 

        <label>Categoria:</label><br>
        <select name="categoria">
            <option value="0">Seleccione una de las opciones:</option>
            <?php 
                $Query = "SELECT ID_CATEGORIA, DESCRIPCION_CATEGORIA FROM CATEGORIA";
                $Resultado = mysqli_query($link, $Query);
                while($Filas = $Resultado->fetch_assoc()){
                    echo '<option value="'.$Filas[ID_CATEGORIA].'">'.$Filas[DESCRIPCION_CATEGORIA].'</option>';   
                }
            ?>
        </select><br>

        <label>Aula:</label><br>
        <select name="aula">
            <option value="0">Seleccione una de las opciones:</option>
            <?php 
                $Query = "SELECT ID_AULA, NUMERO_AULA FROM AULA";
                $Resultado = mysqli_query($link, $Query);
                while($Filas = $Resultado->fetch_assoc()){
                    echo '<option value="'.$Filas[ID_AULA].'">'.$Filas[NUMERO_AULA].'</option>';   
                }
            ?>
        </select><br>

        <label>Estado:</label><br>
        <select name="estado">
            <option value="0">Seleccione una de las opciones:</option>
            <?php 
                $Query = "SELECT ID_ESTADO, DESCRIPCION_ESTADO FROM ESTADO";
                $Resultado = mysqli_query($link, $Query);
                while($Filas = $Resultado->fetch_assoc()){
                    echo '<option value="'.$Filas[ID_ESTADO].'">'.$Filas[DESCRIPCION_ESTADO].'</option>';   
                }
            ?>
        </select><br>
        <br>
        <input type="submit" name="" value="Agregar">
    </form>
</div>

