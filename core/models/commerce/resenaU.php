<?php
/*
*	Se crea la clase ResenaU que maneja resena de la base de datos
    y es heredada de la clase Validator
*/
class ResenaU extends Validator
{
    // Declaración de atributos que utilizará la clase ResenaU.
    private $id_detalle = null;
    private $comentario = null;
    private $clasificacion = null;
    private $id_cliente = null;

    /*
    *   Métodos que otorgan valores a los atributos(Setters).
    */
    public function setId($value)
    {
        if ( $this->validateNaturalNumber($value) ) {
            $this->id_detalle = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setComentario($value)
    {
        if ( $this->validateAlphanumeric($value, 1, 100) ) {
            $this->comentario = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setClasificacion($value)
    {
        if( $this->validateNaturalNumber($value) ) {
            $this->clasificacion = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setIdCliente($value)
    {
        if( $this->validateNaturalNumber($value) ) {
            $this->id_cliente = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos para devolver los valores de los atributos(Getters).
    */
    public function getId()
    {
        return $this->id_detalle;
    }

    public function getComentario()
    {
        return $this->comentario;
    }

    public function getClasificacion()
    {
        return $this->clasificacion;
    }

    /*
    *   Métodos para realizar las operaciones create y read de la tabla resena y detalle_factura.
    */
    
    // Método para agregar una reseña de algun producto comprado.
    public function createResena()
    {
        $sql = "INSERT INTO resena (comentario,clasificacion, id_detalle_factura, estado_comentario)
                    VALUES(?,?, ?, 'Activo')";
        $params = array($this->comentario, $this->clasificacion,$this->id_detalle);
        return Conexion::executeRow($sql, $params);
    }

    // Método para obtener los productos comprados de un cliente
    public function readResena()
    {
        $sql = 'SELECT df.id_detalle_factura, p.imagen,f.fecha_factura, p.nombre_producto, m.marcas, tp.tipo_producto 
        from detalle_factura df
        inner join factura f on f.id_factura_cliente = df.id_factura
        inner join productos p on p.id_productos = df.id_productos
        inner join marcas m on m.id_marcas = p.id_marcas
        inner join tipo_productos tp on tp.id_tipo_producto = p.id_tipo_producto
        where f.id_cliente = ? and f.id_estado_factura IN ( 4 ) ;';
        $params = array($this->id_cliente);
        return Conexion::getRows($sql, $params);
    }

}
?>