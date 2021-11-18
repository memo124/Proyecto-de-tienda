<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Estados extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_estado = null;
    private $estado = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_estado = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value)
    {
        if ($this->validateAlphabetic($value, 2, 50)) {
            $this->estado = $value;
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
        return $this->id_estado;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function buscarEstados($value)
    {
        $sql = 'SELECT id_estado_cliente, estado_cliente
                FROM estado_cliente
                WHERE estado_cliente ILIKE ?';
        $params = array("%$value%");
        return Conexion::getRows($sql, $params);
    }

    public function createEstado()
    {
        $sql = 'INSERT INTO estado_cliente( estado_cliente )
                VALUES( ? )';
        $params = array($this->estado);
        return Conexion::executeRow($sql, $params);
    }

    public function readAllEstados()
    {
        $sql = 'SELECT id_estado_cliente, estado_cliente
                FROM estado_cliente
                ORDER BY id_estado_cliente';
        $params = null;
        return Conexion::getRows($sql, $params);
    }

    public function readOneEstado()
    {
        $sql = 'SELECT id_estado_cliente, estado_cliente
                FROM estado_cliente
                WHERE id_estado_cliente = ?';
        $params = array($this->id_estado);
        return Conexion::getRow($sql, $params);
    }

    public function updateEstado()
    {
        $sql = 'UPDATE estado_cliente
                SET estado_cliente = ?
                WHERE id_estado_cliente = ?';
        $params = array($this->estado, $this->id_estado);
        return Conexion::executeRow($sql, $params);
    }

    public function deleteEstado()
    {
        $sql = 'DELETE FROM estado_cliente
                WHERE id_estado_cliente = ?';
        $params = array($this->id_estado);
        return Conexion::executeRow($sql, $params);
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