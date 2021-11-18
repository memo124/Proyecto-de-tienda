<?php
//aca están las rutas de archivos que usara el comprobante de compras
require('../../helpers/report2.php');
require('../../models/commerce/carrito.php');

//Se evalua si la variable id_factura tiene un valor
if( isset($_GET['id_factura']) ) {
    // Se instancia a la clase Reporte para crear el comprobante de compras.
    $pdf = new Reporte;
    // Se inicia el reporte con la parte superior (Header)del documento.
    $pdf->reportHeader('Comprobante de compra');
    /*Se instancia a la clase Carrito para poder trabajar con los datos
    a mostrar en el comprobante de compras.*/
    $carrito = new Carrito;
    /*Se evalua si al método que recibe el id del cliente guardado en la 
    variable de sesión, se le asigno correctamente.*/
    if( $carrito->setIdCliente( $_SESSION['id_cliente'] ) ) {
        /*Se evalua si al método que recibe el id de la factura guardado en la 
        variable id_factura, se le asigno correctamente.*/
        if ( $carrito->setIdFactura( $_GET['id_factura'] ) ) {
            /*Se evalua si hay registros (datos del cliente y del pedido en general)
            para mostrar, sino se redirecciona a otra página.*/
            if ( $rowComprobante = $carrito->darComprobante() ) {
                //print_r( $rowComprobante );
                /*Se determina la fuente a usar*/
                $pdf->SetFont('Times', 'B', 12);
                /*Se determina el color a usar para la celda del encabezado
                que dirá: Datos del pedido*/
                $pdf->SetFillColor(175);
                /*Se imprime una celda que dirá: Datos del pedido*/
                $pdf->Cell(0, 10, 'Datos del pedido', 1, 1, 'C', 1);
                /*Se determina el color a usar para las celdas que determinan que información
                se mostrara de los datos del cliente y del pedido en general*/
                $pdf->SetFillColor(244,91,91);
                /*Se imprimen las celdas que determinan que información
                se mostrara de los datos del cliente y del pedido en general*/

                //Se imprime la celda que dirá: Nombre del cliente
                $pdf->Cell(93, 10, utf8_decode('Nombre del cliente'), 1, 0, 'C', 1);
                //Se imprime la celda que dirá: Usuario
                $pdf->Cell(93, 10, utf8_decode('Usuario'), 1, 1, 'C', 1);
                /*Se imprime la celda que contendrá el nombre completo del cliente*/
                $pdf->Cell(93, 10, (utf8_decode($rowComprobante['nombre_cliente']).' '.utf8_decode($rowComprobante['apellido_cliente'])), 1, 0, 'C');
                /*Se imprime la celda que contendrá el nombre de usuario del cliente*/
                $pdf->Cell(93, 10, utf8_decode($rowComprobante['usuario_cliente']), 1, 1, 'C');
                //Se imprime la celda que dirá: Correo del cliente
                $pdf->Cell(93, 10, utf8_decode('Correo del cliente'), 1, 0, 'C', 1);
                //Se imprime la celda que dirá: Forma de pago
                $pdf->Cell(93, 10, utf8_decode('Forma de pago'), 1, 1, 'C', 1);
                /*Se imprime la celda que contendrá el correo del cliente*/
                $pdf->Cell(93, 10, utf8_decode($rowComprobante['correo_cliente']), 1, 0, 'C');
                /*Se imprime la celda que contendrá la forma de pago del pedido*/
                $pdf->Cell(93, 10, utf8_decode($rowComprobante['tipo_pago']), 1, 1, 'C');
                //Se imprime la celda que dirá: Fecha de compra
                $pdf->Cell(93, 10, utf8_decode('Fecha de compra'), 1, 0, 'C', 1);
                //Se imprime la celda que dirá: Dirección
                $pdf->Cell(93, 10, utf8_decode('Dirección'), 1, 1, 'C', 1);
                /*Se imprime la celda que contendrá la fecha en que se realizo el pedido*/
                $pdf->Cell(93, 10, utf8_decode($rowComprobante['fecha_factura']), 1, 0, 'C');
                /*Se imprime la celda que contendrá la dirección de envío del pedido*/
                $pdf->Cell(93, 10, utf8_decode($rowComprobante['direccion']), 1, 1, 'C');
                //Se imprime la celda que dirá: Estado de pedido
                $pdf->Cell(93, 10, utf8_decode('Estado de pedido'), 1, 0, 'C', 1);
                //Se imprime la celda que dirá: Total a pagar (USD$)
                $pdf->Cell(93, 10, utf8_decode('Total a pagar (USD$)'), 1, 1, 'C', 1);
                /*Se imprime la celda que contendrá el estado del pedido*/
                $pdf->Cell(93, 10, utf8_decode($rowComprobante['estado_factura']), 1, 0, 'C');
                /*Se imprime la celda que contendrá el total a pagar del pedido*/
                $pdf->Cell(93, 10, '$'.(utf8_decode($rowComprobante['total_factura'])), 1, 1, 'C');
                //Se realiza un salto de línea en el comprobante de compras.
                $pdf->Ln(10);
                /*Se evalua si al método que recibe el id del cliente guardado en la 
                variable de sesión, se le asigno correctamente.*/
                if( $carrito->setIdCliente( $_SESSION['id_cliente'] ) ) {
                    /*Se evalua si al método que recibe el id de la factura guardado en la 
                    variable id_factura, se le asigno correctamente.*/
                    if ( $carrito->setIdFactura( $_GET['id_factura'] ) ) {
                        /*Se evalua si hay registros (datos del cliente y del pedido en general)
                        para mostrar, sino se redirecciona a otra página.*/
                        if ( $dataDetalle = $carrito->darComprobante2() ) {
                            /*Se determina la fuente a usar*/
                            $pdf->SetFont('Times', 'B', 12);
                            /*Se determina el color a usar para la celda del encabezado
                            que dirá: Detalles de la compra*/
                            $pdf->SetFillColor(175);
                            /*Se imprime una celda que dirá: Detalles de la compra*/
                            $pdf->Cell(0, 10, 'Detalles de la compra', 1, 1, 'C', 1);
                            /*Se determina el color a usar para las celdas que determinan que información
                            se mostrara de los detalles de una compra*/
                            $pdf->SetFillColor(244,91,91);
                            //Se imprime la celda que dirá: Producto
                            $pdf->Cell(60, 10, utf8_decode('Producto'), 1, 0, 'C', 1);
                            //Se imprime la celda que dirá: Precio(USD$)
                            $pdf->Cell(29, 10, utf8_decode('Precio(USD$)'), 1, 0, 'C', 1);
                            //Se imprime la celda que dirá: Descuento
                            $pdf->Cell(32.3, 10, utf8_decode('Descuento'), 1, 0, 'C', 1);
                            //Se imprime la celda que dirá: Cantidad
                            $pdf->Cell(32.3, 10, utf8_decode('Cantidad'), 1, 0, 'C', 1);
                            //Se imprime la celda que dirá: Subtotal(USD$)
                            $pdf->Cell(32.2, 10, utf8_decode('Subtotal(USD$)'), 1, 0, 'C', 1);
                            $pdf->Cell(37.2, 10, utf8_decode(' '), 0, 1, 'C');
                            /*Se determina la fuente a usar*/
                            $pdf->SetFont('Times', '', 11);
                            // Se recorre el conjunto de registros ($dataDetalle) por cada fila ($rowDetalle).
                            foreach ($dataDetalle as $rowDetalle) {
                                /*Se imprime la celda que contendrá el nombre del producto comprado*/
                                $pdf->Cell(60, 10, utf8_decode($rowDetalle['nombre_producto']), 1, 0, 'C');
                                /*Se imprime la celda que contendrá el precio del producto comprado*/
                                $pdf->Cell(29, 10, utf8_decode($rowDetalle['precio']), 1, 0, 'C');
                                /*Se imprime la celda que contendrá el descuento del producto comprado*/
                                $pdf->Cell(32.3, 10, (utf8_decode($rowDetalle['promocion'])).'%', 1, 0, 'C');
                                /*Se imprime la celda que contendrá el la cantidad solicitada
                                 del producto comprado*/
                                $pdf->Cell(32.3, 10, utf8_decode($rowDetalle['cantidad_comprados']), 1, 0, 'C');
                                /*Se imprime la celda que contendrá el precio del producto solicitado 
                                multiplicado por la cantidad solicitada del producto comprado (Subtotal)*/
                                $pdf->Cell(32.2, 10, utf8_decode($rowDetalle['precio_comprados']), 1, 0, 'C');
                                $pdf->Cell(37.2, 10, utf8_decode(' '), 0, 1, 'C');
                            }
                        } else {
                            /*Se imprime la celda que contendrá un mensaje informando que no hay productos
                            para el pedido seleccionado*/
                            $pdf->Cell(0, 10, utf8_decode('No hay productos para este pedido'), 1, 1);
                        }
                    } else {
                        /*Se redirecciona a la página donde se muestran
                        las compras realizadas de un cliente
                        si al método que recibe el id de la factura guardado en la 
                        variable id_factura, no se le asigno correctamente*/
                        header('location: ../../../views/commerce/Compras.php');
                    }
                } else {
                    /*Se redirecciona a la página donde se muestran
                    las compras realizadas de un cliente
                    si al método que recibe el id del cliente guardado en la 
                    variable de sesión, no se le asigno correctamente.*/
                    header('location: ../../../views/commerce/Compras.php');
                }
            } else {
                /*Se redirecciona a la página donde se muestran
                las compras realizadas de un cliente
                si no hay registros (datos del cliente y del pedido en general)
                para mostrar*/
                header('location: ../../../views/commerce/Compras.php');
            }
        //Se envía el documento ya configurado hacia el navegador y se invoca al método Footer()
        $pdf->Output();
        } else {
            /*Se redirecciona a la página donde se muestran
            las compras realizadas de un cliente
            si al método que recibe el id de la factura guardado en la 
            variable id_factura, no se le asigno correctamente*/
            header('location: ../../../views/commerce/Compras.php');
        }
    } else {
        /*Se redirecciona a la página donde se muestran
        las compras realizadas de un cliente
        si al método que recibe el id del cliente guardado en la 
        variable de sesión, no se le asigno correctamente.*/
        header('location: ../../../views/commerce/Compras.php');
    }
} else {
    /*Se redirecciona a la página donde se muestran
    las compras realizadas de un cliente
    si la variable id_factura no tiene un valor.*/
    header('location: ../../../views/commerce/Compras.php');
}
?>