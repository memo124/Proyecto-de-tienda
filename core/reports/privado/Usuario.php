<?php
//Direcciones para realizar el reporte
require('../../helpers/report.php');
require('../../models/privado/usuarios.php');
// Se declara la variable para comenzar una estancia
$pdf = new Report;
// Comienza a ejecutarse el encabezado del reporte
$pdf->reportHeader('Listado de usuarios');

$usuario = new Usuario;
if ($dataUsuario = $usuario->readusuario()) {
    // Se pone una distincion de colores por el formato RGB    
    $pdf->SetFillColor(244,91,91);
    // Se establece la fuente para el nombre de la categoría.
    $pdf->SetFont('Times', 'B', 12);
    // Se comienzan a crear las celdas y los encabezados
    $pdf->Cell(40, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
    $pdf->Cell(40, 10, utf8_decode('Apellido'), 1, 0, 'C', 1);
    $pdf->Cell(46, 10, utf8_decode('Correo'), 1, 0, 'C', 1);
    $pdf->Cell(35, 10, utf8_decode('Tipo'), 1, 0, 'C', 1);
    $pdf->Cell(25, 10, utf8_decode('Estado'), 1, 0, 'C', 1);
    $pdf->Cell(37.3, 10, utf8_decode(' '), 0, 1, 'C');
    // Se establece la fuente para los datos de los productos.
    $pdf->SetFont('Times', '', 11);
    // Los datos de data se recorren a la variable de row
    foreach ($dataUsuario as $rowUsuario) {
        // Se crean las celdas con los datos asignados
        $pdf->Cell(40, 10, utf8_decode($rowUsuario['nombre_usuario']), 1, 0, 'C');
        $pdf->Cell(40, 10, utf8_decode($rowUsuario['apellido_usuario']), 1, 0, 'C');
        $pdf->Cell(46, 10, utf8_decode($rowUsuario['correo']), 1, 0, 'C');
        $pdf->Cell(35, 10, utf8_decode($rowUsuario['tipo_usuario']), 1, 0, 'C');
        $pdf->Cell(25, 10, utf8_decode($rowUsuario['estado_usuario']), 1, 0, 'C');
        $pdf->Cell(37.3, 10, utf8_decode(' '), 0, 1, 'C');
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay usuarios para mostrar'), 1, 1);
}
// Se realiza un envio del documento al navegador y se invoca al metodo footer
$pdf->Output();
?>
