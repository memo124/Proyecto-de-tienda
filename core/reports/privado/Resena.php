<?php
//Direcciones para realizar el reporte
require('../../helpers/report.php');
require('../../models/privado/productos.php');
require('../../models/privado/Resenas.php');
// Se declara la variable para comenzar una estancia
$pdf = new Report;
// Comienza a ejecutarse el encabezado del reporte
$pdf->reportHeader('Reseñas según el producto');

$producto = new Producto;
$resena = new Resenas;
if ($dataProducto = $producto->readproducto()) {
    foreach ($dataProducto as $rowProducto) {
        $pdf->SetFillColor(175);
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Ln(10);
        $pdf->Cell(0, 10, utf8_decode('Producto: '.$rowProducto['nombre_producto']), 1, 1, 'C', 1);
        if ($resena->setProducto($rowProducto['id_productos'])) {
            if ($dataEstado = $resena->readEstadoResenas()) {
                // Se pone una distincion de colores por el formato RGB
                $pdf->SetFillColor(244,91,91);
                // Se establece la fuente para el nombre de la categoría.
                $pdf->SetFont('Times', 'B', 11);
                // Se comienzan a crear las celdas y los encabezados
                $pdf->Cell(160, 10, utf8_decode('Comentario'), 1, 0, 'C', 1);
                $pdf->Cell(26, 10, utf8_decode('Calificación'), 1, 0, 'C', 1);
                $pdf->Cell(26, 10, utf8_decode(' '), 0, 1, 'C');
                // Se decide una fuente para los datos que se usaran
                $pdf->SetFont('Times', '', 11);
                foreach ($dataEstado as $rowEstado) {
                    // Los datos de data se recorren a la variable de row
                    $pdf->Cell(160, 10, utf8_decode($rowEstado['comentario']), 1, 0);
                    $pdf->Cell(26, 10, $rowEstado['clasificacion'], 1, 0);
                    $pdf->Cell(26, 10, utf8_decode(' '), 0, 1, 'C');
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay comentarios en este detalle'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('No hay ningun comentario con este producto'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay comentarios para mostrar'), 1, 1);
}
// Se realiza un envio al navegador y se llama al metodo footer
$pdf->Output();
?>
