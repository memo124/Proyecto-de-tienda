<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Resenas extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_marca = null;
    private $producto = null;
    private $detalle = null;
    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_resena = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setEstado($value)
    {
        if ($this->validateBoolean($value)) {
            if($value==true){
                $this->estado="Activo";
            }else{
            $this->estado ="Inactivo";
            }
            return true;
        } else {
            return false;
        }
    }

    public function setProducto($value)
    {
        if($this->validateId($value))
            {
                $this->producto = $value;
                return true;
            }
            else
            {
                return false;
            }
    }
    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId()
    {
        return $this->id_resena;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    /*Método para buscar una reseña*/
    public function buscarResena($value)
    {
        $sql = 'SELECT R.id_resena, C.nombre_cliente, P.nombre_producto, R.clasificacion, R.comentario, R.estado_comentario
        FROM resena R INNER JOIN detalle_factura DF ON R.id_detalle_factura = DF.id_detalle_factura
        INNER JOIN productos P ON DF.id_productos = P.id_productos
        INNER JOIN factura F ON F.id_factura_cliente = DF.id_factura
        INNER JOIN cliente C ON F.id_factura_cliente = C.id_cliente
        WHERE C.nombre_cliente ILIKE ? OR P.nombre_producto ILIKE ? OR R.comentario ILIKE ? OR R.estado_comentario ILIKE ? ';
        $params = array("%$value%", "%$value%", "%$value%", "%$value%");
        return Conexion::getRows($sql, $params);
    }

    /*Método para leer todas las reseñas*/
    public function readAllResenas()
    {
        $sql = 'SELECT R.id_resena, C.nombre_cliente, P.nombre_producto, R.clasificacion, R.comentario, R.estado_comentario
                FROM resena R INNER JOIN detalle_factura DF ON R.id_detalle_factura = DF.id_detalle_factura
                INNER JOIN productos P ON DF.id_productos = P.id_productos
                INNER JOIN factura F ON F.id_factura_cliente = DF.id_factura
                INNER JOIN cliente C ON F.id_factura_cliente = C.id_cliente
                ORDER BY R.id_resena;';
        $params = null;
        return Conexion::getRows($sql, $params);
    }

    /*Método para obtener datos de una reseña*/
    public function readOneResena()
    {
        $sql = 'SELECT id_resena, estado_comentario
                FROM resena 
                WHERE id_resena = ?';
        $params = array($this->id_resena);
        return Conexion::getRow($sql, $params);
    }

    /*Método para actualizar reseñas*/
    public function updateResenas()
    {
        $sql = 'UPDATE resena
        SET estado_comentario = ?
        WHERE id_resena = ?';
        $params = array($this->estado, $this->id_resena);
        return Conexion::executeRow($sql, $params);
    }

    /*Método para eliminar reseñas*/
    public function deleteResena()
    {
        $sql = 'DELETE FROM resena
                WHERE id_resena = ?';
        $params = array($this->id_resena);
        return Conexion::executeRow($sql, $params);
    }

    /*Método para obtener las reseñas pertenecientes a un producto*/
    public function readEstadoResenas()
    {
        $sql = 'SELECT DISTINCT(id_resena), comentario ,clasificacion
        from resena
        INNER JOIN detalle_factura  using(id_detalle_factura)
        INNER JOIN productos  using(id_productos) 
        where id_productos = ?
        group by id_resena,comentario, clasificacion';
        $params = array($this->producto);
        return Conexion::getRows($sql, $params);
    }
}
?>