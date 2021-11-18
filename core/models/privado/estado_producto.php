<?php
    class EstadoProducto extends Validator
    {   
        //Creación de los atributos
        private $id = null;
        private $estadoproducto = null;

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

        //Creación de los setters y getters
        public function setEstadoProducto($values)
        {
            if($this->validateAlphabetic($values, 1, 50))
            {
                $this->estadoproducto = $values;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getEstadoProducto()
        {
            return $this->estadoproducto;
        }

        //todos los mantenimientos de la tabla estado_productos

        public function insertestadoproducto()
        {
            $sql = 'INSERT into estado_productos (estado_producto)values (?)';
            $param = array($this->estadoproducto);
            return Conexion::executeRow($sql, $param);
        }

        public function readestadoproducto()
        {
            $sql =  'SELECT id_estado_producto, estado_producto From estado_productos order by id_estado_producto';
            $param = null;
            return Conexion::getRows($sql, $param);
        }

        public function updateestadoproducto()
        {
            $sql = 'UPDATE estado_productos set estado_producto = ? where id_estado_producto = ?';
            $param = array($this->estadoproducto,$this->id);
            return Conexion::executeRow($sql, $param);
        }

        public function getestadop()
        {
            $sql = 'SELECT id_estado_producto, estado_producto from estado_productos where id_estado_producto = ?';
            $param = array($this->id);
            return Conexion::getRow($sql, $param);      
        }

        public function deleteestadoproducto()
        {
            $sql = 'delete from estado_productos where id_estado_producto = ?';
            $param = array($this->id);
            return Conexion::executeRow($sql, $param);
        }

        public function searchestadoproducto($values)
        {

            $sql = 'SELECT id_estado_producto,estado_producto from estado_productos where estado_producto ilike ?';
            $param = array("%$values%");
            return Conexion::getRows($sql, $param);
        }
    }
?>