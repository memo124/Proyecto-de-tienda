<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Usuario extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombre = null;
    private $apellido = null;
    private $email = null;
    private $usuario = null;
    private $contrasena = null;
    private $estado = null;
    private $tipo = null;
    private $codigo = null;
    private $codigoo = null;
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

        public function getId()
        {
            return $this->id;
        }

        public function getCodigo()
        {
            return $this->codigo;
        }

        public function getCodigoo()
        {
            return $this->codigoo;
        }

        public function setCodigo($values)
        {
            if($this->validateId($values)){
                $this->codigo = $values;
                return true ;
            }
            else
            {
                return false;
            }
        }

        public function setCodigoo($values)
        {
            if($this->validateId($values)){
                $this->codigoo = $values;
                return true ;
            }
            else
            {
                return false;
            }
        }

        public function setNombre($values)
        {
            if($this->validateAlphabetic($values, 1, 50))
            {
                $this->nombre = $values;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getNombre()
        {
            return $this->nombre;
        }
        
        public function setApellido($values)
        {
            if($this->validateAlphabetic($values, 1, 50))
            {
                $this->apellido = $values;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getApellido()
        {
            return $this->apellido;
        }

        public function setCorreo($values)
        {
            if($this->validateEmail($values))
            {
                $this->email = $values;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getCorreo()
        {
            return $this->email;
        }
        
        public function setUsuario($values)
        {
            if($this->validateAlphanumeric($values, 1, 50))
            {
                $this->usuario = $values;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getUsuario()
        {
            return $this->usuario;
        }
        
        public function setContrasena($values)
        {
            if($this->validatePassword($values))
            {
                $this->contrasena = $values;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getContrasena()
        {
            return $this->contrasena;
        }

        
        public function setEstado($value)
        {
            if($this->validateId($value))
            {
                $this->estado = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getEstado()
        {
            return $this->estado;
        }

        
        public function setTipo($value)
        {
            if($this->validateId($value))
            {
                $this->tipo = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getTipo()
        {
            return $this->tipo;
        }

        /*
    *   Métodos para gestionar la cuenta del usuario.
    */
    public function checkAlias($usuario)
    {
        $sql = 'SELECT id_usuario FROM usuario WHERE usuario = ?';
        $params = array($usuario);
        if ($data = Conexion::getRow($sql, $params)) {
            $this->id = $data['id_usuario'];
            $this->usuario = $usuario;
            return true;
        } else {
            return false;
        }
    }

    public function checkPassword($contrasena)
    {
        $sql = 'SELECT contrasena_usuario FROM usuario WHERE id_usuario = ?';
        $params = array($this->id);
        $data = Conexion::getRow($sql, $params);
        if (password_verify($contrasena, $data['contrasena_usuario'])) {
            return true;
        } else {
            return false;
        }
    }
    
    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
        public function createusuario(){
            $hash = password_hash($this->contrasena, PASSWORD_DEFAULT);
            $sql = 'INSERT into usuario(nombre_usuario,apellido_usuario,usuario,correo,id_estado_usuario,id_tipo_usuario,contrasena_usuario)
            values(?,?,?,?,?,?,?)';
            $param = array($this->nombre,$this->apellido,$this->usuario,$this->email,$this->estado,$this->tipo, $hash);
            return Conexion::executeRow($sql, $param);
        }

        public function deleteusuario()
        {
            $sql = 'DELETE from usuario where id_usuario = ?';
            $param = array($this->id);
            return Conexion::executeRow($sql, $param);
        }

        public function getusuariou()
        {
            $sql = 'SELECT id_usuario,nombre_usuario,apellido_usuario,correo,id_estado_usuario,id_tipo_usuario
                    from usuario  
                    where id_usuario = ?';
            $param = array($this->id);
            return Conexion::getRow($sql, $param);
        }

        public function readusuario()
        {
            $sql = 'SELECT id_usuario,nombre_usuario,apellido_usuario,usuario,correo,estado_usuario,tipo_usuario  
            from usuario u inner join estado_usuario e on u.id_estado_usuario = e.id_estado_usuario 
            inner join tipo_usuario t on u.id_tipo_usuario = t.id_tipo_usuario order by nombre_usuario';
            $param = null;
            return Conexion::getRows($sql, $param);
        }

        public function searchusuario($value)
        {
            $sql = 'SELECT id_usuario,nombre_usuario,apellido_usuario,usuario,correo,estado_usuario,tipo_usuario  
            from usuario u inner join estado_usuario e on u.id_estado_usuario = e.id_estado_usuario 
            inner join tipo_usuario t on u.id_tipo_usuario = t.id_tipo_usuario where nombre_usuario ilike ? 
            or apellido_usuario ilike ? or usuario ilike ? or estado_usuario ilike ? or tipo_usuario ilike ? order by id_usuario';
            $param = array("%$value%","%$value%","%$value%","%$value%","%$value%");
            return Conexion::getRows($sql, $param);
        }

        public function updateusuario()
        {
            $sql = 'UPDATE usuario set nombre_usuario = ?,apellido_usuario = ?,correo = ?,id_estado_usuario = ?,id_tipo_usuario = ? where id_usuario = ?';
            $param = array($this->nombre,$this->apellido,$this->email,$this->estado,$this->tipo,$this->id);
            return Conexion::getRows($sql, $param);
        }
        
        // Metodo para leer el tipo de usuario y agruparlo por el tipo
        public function readTipoUsu()
        {
            $sql = 'SELECT nombre_usuario, apellido_usuario, correo, usuario, estado_usuario, tipo_usuario from usuario
            inner join tipo_usuario using(id_tipo_usuario)
            inner join estado_usuario using(id_estado_usuario)
            where id_tipo_usuario = ?
            group by id_tipo_usuario, nombre_usuario, apellido_usuario, correo, usuario, estado_usuario, tipo_usuario';
            $param = array($this->tipo);
            return Conexion::getRows($sql, $param);
        }

        //Metodo para leer el estado de usuario y agruparlo por el estado
        public function readEstadoUsuario()
        {
            $sql = 'SELECT nombre_usuario, apellido_usuario, correo, usuario, estado_usuario, tipo_usuario from usuario
            inner join tipo_usuario using(id_tipo_usuario)
            inner join estado_usuario using(id_estado_usuario)
            where id_estado_usuario = ?
            group by id_estado_usuario, nombre_usuario, apellido_usuario, correo, usuario, estado_usuario, tipo_usuario';
            $param = array($this->estado);
            return Conexion::getRows($sql, $param);
        }

        //Metodo para obtener el usuario completo realizando un listado
        public function checkUsuario()
        {
            $sql = 'SELECT nombre_usuario, apellido_usuario, correo, usuario, estado_usuario, tipo_usuario from usuario
            inner join tipo_usuario using(id_tipo_usuario)
            inner join estado_usuario using(id_estado_usuario)
            Where id_usuario = ?
            group by id_tipo_usuario, nombre_usuario, apellido_usuario, correo, usuario, estado_usuario, tipo_usuario
            order by nombre_usuario';
        $params = array($this->id);
        return Conexion::getRow($sql, $params);
        }

        public function changePassword()
        {
        $hash = password_hash($this->contrasena, PASSWORD_DEFAULT);
        $sql = 'UPDATE usuario SET contrasena_usuario = ? WHERE id_usuario = ?';
        $params = array($hash, $this->id);
        return Conexion::executeRow($sql, $params);
        }

        public function verificarCuenta()
        {
        $sql = 'SELECT correo , usuario , contrasena_usuario FROM USUARIO WHERE USUARIO = ? AND CORREO = ?';
        $params = array($this->usuario , $this->email);
        if ($data = Conexion::getRow($sql, $params)) {
            $this->usuario = $data['usuario'];
            $this->email = $data['correo'];
            $this->contrasena = $data['contrasena_usuario'];
            return true;
        } else {
            return false;
        }
        }

        public function enviarCorreo( $correo , $nombreusuario )
        {
            $this->codigo = rand(100000 , 999999);
            $this->codigoo = $this->codigo;
            $receptor = $correo;
            $asunto = 'Código de confirmación';
            $mensaje = 'Hola '.$nombreusuario.', el código es: '.$this->codigo.' deja de olvidar las mierd4s, ponete a estudiar bicho cerot3';
            $encabezados = 'From: fatimacarrillo300@gmail.com' . "\r\n" .
                'Reply-To: fatimacarrillo300@gmail.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            mail( $receptor , $asunto , $mensaje , $encabezados );
        }
/*
        ; For Win32 only.
; http://php.net/smtp
SMTP=localhost
; http://php.net/smtp-port
smtp_port=25

; For Win32 only.
; http://php.net/sendmail-from
;sendmail_from = me@example.com

; For Unix only.  You may supply arguments as well (default: "sendmail -t -i").
; http://php.net/sendmail-path
;sendmail_path =
*/
}
?>