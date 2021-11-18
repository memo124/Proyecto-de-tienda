<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
    class Tipoproducto extends Validator
    {
    // Declaración de atributos (propiedades).
        private $id = null;
        private $tipo = null;
        private $promocion = null;
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

        public function setTipoProducto($values)
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

        public function getTipoProducto()
        {
            return $this->tipo;
        }

        public function setPromocion($values)
        {
            if ($this->validateId($values)) {
                $this->promocion = $values;
                return true;
            }
            else{
                return false;
            }
        }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
        public function createtipoproducto()
        {
            $sql = 'INSERT into tipo_productos (tipo_producto, promocion) values(?,?)';
            $param = array($this->tipo,$this->promocion);
            return Conexion::executeRow($sql, $param);
        }

        public function readtipoproducto()
        {
            $sql = 'SELECT id_tipo_producto, tipo_producto, promocion from tipo_productos order by id_tipo_producto';
            $param = null;
            return Conexion::getRows($sql, $param);
        }

        public function gettipoP()
        {
            $sql = 'SELECT id_tipo_producto, tipo_producto, promocion from tipo_productos where id_tipo_producto = ?';
            $param = array($this->id);
            return Conexion::getRow($sql, $param);
        }
        
        public function updatetipoproducto()
        {
            $sql = 'Update tipo_productos set  tipo_producto = ?, promocion = ? where id_tipo_producto = ?';
            $param = array($this->tipo,$this->promocion,$this->id);
            return Conexion::executeRow($sql, $param);
        }
        public function deletetipoproducto()
        {
            $sql = 'Delete from tipo_productos where id_tipo_producto = ?';
            $param = array($this->id);
            return Conexion::executeRow($sql, $param);
        }

        public function searchtipoproducto($values)
        {
            $sql = 'SELECT id_tipo_producto, tipo_producto, promocion from tipo_productos where tipo_producto ilike ?';
            $param = array("%$values%");
            return Conexion::getRows($sql, $param);
        }


    }
?>