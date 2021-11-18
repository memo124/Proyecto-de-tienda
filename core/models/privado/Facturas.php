<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Facturas extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_factura = null;
    private $cliente = null;
    private $total = null;
    private $fecha = null;
    private $pago = null;
    private $direccion = null;
    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_factura = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCliente($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->cliente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setTotal($value)
    {
        if ($this->validateMoney($value)) {
            $this->total = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setFecha($value)
    {
        if ($this->validateString($value, 1, 150)) {
            $this->fecha = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setPago($value)
    {
        if ($this->validateAlphanumeric($value, 1, 50)) {
            $this->pago = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setDireccion($value)
    {
        if ($this->validateString($value, 1, 200)) {
            $this->direccion = $value;
            return true;
        } else {
            return false;
        }
    }
    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId()
    {
        return $this->id_factura;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getPago()
    {
        return $this->pago;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }
    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function buscarFacturas($value)
    {
        $sql = 'SELECT F.id_factura_cliente, C.nombre_cliente, F.total_factura, F.fecha_factura, F.tipo_pago, F.direccion
                FROM factura F INNER JOIN cliente C ON F.id_cliente = C.id_cliente
                WHERE C.nombre_cliente ILIKE ? OR F.fecha_factura ILIKE ? OR F.tipo_pago ILIKE ? OR F.direccion ILIKE ? ';
        $params = array("%$value%","%$value%","%$value%","%$value%");
        return Conexion::getRows($sql, $params);
    }

    public function createFacturas()
    {
        $sql = 'INSERT INTO factura(id_cliente,total_factura,fecha_factura,tipo_pago, direccion)
                VALUES(?,?,?,?,?)';
        $params = array($this->cliente,$this->total,$this->fecha,$this->pago,$this->direccion);
        return Conexion::executeRow($sql, $params);
    }

    public function readAllFacturas()
    {
        $sql = 'SELECT F.id_factura_cliente, C.nombre_cliente, F.total_factura, F.fecha_factura, F.tipo_pago, F.direccion
                FROM factura F INNER JOIN cliente C 
                ON F.id_cliente = C.id_cliente
                ORDER BY F.id_factura_cliente';
        $params = null;
        return Conexion::getRows($sql, $params);
    }

    public function readOneFacturas()
    {
        $sql = 'SELECT id_factura_cliente, id_cliente, total_factura, fecha_factura, tipo_pago, direccion
                FROM factura 
                WHERE id_factura_cliente = ?';
        $params = array($this->id_factura);
        return Conexion::getRow($sql, $params);
    }

    public function updateFacturas()
    {
        $sql = 'UPDATE factura
                SET id_cliente = ?, total_factura = ?, fecha_factura = ?, tipo_pago = ?, direccion = ?
                WHERE id_factura_cliente = ?';
        $params = array($this->cliente,$this->total,$this->fecha,$this->pago,$this->direccion,$this->id_factura);
        return Conexion::executeRow($sql, $params);
    }

    public function deleteFacturas()
    {
        $sql = 'DELETE FROM factura
                WHERE id_factura_cliente = ?';
        $params = array($this->id_factura);
        return Conexion::executeRow($sql, $params);
    }

    public function obtenerPedidos()
    {
        $sql = 'SELECT DF.id_detalle_factura, P.nombre_producto, DF.cantidad_comprados, DF.precio_comprados
                FROM detalle_factura DF INNER JOIN productos P ON DF.id_productos = P.id_productos
                WHERE DF.id_factura = ? ';
                $params = array($this->id_factura);
        return Conexion::getRows($sql, $params);
    }

    /*
    *   Métodos para generar gráficas.
    */
    /*
    public function cantidadProductosCategoria()
    {
        $sql = 'SELECT nombre_categoria, COUNT(id_producto) cantidad
                FROM productos INNER JOIN categorias USING(id_categoria)
                GROUP BY id_categoria, nombre_categoria';
        $params = null;
        return Conexion::getRows($sql, $params);
    }*/
}
?>