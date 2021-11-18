<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
    class Estadousuario extends Validator
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

        public function setEstadoU($values)
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

        public function getEstadoU()
        {
            return $this->estado;
        }
    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
        public function createestadou()
        {
            $sql = 'INSERT into estado_usuario (estado_usuario) values(?)';
            $param = array($this->estado);
            return Conexion::executeRow($sql, $param);
        }

        public function readestadou()
        {
            $sql = 'SELECT id_estado_usuario, estado_usuario from estado_usuario order by id_estado_usuario';
            $param = null;
            return Conexion::getRows($sql, $param);
        }

        public function getestadousu()
        {
            $sql = 'SELECT id_estado_usuario, estado_usuario from estado_usuario where id_estado_usuario = ?';
            $param = array($this->id);
            return Conexion::getRow($sql, $param);
        }
        
        public function updateestadou()
        {
            $sql = 'Update estado_usuario set  estado_usuario = ? where id_estado_usuario = ?';
            $param = array($this->estado,$this->id);
            return Conexion::executeRow($sql, $param);
        }
        public function deleteestadou()
        {
            $sql = 'Delete from estado_usuario where id_estado_usuario = ?';
            $param = array($this->id);
            return Conexion::executeRow($sql, $param);
        }

        public function searchestadou($values)
        {
            $sql = 'SELECT id_estado_usuario, estado_usuario from estado_usuario where estado_usuario ilike ?';
            $param = array("%$values%");
            return Conexion::getRows($sql, $param);
        }
    }
?>