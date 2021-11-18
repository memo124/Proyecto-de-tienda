<?php
//Direcciones para realizar el reporte
require('../../helpers/report.php');
require('../../models/privado/Clientes.php');
// Se instancia la clase para crear el reporte.
$pdf = new Report;
    // Se inicia el reporte con el encabezado del documento.

$pdf->reportHeader('Listado de clientes');

$cliente = new Clientes;
if ($dataCliente = $cliente->readAllClientes()) {
    // Se establece un color de relleno para los encabezados.
    $pdf->SetFillColor(244,91,91);
    // Se establece la fuente para el nombre de la categoría.
    $pdf->SetFont('Times', 'B', 12);
    // Se imprimen las celdas con los encabezados.
    $pdf->Cell(57.5, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
    $pdf->Cell(57.5, 10, utf8_decode('Apellido'), 1, 0, 'C', 1);
    $pdf->Cell(46, 10, utf8_decode('Correo'), 1, 0, 'C', 1);
    $pdf->Cell(25, 10, utf8_decode('Estado'), 1, 0, 'C', 1);
    $pdf->Cell(37.3, 10, utf8_decode(' '), 0, 1, 'C');
    // Se establece la fuente para los datos de los productos.
    $pdf->SetFont('Times', '', 11);
    // Se recorren los registros ($dataProductos) fila por fila ($rowProducto).
    foreach ($dataCliente as $rowCliente) {
        // Se imprimen las celdas con los datos de los productos.
        $pdf->Cell(57.5, 10, utf8_decode($rowCliente['nombre_cliente']), 1, 0, 'C');
        $pdf->Cell(57.5, 10, utf8_decode($rowCliente['apellido_cliente']), 1, 0, 'C');
        $pdf->Cell(46, 10, utf8_decode($rowCliente['correo_cliente']), 1, 0, 'C');
        $pdf->Cell(25, 10, utf8_decode($rowCliente['estado_cliente']), 1, 0, 'C');
        $pdf->Cell(37.3, 10, utf8_decode(' '), 0, 1, 'C');
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay usuarios para mostrar'), 1, 1);
}
 // Se envía el documento hacia el navegador y se invoca al método Footer()
$pdf->Output();
?>
