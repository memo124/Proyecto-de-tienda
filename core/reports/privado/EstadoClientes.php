<?php
//Direcciones para realizar el reporte
require('../../helpers/report.php');
require('../../models/privado/Clientes.php');
require('../../models/privado/EstadoClientes.php');
// Se declara la variable para comenzar una estancia
$pdf = new Report;
// Comienza a ejecutarse el encabezado del reporte
$pdf->reportHeader('Clientes según el estado de clientes');

$estado = new Estados;
if ($dataEstado = $estado->readAllEstados()) {
    foreach ($dataEstado as $rowEstado) {
        $pdf->SetFillColor(175);
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(0, 10, utf8_decode('Estado de cliente: '.$rowEstado['estado_cliente']), 1, 1, 'C', 1);
        $cliente = new Clientes;
        if ($cliente->setEstado($rowEstado['id_estado_cliente'])) {
            if ($dataCliente = $cliente->readEstadoClientes()) {
                // Se pone una distincion de colores por el formato RGB
                $pdf->SetFillColor(244,91,91);
                // Se establece la fuente para el nombre de la categoría.
                $pdf->SetFont('Times', 'B', 11);
                // Se comienzan a crear las celdas y los encabezados
                $pdf->Cell(50, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
                $pdf->Cell(50, 10, utf8_decode('Apellido'), 1, 0, 'C', 1);
                $pdf->Cell(46, 10, utf8_decode('Correo'), 1, 0, 'C', 1);
                $pdf->Cell(40, 10, utf8_decode('Usuario'), 1, 0, 'C', 1);
                $pdf->Cell(37.3, 10, utf8_decode(' '), 0, 1, 'C');
                // Se decide una fuente para los datos que se usaran
                $pdf->SetFont('Times', '', 11);
                // Los datos de data se recorren a la variable de row
                foreach ($dataCliente as $rowCliente) {
                    // Se crean las celdas con los datos asignados
                    $pdf->Cell(50, 10, utf8_decode($rowCliente['nombre_cliente']), 1, 0);
                    $pdf->Cell(50, 10, $rowCliente['apellido_cliente'], 1, 0);
                    $pdf->Cell(46, 10, $rowCliente['correo_cliente'], 1, 0);
                    $pdf->Cell(40, 10, $rowCliente['usuario_cliente'], 1, 0);
                $pdf->Cell(37.3, 10, utf8_decode(' '), 0, 1, 'C');

                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay estados en este usuario'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Ocurrió un error en un estado de ciente'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay estado de cliente para mostrar'), 1, 1);
}
// Se realiza un envio del documento al navegador y se invoca al metodo footer
$pdf->Output();
?>
