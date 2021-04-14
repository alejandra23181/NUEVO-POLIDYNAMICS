<?php

require 'FPDF/fpdf.php';


// Datos de conexión
$mysqli = new mysqli("localhost", "root", "", "polidynamics");

if(mysqli_connect_errno()) {
    echo 'Conexion fallida: ', mysqli_connect_errno();
    exit();
}
// Consulta
$query = "SELECT *
FROM SOLICITUD SO
INNER JOIN USUARIO US ON SO.USUARIO = US.ID_USUARIO
INNER JOIN AULA AU ON SO.AULA = AU.ID_AULA
INNER JOIN ESTADO ES ON SO.ESTADO = ES.ID_ESTADO
INNER JOIN CATEGORIA CA ON SO.CATEGORIA = CA.ID_CATEGORIA;";
$resultado = $mysqli->query($query);

$pdf = new fpdf();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,6,'',0,0,'C');
$pdf->Cell(100,6, utf8_decode('Solicitudes realizadas en la vida útil de la plataforma'),0,0,'C');
$pdf->Ln(10);

$pdf->SetTitle('Solicitudes realizadas en la vida útil de la plataforma');

$pdf->setFillColor(232, 232, 232);
$pdf->setFont('Arial', 'B', 12);
$pdf->Cell(30, 6, 'Id. Solicitud', 1, 0, 'C', 1);
$pdf->Cell(60, 6, utf8_decode('Descripción'), 1, 0, 'C', 1);
$pdf->Cell(40, 6, utf8_decode('Fecha de creación'), 1, 0, 'C', 1);
$pdf->Cell(15, 6, utf8_decode('Hora'), 1, 0, 'C', 1);
$pdf->Cell(20, 6, utf8_decode('Estado'), 1, 0, 'C', 1);
$pdf->Cell(20, 6, utf8_decode('Usuario'), 1, 1, 'C', 1);

$pdf->setFont('Arial', '', 10);

while($fila = $resultado->fetch_assoc()) {
    $pdf->Cell(30, 6, $fila['ID_SOLICITUD'], 1, 0, 'C');
    $pdf->Cell(60, 6, utf8_decode($fila['DESCRIPCION']), 1, 0, 'C');
    $pdf->Cell(40, 6, utf8_decode($fila['FECHA_CREACION']), 1, 0, 'C');
    $pdf->Cell(15, 6, utf8_decode($fila['HORA']), 1, 0, 'C');
	$pdf->Cell(20, 6, utf8_decode($fila['DESCRIPCION_ESTADO']), 1, 0, 'C');
    $pdf->Cell(20, 6, utf8_decode($fila['PRIMER_NOMBRE_USUARIO']), 1, 1, 'C');
}

$pdf->Output();


?>