<?php
/*
*	Se crea la clase Carrito que maneja la tabla de factura y detalle_factura de la base de datos
    y es heredada de la clase Validator
*/
class Carrito extends Validator
{
    // Declaración de atributos que utilizará la clase.
    private $id_factura_cliente = null;
    private $id_detalle_factura = null;
    private $id_cliente = null;
    private $id_producto = null;
    private $cantidad = null;
    private $precio = null;
    private $id_estado_factura = null;
    private $fecha = null;
    private $direccion = null;
    private $tipo = null;
    private $total = null;

    /*
    *   Métodos que otorgan valores a los atributos(Setters).
    */
    public function setIdFactura($value)
    {
        if ( $this->validateNaturalNumber($value) ) {
            $this->id_factura_cliente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTipo($value)
    {
        if ( $this->validateNaturalNumber($value) ) {
            if ( $value == 1 ) {
                $this->tipo="En efectivo";
            } else {
                $this->tipo ="Tarjeta de crédito";
            }
            return true;
        } else {
            return false;
        }
    }

    public function setIdDetalle($value)
    {
        if ( $this->validateNaturalNumber($value) ) {
            $this->id_detalle_factura = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdCliente($value)
    {
        if( $this->validateNaturalNumber($value) ) {
            $this->id_cliente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdProducto($value)
    {
        if ( $this->validateNaturalNumber($value) ) {
            $this->id_producto = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCantidad($value)
    {
        if ( $this->validateNaturalNumber($value) ) {
            $this->cantidad = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPrecio($value)
    {
        if ( $this->validateMoney($value) ) {
            $this->precio = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTotal($value)
    {
        if ( $this->validateMoney($value) ) {
            $this->total = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdEstado($value)
    {
        if ( $this->validateNaturalNumber($value) ) {
            $this->id_estado_factura = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFecha($value)
    {
        if ( $this->validateString($value, 1, 150) ) {
            $this->fecha = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDireccion($value)
    {
        if ( $this->validateString($value, 15, 200) ) {
            $this->direccion = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para devolver los valores de los atributos(Getters).
    */
    public function getIdFactura()
    {
        return $this->id_factura_cliente;
    }

    /*
    *   Métodos que sirven para realizar el SCRUD de las tablas de factura y detalle_factura
    */

    // Método que evalua si hay un pedido pendiente para agregar el detalle o se crea un pedido si no lo hay
    public function readOrder()
    {
        $sql = 'SELECT * FROM FACTURA F
                INNER JOIN ESTADO_FACTURA EF USING(ID_ESTADO_FACTURA)
                INNER JOIN CLIENTE C USING(ID_CLIENTE)
                WHERE EF.ID_ESTADO_FACTURA = 1 AND F.ID_CLIENTE = ?';
        $params = array($this->id_cliente);
        if ( $data = Conexion::getRow($sql, $params) ) {
            $this->id_factura_cliente = $data['id_factura_cliente'];
            return true;
        } else {
            $sql = 'INSERT INTO factura(id_cliente, id_estado_factura)
                    VALUES(?, 1)';
            $params = array($this->id_cliente);
            if ( Conexion::executeRow($sql, $params) ) {
                /*Se iguala el atributo de id de factura a el valor del ultimo id ingresado de la tabla factura*/
                $this->id_factura_cliente = Conexion::getLastRowId();
                return true;
            } else {
                return false;
            }
        }
    }

    //Método que agrega los productos al carrito
    public function createDetail()
    {
        $sql = 'INSERT INTO DETALLE_FACTURA( id_productos, cantidad_comprados, precio_comprados, id_factura )
                VALUES(?, ?, ?, ?)';
        $params = array($this->id_producto, $this->cantidad, $this->precio, $this->id_factura_cliente );
        return Conexion::executeRow($sql, $params);
    }

    //Método que devuelve los productos pertenecientes a una factura y los muestra en el carrito de compras
    public function readCart()
    {
        $sql = 'SELECT DF.ID_DETALLE_FACTURA, P.ID_PRODUCTOS ,F.ID_FACTURA_CLIENTE ,P.NOMBRE_PRODUCTO, P.PRECIO, T.PROMOCION, DF.CANTIDAD_COMPRADOS, DF.PRECIO_COMPRADOS, F.TOTAL_FACTURA FROM DETALLE_FACTURA DF
                INNER JOIN FACTURA F ON DF.ID_FACTURA = F.ID_FACTURA_CLIENTE
                INNER JOIN PRODUCTOS P ON DF.ID_PRODUCTOS = P.ID_PRODUCTOS
                INNER JOIN TIPO_PRODUCTOS T ON P.ID_TIPO_PRODUCTO = T.ID_TIPO_PRODUCTO
                INNER JOIN ESTADO_FACTURA EF ON  F.ID_ESTADO_FACTURA = EF.ID_ESTADO_FACTURA
                WHERE EF.ID_ESTADO_FACTURA IN (1) AND F.ID_FACTURA_CLIENTE = ?
                ORDER BY DF.ID_DETALLE_FACTURA;';
        $params = array($this->id_factura_cliente);
        return Conexion::getRows($sql, $params);
    }

    /*Método que obtiene el total de las compras de los productos del carrito */
    public function obtenerTotal()
    {
        $sql = 'SELECT SUM(DF.PRECIO_COMPRADOS) AS total FROM DETALLE_FACTURA DF
        INNER JOIN FACTURA F ON DF.ID_FACTURA = F.ID_FACTURA_CLIENTE
        INNER JOIN PRODUCTOS P ON DF.ID_PRODUCTOS = P.ID_PRODUCTOS
        INNER JOIN TIPO_PRODUCTOS T ON P.ID_TIPO_PRODUCTO = T.ID_TIPO_PRODUCTO
        INNER JOIN ESTADO_FACTURA EF ON  F.ID_ESTADO_FACTURA = EF.ID_ESTADO_FACTURA
        WHERE EF.ID_ESTADO_FACTURA IN (1) AND F.ID_FACTURA_CLIENTE = ?;';
        $params = array($this->id_factura_cliente);
        return Conexion::getRows($sql, $params);
    }

    /*Método que obtiene el total de las compras no tienen estado pendiente ni descartada */
    public function obtenerTotal2()
    {
        $sql = 'SELECT SUM(DF.PRECIO_COMPRADOS) AS total FROM DETALLE_FACTURA DF
        INNER JOIN FACTURA F ON DF.ID_FACTURA = F.ID_FACTURA_CLIENTE
        INNER JOIN PRODUCTOS P ON DF.ID_PRODUCTOS = P.ID_PRODUCTOS
        INNER JOIN TIPO_PRODUCTOS T ON P.ID_TIPO_PRODUCTO = T.ID_TIPO_PRODUCTO
        INNER JOIN ESTADO_FACTURA EF ON  F.ID_ESTADO_FACTURA = EF.ID_ESTADO_FACTURA
        WHERE EF.ID_ESTADO_FACTURA NOT IN (1, 5) AND F.ID_FACTURA_CLIENTE = ?;';
        $params = array($this->id_factura_cliente);
        return Conexion::getRows($sql, $params);
    }

    // Método que permite cambiar el estado de una factura cuando se quiere finalizar un pedido
    public function updateOrderStatus()
    {
        $sql = 'UPDATE factura
                SET id_estado_factura = ?, fecha_factura = ?, direccion = ?, tipo_pago = ? , total_factura = ?
                WHERE id_factura_cliente = ?';
        $params = array($this->id_estado_factura , $this->fecha, $this->direccion, $this->tipo , $this->total , $this->id_factura_cliente);
        return Conexion::executeRow($sql, $params);
    }

    // Método que permite cambiar la cantidad de productos comprados en el carrito de compras
    public function updateDetail()
    {
        $sql = 'UPDATE detalle_factura
                SET cantidad_comprados = ?, precio_comprados = ?
                WHERE id_factura = ? AND id_detalle_factura = ?';
        $params = array($this->cantidad, $this->precio, $this->id_factura_cliente, $this->id_detalle_factura);
        return Conexion::executeRow($sql, $params);
    }

    // Método que permite eliminar un producto de una factura
    public function deleteDetail()
    {
        $sql = 'DELETE FROM detalle_factura
                WHERE id_factura = ? AND id_detalle_factura = ?';
        $params = array($this->id_factura_cliente, $this->id_detalle_factura);
        return Conexion::executeRow($sql, $params);
    }

    // Método que permite obtener los id y detalles de las compras de un cliente
    public function obtenerCompras()
    {
        $sql = 'SELECT DISTINCT(F.ID_FACTURA_CLIENTE) ,EF.ESTADO_FACTURA, F.DIRECCION, F.FECHA_FACTURA,F.TIPO_PAGO FROM DETALLE_FACTURA DF
        INNER JOIN FACTURA F ON DF.ID_FACTURA = F.ID_FACTURA_CLIENTE
        INNER JOIN PRODUCTOS P ON DF.ID_PRODUCTOS = P.ID_PRODUCTOS
        INNER JOIN TIPO_PRODUCTOS T ON P.ID_TIPO_PRODUCTO = T.ID_TIPO_PRODUCTO
        INNER JOIN ESTADO_FACTURA EF ON  F.ID_ESTADO_FACTURA = EF.ID_ESTADO_FACTURA
        WHERE EF.ID_ESTADO_FACTURA NOT IN (1, 5) AND F.ID_CLIENTE = ? 
        ORDER BY F.ID_FACTURA_CLIENTE';
        $params = array($this->id_cliente);
        return Conexion::getRows($sql, $params);
    }

    // Método que permite obtener los detalles de una compra
    public function detallarCompras()
    {
        $sql = 'SELECT DF.ID_DETALLE_FACTURA, P.ID_PRODUCTOS ,F.ID_FACTURA_CLIENTE ,P.NOMBRE_PRODUCTO, P.PRECIO, T.PROMOCION, DF.CANTIDAD_COMPRADOS, DF.PRECIO_COMPRADOS FROM DETALLE_FACTURA DF
        INNER JOIN FACTURA F ON DF.ID_FACTURA = F.ID_FACTURA_CLIENTE
        INNER JOIN PRODUCTOS P ON DF.ID_PRODUCTOS = P.ID_PRODUCTOS
        INNER JOIN TIPO_PRODUCTOS T ON P.ID_TIPO_PRODUCTO = T.ID_TIPO_PRODUCTO
        INNER JOIN ESTADO_FACTURA EF ON  F.ID_ESTADO_FACTURA = EF.ID_ESTADO_FACTURA
        WHERE EF.ID_ESTADO_FACTURA NOT IN (1, 5) AND DF.ID_FACTURA = ?
        ORDER BY DF.ID_DETALLE_FACTURA';
        $params = array($this->id_factura_cliente);
        return Conexion::getRows($sql, $params);
    }

    /*Métodos para generar el comprobante de compra*/


    /*Método que devuele los datos generales del comprobante de compras
    (Datos del cliente y del pedido en general)*/
    public function darComprobante()
    {
        $sql = 'SELECT C.NOMBRE_CLIENTE , C.APELLIDO_CLIENTE, C.USUARIO_CLIENTE, 
                C.CORREO_CLIENTE, F.TOTAL_FACTURA , F.TIPO_PAGO, F.FECHA_FACTURA,
                F.DIRECCION, E.ESTADO_FACTURA FROM CLIENTE C
                JOIN FACTURA F USING(ID_CLIENTE)
                JOIN ESTADO_FACTURA E USING(ID_ESTADO_FACTURA)
                WHERE F.ID_FACTURA_CLIENTE = ? AND C.ID_CLIENTE = ?;';
        $params = array($this->id_factura_cliente , $this->id_cliente);
        return Conexion::getRow($sql, $params);
    }

    /*Método que devuelve el detalle de un pedido para el comprobante de compras*/
    public function darComprobante2()
    {
        $sql = 'SELECT  DF.PRECIO_COMPRADOS, DF.CANTIDAD_COMPRADOS, P.NOMBRE_PRODUCTO, P.PRECIO, TP.PROMOCION FROM FACTURA F
        INNER JOIN DETALLE_FACTURA DF ON DF.ID_FACTURA = F.ID_FACTURA_CLIENTE
        JOIN PRODUCTOS P USING(ID_PRODUCTOS)
        JOIN CLIENTE C USING(ID_CLIENTE)
        JOIN TIPO_PRODUCTOS TP USING(ID_TIPO_PRODUCTO)
        WHERE F.ID_FACTURA_CLIENTE = ? AND C.ID_CLIENTE = ?;';
        $params = array($this->id_factura_cliente , $this->id_cliente);
        return Conexion::getRows($sql, $params);
    }
}
?>