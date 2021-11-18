<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
    class Tipousuario extends Validator
    {
    // Declaración de atributos (propiedades).
        private $id = null;
        private $tipo = null;
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

        public function setTipoUsuario($values)
        {
            if($this->validateAlphabetic($values, 1, 50))
            {
                $this->tipo = $values;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getTipoUsuario()
        {
            return $this->tipo;
        }

        public function getId()
        {
            return $this->id;
        }
    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
        public function inserttipousuario()
        {
            $sql = 'INSERT into tipo_usuario (tipo_usuario)values (?)';
            $param = array($this->tipo);
            return Conexion::executeRow($sql, $param);
        }

        public function readtipousuario()
        {
            $sql =  'SELECT id_tipo_usuario, tipo_usuario from tipo_usuario order by id_tipo_usuario';
            $param = null;
            return Conexion::getRows($sql, $param);
        }

        public function updatetipousuario()
        {
            $sql = 'UPDATE tipo_usuario set tipo_usuario = ? where id_tipo_usuario = ?';
            $param = array($this->tipo,$this->id);
            return Conexion::executeRow($sql, $param);
        }

        public function gettipou()
        {
            $sql = 'SELECT id_tipo_usuario, tipo_usuario from tipo_usuario where id_tipo_usuario = ?';
            $param = array($this->id);
            return Conexion::getRow($sql, $param);      
        }

        public function deletetipousuario()
        {
            $sql = 'DELETE from tipo_usuario where id_tipo_usuario = ?';
            $param = array($this->id);
            return Conexion::executeRow($sql, $param);
        }

        public function searchtipousuario($values)
        {

            $sql = 'SELECT id_tipo_usuario, tipo_usuario from tipo_usuario where tipo_usuario ilike ?';
            $param = array("%$values%");
            return Conexion::getRows($sql, $param);
        }
    }
?>