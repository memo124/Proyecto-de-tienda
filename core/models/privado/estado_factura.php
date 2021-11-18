<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
    class Estado extends Validator
    {
    // Declaración de atributos (propiedades).
        private $id = null;
        private $estado = null;
    /*
    *   Métodos para asignar valores a los atributos.
    */
        public function setId($values)
        {
            if($this->validateId($values)){
                $this->id = $values;
                return true ;
            }
            else
            {
                return false;
            }
        }

        public function setEstado($values)
        {
            if($this->validateAlphabetic($values, 1, 50))
            {
                $this->estado = $values;
                return true;
            }
            else
            {
                return false;
            }
        }
        //Metodos para 
        public function getEstadoU()
        {
            return $this->estado;
        }
    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
        public function createestado()
        {
            $sql = 'INSERT into estado_factura (estado_factura) values(?)';
            $param = array($this->estado);
            return Conexion::executeRow($sql, $param);
        }

        public function readestado()
        {
            $sql = 'SELECT id_estado_factura, estado_factura from estado_factura order by id_estado_factura';
            $param = null;
            return Conexion::getRows($sql, $param);
        }

        public function getestado()
        {
            $sql = 'SELECT id_estado_factura, estado_factura from estado_factura where id_estado_factura = ?';
            $param = array($this->id);
            return Conexion::getRow($sql, $param);
        }
        
        public function updateestado()
        {
            $sql = 'UPDATE estado_factura set  estado_factura = ? where id_estado_factura = ?';
            $param = array($this->estado,$this->id);
            return Conexion::executeRow($sql, $param);
        }
        public function deleteestado()
        {
            $sql = 'DELETE from estado_factura where id_estado_factura = ?';
            $param = array($this->id);
            return Conexion::executeRow($sql, $param);
        }

        public function searchestado($values)
        {
            $sql = 'SELECT id_estado_factura, estado_factura from estado_factura where estado_factura ilike ?';
            $param = array("%$values%");
            return Conexion::getRows($sql, $param);
        }
    }
?>