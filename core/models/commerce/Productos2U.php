<?php
/*
*	Creación de clase Productos2U que es heredada de Validator.
*/
class Productos2U extends Validator
{
    /*Creación de atributos a utilizar en la Clase Productos2U heredada de Validator.*/
    private $id = null;
    /*
    *   Métodos para dar un valor a los atributos(Setters).
    */
    public function setId($value)
    {
        if ( $this->validateNaturalNumber($value) ) {
            $this->id = $value;
            return true;
        } else {
            return false;
        }
    }

    /*
    *   Métodos que devuelven los valores de los atributos(Getters).
    */
    public function getId()
    {
        return $this->id;
    }

    /*Función que obtiene los ID y nombre de los tipos de producto que 
    tienen productos con cantidades
    mayor que 0 y con estado de productos en "En existencia"*/
    public function readIdProductos()
    {
        $sql = 'SELECT DISTINCT(T.ID_TIPO_PRODUCTO), T.TIPO_PRODUCTO FROM PRODUCTOS P
                INNER JOIN ESTADO_PRODUCTOS EP USING (ID_ESTADO_PRODUCTO)
                INNER JOIN TIPO_PRODUCTOS T USING (ID_TIPO_PRODUCTO)
                WHERE P.CANTIDAD_PRODUCTO > 0 AND P.ID_ESTADO_PRODUCTO IN( 1 )
                ORDER BY T.ID_TIPO_PRODUCTO;';
        $params = null;
        return Conexion::getRows($sql, $params);
    }

    /*Función que obtiene los detalles de los productos que pertenecen a 
    un tipo de producto segun su ID y que la cantidad de producto sea mayor que 0 y
    con estado de productos en "En existencia"*/
    public function readProductos()
    {
        $sql = 'SELECT P.ID_PRODUCTOS, P.NOMBRE_PRODUCTO, P.IMAGEN, M.MARCAS, P.PRECIO, T.PROMOCION FROM PRODUCTOS P
                INNER JOIN ESTADO_PRODUCTOS EP USING (ID_ESTADO_PRODUCTO)
                INNER JOIN MARCAS M USING (ID_MARCAS)
                INNER JOIN TIPO_PRODUCTOS T USING (ID_TIPO_PRODUCTO)
                WHERE P.CANTIDAD_PRODUCTO > 0 AND P.ID_ESTADO_PRODUCTO IN( 1 ) AND T.ID_TIPO_PRODUCTO = ?
                ORDER BY P.ID_PRODUCTOS;';
        $params = array($this->id);
        return Conexion::getRows($sql, $params);
    }
}
?>