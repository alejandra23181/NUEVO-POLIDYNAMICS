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
FROM AUDITORIA AU
INNER JOIN USUARIO US ON AU.USUARIO = US.ID_USUARIO;";
$resultado = $mysqli->query($query);

$pdf = new fpdf();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,6,'',0,0,'C');
$pdf->Cell(100,6, utf8_decode('Movientos realizados en vida útil de la plataforma semestralmente'),0,0,'C');
$pdf->Ln(10);

$pdf->SetTitle('Movientos realizados en vida útil de la plataforma semestralmente');

$pdf->setFillColor(232, 232, 232);
$pdf->setFont('Arial', 'B', 12);
$pdf->Cell(40, 6, 'Usuario', 1, 0, 'C', 1);
$pdf->Cell(40, 6, utf8_decode('Fecha'), 1, 0, 'C', 1);
$pdf->Cell(40, 6, utf8_decode('Tabla'), 1, 0, 'C', 1);
$pdf->Cell(60, 6, utf8_decode('Operación'), 1, 1, 'C', 1);

$pdf->setFont('Arial', '', 10);

while($fila = $resultado->fetch_assoc()) {
    $pdf->Cell(40, 6, $fila['PRIMER_NOMBRE_USUARIO'], 1, 0, 'C');
    $pdf->Cell(40, 6, utf8_decode($fila['FECHA']), 1, 0, 'C');
    $pdf->Cell(40, 6, utf8_decode($fila['TABLA']), 1, 0, 'C');
    $pdf->Cell(60, 6, utf8_decode($fila['OPERACION']), 1, 1, 'C');
}

$pdf->Output();


?>