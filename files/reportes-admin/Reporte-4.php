<?php

require 'FPDF/fpdf.php';


// Datos de conexión
$mysqli = new mysqli("localhost", "root", "", "polidynamics");

if(mysqli_connect_errno()) {
    echo 'Conexion fallida: ', mysqli_connect_errno();
    exit();
}
// Consulta
$query = "SELECT * FROM EQUIPO_DEFECTUOSO EQ
INNER JOIN AULA AU ON AU.ID_AULA = EQ.AULA;";
$resultado = $mysqli->query($query);

$pdf = new fpdf();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,6,'',0,0,'C');
$pdf->Cell(100,6, utf8_decode('Reporte de daños de equipos semestralmente'),0,0,'C');
$pdf->Ln(10);

$pdf->SetTitle('Reporte de danos de equipos semestralmente');

$pdf->setFillColor(232, 232, 232);
$pdf->setFont('Arial', 'B', 12);
$pdf->Cell(30, 6, 'Referencia', 1, 0, 'C', 1);
$pdf->Cell(60, 6, utf8_decode('Nombre equipo'), 1, 0, 'C', 1);
$pdf->Cell(40, 6, utf8_decode('Marca'), 1, 0, 'C', 1);
$pdf->Cell(20, 6, utf8_decode('Estado'), 1, 0, 'C', 1);
$pdf->Cell(30, 6, utf8_decode('Aula'), 1, 1, 'C', 1);

$pdf->setFont('Arial', '', 10);

while($fila = $resultado->fetch_assoc()) {
    $pdf->Cell(30, 6, $fila['REFERENCIA'], 1, 0, 'C');
    $pdf->Cell(60, 6, utf8_decode($fila['NOMBRE_EQUIPO']), 1, 0, 'C');
    $pdf->Cell(40, 6, utf8_decode($fila['MARCA']), 1, 0, 'C');
    $pdf->Cell(20, 6, utf8_decode($fila['ESTADO']), 1, 0, 'C');
	$pdf->Cell(30, 6, utf8_decode($fila['NUMERO_AULA']), 1, 1, 'C');
}

$pdf->Output();


?>