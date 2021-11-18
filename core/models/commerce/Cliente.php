<?php
    /*Creación de la clase Clientes que hereda de la clase Validator*/
    class Clientes extends Validator
    {
        /*Creación de los atributos de la clase Clientes heredada de Validator*/
        private $id = null;
        private $nombre = null;
        private $apellido =  null;
        private $correo = null;
        private $usuario = null;
        private $contrasena = null;
        private $estado = null;
        /*Creación de los getter y setters, que se validan los datos de entrada 
        de la clase Clientes heredada de Validator*/
        public function setId($values)
        {
            if( $this->validateId($values) ) {
                $this->id = $values;
                return true ;
            } else {
                return false;
            }
        }

        public function getId()
        {
            return $this->id;
        }

        public function setEstado($values)
        {
            if( $this->validateId($values) ) {
                $this->estado = $values;
                return true ;
            } else {
                return false;
            }
        }

        public function getEstado()
        {
            return $this->estado;
        }

        public function setNombre($values)
        {
            if( $this->validateAlphabetic($values, 1, 50) ) {
                $this->nombre = $values;
                return true;
            } else {
                return false;
            }
        }

        public function getNombre()
        {
            return $this->nombre;
        }
        
        public function setApellido($values)
        {
            if( $this->validateAlphabetic($values, 1, 50) ) {
                $this->apellido = $values;
                return true;
            } else {
                return false;
            }
        }

        public function getApellido()
        {
            return $this->apellido;
        }

        public function setCorreo($values)
        {
            if( $this->validateEmail($values) ) {
                $this->correo = $values;
                return true;
            } else {
                return false;
            }
        }

        public function getCorreo()
        {
            return $this->correo;
        }
        
        public function setUsuario($values)
        {
            if( $this->validateAlphanumeric($values, 8, 50) ) {
                $this->usuario = $values;
                return true;
            } else {
                return false;
            }
        }

        public function getUsuario()
        {
            return $this->usuario;
        }
        
        public function setContrasena($values)
        {
            if( $this->validatePassword($values) ) {
                $this->contrasena = $values;
                return true;
            } else {
                return false;
            }
        }

        public function getContrasena()
        {
            return $this->contrasena;
        }

        /*Métodos para gestionar la cuenta del cliente*/
        //Funcion para verificar usuario
        public function checkCliente($usuario)
        {
            $sql = 'SELECT id_cliente from cliente where usuario_cliente= ?';
            $params = array($usuario);
            if ( $data = Conexion::getRow($sql, $params) ) {
                $this->id = $data['id_cliente'];
                $this->usuario = $usuario;
                return true;
            } else {
                return false;
            }
        }
        //Funcion para verificar contraseña
        public function checkPassword($contrasena)
        {
            $sql = 'SELECT contrasena_cliente from cliente where id_cliente = ?';
            $params = array($this->id);
            $data = Conexion::getRow($sql, $params);
            if ( password_verify($contrasena, $data['contrasena_cliente']) ) {
                return true;
            } else {
                return false;
            }
        }
  
       /*Creación del método para registrar clientes 
       de la clase Clientes heredada de Validator*/
       public function Register()
        {
            $hash = password_hash($this->contrasena, PASSWORD_DEFAULT);
            $sql = 'INSERT into cliente(nombre_cliente,apellido_cliente,correo_cliente,usuario_cliente,contrasena_cliente,id_estado_cliente) 
            values(?,?,?,?,?,2)';
            $param = array($this->nombre,$this->apellido,$this->correo,$this->usuario,$hash);
            return Conexion::executeRow($sql, $param);
        }
        /*Creación del método para obtener clientes 
       de la clase Clientes heredada de Validator*/
        public function getCliente()
        {
            $sql = 'SELECT id_cliente,nombre_cliente,apellido_cliente,correo_cliente,usuario_cliente,contrasena_cliente,id_estado_cliente from cliente where id_cliente = ?';
            $param = array($this->id);
            return Conexion::getRow($sql, $param);
        }

        public function changePassword()
        {
        $hash = password_hash($this->contrasena, PASSWORD_DEFAULT);
        $sql = 'UPDATE cliente SET contrasena_cliente = ? WHERE id_cliente = ?';
        $params = array($hash, $this->id);
        return Conexion::executeRow($sql, $params);
        }
    }
?>