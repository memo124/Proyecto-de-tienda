<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Clientes extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_cliente = null;
    private $nombre = null;
    private $apellido = null;
    private $correo = null;
    private $usuario = null;
    private $contrasena = null;
    private $estado = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_cliente = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setNombre($value)
    {
        if ($this->validateAlphabetic($value, 2, 50)) {
            $this->nombre = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setApellido($value)
    {
        if ($this->validateAlphabetic($value, 2, 50)) {
            $this->apellido = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setCorreo($value)
    {
        if ($this->validateEmail($value)) {
            $this->correo = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setUsuario($value)
    {
        if ($this->validateAlphanumeric($value, 8, 50)) {
            $this->usuario = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setContrasena($value)
    {
        if ($this->validatePassword($value)) {
            $this->contrasena = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value)
    {
        if ($this->validateNaturalNumber($value)) {
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
        return $this->id_cliente;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function getEstado()
    {
        return $this->estado;
    }


    //metodo para verificar la contraseña del cliente
    public function checkPassword($password)
    {
        $sql = 'SELECT contrasena_cliente FROM cliente WHERE id_cliente = ?';
        $params = array($this->id_cliente);
        $data = Conexion::getRow($sql, $params);
        if (password_verify($password, $data['contrasena_cliente'])) {
            return true;
        } else {
            return false;
        }
    }
    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function buscarClientes($value)
    {
        $sql = 'SELECT C.id_cliente, C.nombre_cliente, C.apellido_cliente, C.correo_cliente, C.usuario_cliente, E.estado_cliente
                FROM cliente C INNER JOIN estado_cliente E
                ON C.id_estado_cliente = E.id_estado_cliente
                WHERE C.nombre_cliente ILIKE ? OR C.apellido_cliente ILIKE ? OR
                      C.correo_cliente ILIKE ? OR C.usuario_cliente ILIKE ? OR
                      E.estado_cliente ILIKE ?';
        $params = array("%$value%","%$value%","%$value%","%$value%","%$value%");
        return Conexion::getRows($sql, $params);
    }

    public function createClientes()
    {
        $hash = password_hash($this->contrasena, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO cliente( nombre_cliente, apellido_cliente, correo_cliente, usuario_cliente, contrasena_cliente, id_estado_cliente )
                VALUES( ?, ?, ?, ?, ?, ?)';
        $params = array($this->nombre,$this->apellido,$this->correo,$this->usuario, $hash, $this->estado);
        return Conexion::executeRow($sql, $params);
    }

    public function readAllClientes()
    {
        $sql = 'SELECT C.id_cliente, C.nombre_cliente, C.apellido_cliente, C.correo_cliente, C.usuario_cliente, E.estado_cliente
                FROM cliente C INNER JOIN estado_cliente E
                ON C.id_estado_cliente = E.id_estado_cliente
                ORDER BY C.id_cliente';
        $params = null;
        return Conexion::getRows($sql, $params);
    }

    public function readOneClientes()
    {
        $sql = 'SELECT id_cliente, nombre_cliente, apellido_cliente, correo_cliente, id_estado_cliente
                FROM cliente 
                WHERE id_cliente = ?';
                $params = array($this->id_cliente);
        return Conexion::getRow($sql, $params);
    }

    public function updateClientes()
    {
        $sql = 'UPDATE cliente
                SET nombre_cliente = ?, apellido_cliente = ?,
                    correo_cliente = ?, id_estado_cliente = ?
                WHERE id_cliente = ?';
        $params = array($this->nombre, $this->apellido, $this->correo, $this->estado, $this->id_cliente);
        return Conexion::executeRow($sql, $params);
    }

    public function deleteClientes()
    {
        $sql = 'DELETE FROM cliente
                WHERE id_cliente = ?';
        $params = array($this->id_cliente);
        return Conexion::executeRow($sql, $params);
    }

    public function obtenerPedidos()
    {
        $sql = 'SELECT F.id_factura_cliente, C.nombre_cliente, F.fecha_factura, F.direccion, P.nombre_producto, DF.cantidad_comprados, F.total_factura, F.tipo_pago FROM factura F
                INNER JOIN detalle_factura DF ON F.id_factura_cliente = DF.id_factura 
                INNER JOIN productos P ON DF.id_productos = P.id_productos
                INNER JOIN cliente C ON F.id_cliente = C.id_cliente
                WHERE F.id_cliente = ?;';
                $params = array($this->id_cliente);
        return Conexion::getRows($sql, $params);
    }

    // Metodo para obtener el cliente agrupandolo por el estado
    public function readEstadoClientes()
    {
        $sql = 'SELECT nombre_cliente, apellido_cliente, correo_cliente, usuario_cliente, estado_cliente from cliente 
        inner join estado_cliente using(id_estado_cliente)
        where id_estado_cliente = ?
        group by id_estado_cliente, nombre_cliente, apellido_cliente, correo_cliente, usuario_cliente, estado_cliente';
        $params = array($this->estado);
        return Conexion::getRows($sql, $params);
    }

}
?>