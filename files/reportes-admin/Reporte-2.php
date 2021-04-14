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
FROM TAREA TA
INNER JOIN SOLICITUD SO ON TA.SOLICITUD = SO.ID_SOLICITUD 
INNER JOIN AULA AU ON SO.AULA = AU.ID_AULA 
INNER JOIN ESTADO ES ON SO.ESTADO = ES.ID_ESTADO 
INNER JOIN CATEGORIA CA ON SO.CATEGORIA = CA.ID_CATEGORIA
INNER JOIN USUARIO US ON SO.USUARIO = US.ID_USUARIO
INNER JOIN TIPO_TAREA TP ON TA.TIPO_TAREA = TP.ID_TIPO_TAREA;";
$resultado = $mysqli->query($query);

$pdf = new fpdf();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,6,'',0,0,'C');
$pdf->Cell(100,6, utf8_decode('Solucitudes reportadas y solucionadas'),0,0,'C');
$pdf->Ln(10);

$pdf->SetTitle('Solucitudes reportadas y solucionadas');

$pdf->setFillColor(232, 232, 232);
$pdf->setFont('Arial', 'B', 12);
$pdf->Cell(5, 6, 'Id', 1, 0, 'C', 1);
$pdf->Cell(40, 6, utf8_decode('Detalle tarea'), 1, 0, 'C', 1);
$pdf->Cell(40, 6, utf8_decode('Fecha de inicio'), 1, 0, 'C', 1);
$pdf->Cell(30, 6, utf8_decode('Hora inicio'), 1, 0, 'C', 1);
$pdf->Cell(20, 6, utf8_decode('Hora fin'), 1, 0, 'C', 1);
$pdf->Cell(40, 6, utf8_decode('Tipo tarea'), 1, 0, 'C', 1);
$pdf->Cell(20, 6, utf8_decode('Estado'), 1, 1, 'C', 1);


$pdf->setFont('Arial', '', 10);

while($fila = $resultado->fetch_assoc()) {
    $pdf->Cell(5, 6, $fila['ID_SOLICITUD'], 1, 0, 'C');
    $pdf->Cell(40, 6, utf8_decode($fila['DETALLE']), 1, 0, 'C');
    $pdf->Cell(40, 6, utf8_decode($fila['FECHA_INICIO']), 1, 0, 'C');
	$pdf->Cell(30, 6, utf8_decode($fila['HORA_INICIO']), 1, 0, 'C');
    $pdf->Cell(20, 6, utf8_decode($fila['HORA_FINAL']), 1, 0, 'C');
    $pdf->Cell(40, 6, utf8_decode($fila['DESCRIPCION_TAREA']), 1, 0, 'C');
	$pdf->Cell(20, 6, utf8_decode($fila['DESCRIPCION_ESTADO']), 1, 1, 'C');
}

$pdf->Output();


?>