<?php
//Direcciones para realizar el reporte
require('../../helpers/report.php');
require('../../models/privado/Marcas.php');
require('../../models/privado/productos.php');
// Se declara la variable para comenzar una estancia
$pdf = new Report;
// Comienza a ejecutarse el encabezado del reporte
$pdf->reportHeader('Productos según la marca');

$marca = new Marcas;
if ($dataMarca = $marca->readAllMarcas()) {
    foreach ($dataMarca as $rowMarca) {
        $pdf->SetFillColor(175);
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(0, 10, utf8_decode('Marca: '.$rowMarca['marcas']), 1, 1, 'C', 1);
        $producto = new Producto;
        if ($producto->setMarca($rowMarca['id_marcas'])) {
            if ($dataProductos = $producto->readMarcaProducto()) {
                // Se pone una distincion de colores por el formato RGB
                $pdf->SetFillColor(244,91,91);
                // Se establece la fuente para el nombre de la categoría.
                $pdf->SetFont('Times', 'B', 11);
                // Se comienzan a crear las celdas y los encabezados
                $pdf->Cell(81, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
                $pdf->Cell(30, 10, utf8_decode('Precio (US$)'), 1, 0, 'C', 1);
                $pdf->Cell(25, 10, utf8_decode('Cantidad'), 1, 0, 'C', 1);
                $pdf->Cell(50, 10, utf8_decode('Tipo'), 1, 0, 'C', 1);
                $pdf->Cell(37.3, 10, utf8_decode(' '), 0, 1, 'C');
                // Se decide una fuente para los datos que se usaran
                $pdf->SetFont('Times', '', 11);
                // Los datos de data se recorren a la variable de row
                foreach ($dataProductos as $rowProducto) {
                    // Se crean las celdas con los datos asignados
                    $pdf->Cell(81, 10, utf8_decode($rowProducto['nombre_producto']), 1, 0);
                    $pdf->Cell(30, 10, $rowProducto['precio'], 1, 0);
                    $pdf->Cell(25, 10, $rowProducto['cantidad_producto'], 1, 0);
                    $pdf->Cell(50, 10, $rowProducto['tipo_producto'], 1, 0);
                    $pdf->Cell(37.3, 10, utf8_decode(' '), 0, 1, 'C');                    
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay productos para esta marca'), 1, 1);
            }
        } else {
            $pdf->Cell(0, 10, utf8_decode('Ocurrió un error en una categoría'), 1, 1);
        }
    }
} else {
    $pdf->Cell(0, 10, utf8_decode('No hay Marcas para mostrar'), 1, 1);
}
// Se realiza un envio al navegador y se llama al metodo footer
$pdf->Output();
?>
