<?php
session_start();

require 'FPDF/fpdf.php';

// Datos de conexión
$mysqli = new mysqli("localhost", "root", "", "polidynamics");

if(mysqli_connect_errno()) {
	echo 'Conexion fallida: ', mysqli_connect_errno();
	exit();
}


 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: Login.php");
    exit;
}

// Consulta

$query = "SELECT *
FROM SOLICITUD SO
INNER JOIN USUARIO US ON SO.USUARIO = US.ID_USUARIO
INNER JOIN AULA AU ON SO.AULA = AU.ID_AULA
INNER JOIN ESTADO ES ON SO.ESTADO = ES.ID_ESTADO WHERE username = '".$_SESSION['username']."'";
$resultado = $mysqli->query($query);

$pdf = new fpdf();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->setFillColor(232, 232, 232);
$pdf->setFont('Arial', 'B', 12);
$pdf->Cell(20, 6, 'Id', 1, 0, 'C', 1);
$pdf->Cell(80, 6, 'Detalle', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'Fecha de inicio', 1, 0, 'C', 1);
$pdf->Cell(50, 6, 'Estado', 1, 1, 'C', 1);

$pdf->setFont('Arial', '', 10);

while($fila = $resultado->fetch_assoc()) {
	$pdf->Cell(20, 6, $fila['ID_SOLICITUD'], 1, 0, 'C');
	$pdf->Cell(80, 6, utf8_decode($fila['DESCRIPCION']), 1, 0, 'C');
	$pdf->Cell(40, 6, utf8_decode($fila['FECHA_CREACION']), 1, 0, 'C');
	$pdf->Cell(50, 6, utf8_decode($fila['DESCRIPCION_ESTADO']), 1, 1, 'C');
}

$pdf->Output();


?>