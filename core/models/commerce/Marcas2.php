<?php
/*
*	Creación de clase Marcas2 que es heredada de Validator.
*/
class Marcas2 extends Validator
{
    /*Creación de atributos a utilizar en la Clase Marcas2 heredada de Validator.*/
    private $id = null;
    /*
    *   Métodos para otorgar valor a los atributos(Setters).
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
    *   Métodos que retornan los valores de los atributos(Getters).
    */
    public function getId()
    {
        return $this->id;
    }

    /*Función que obtiene los ID y nombre de las marcas que tienen productos con cantidades
    mayor que 0 y con estado de productos en "En existencia"*/
    public function readIdMarcas()
    {
        $sql = 'SELECT DISTINCT(M.ID_MARCAS), M.MARCAS FROM MARCAS M
                INNER JOIN PRODUCTOS P ON M.ID_MARCAS = P.ID_MARCAS
                INNER JOIN ESTADO_PRODUCTOS EP ON P.ID_ESTADO_PRODUCTO = EP.ID_ESTADO_PRODUCTO
                WHERE P.CANTIDAD_PRODUCTO > 0 AND P.ID_ESTADO_PRODUCTO IN ( 1 )
                ORDER BY M.ID_MARCAS;';
        $params = null;
        return Conexion::getRows($sql, $params);
    }

    /*Función que obtiene los detalles de los productos que pertenecen a una marca segun su ID
    y que la cantidad de producto sea mayor que 0 y con estado de productos en "En existencia"*/
    public function readProductos()
    {
        $sql = 'SELECT P.NOMBRE_PRODUCTO, T.TIPO_PRODUCTO, P.IMAGEN, P.PRECIO, T.PROMOCION FROM MARCAS M
                INNER JOIN PRODUCTOS P ON P.ID_MARCAS = M.ID_MARCAS
                INNER JOIN TIPO_PRODUCTOS T ON P.ID_TIPO_PRODUCTO = T.ID_TIPO_PRODUCTO
                INNER JOIN ESTADO_PRODUCTOS EP ON P.ID_ESTADO_PRODUCTO = EP.ID_ESTADO_PRODUCTO
                WHERE P.CANTIDAD_PRODUCTO > 0 AND M.ID_MARCAS= ? AND P.ID_ESTADO_PRODUCTO IN ( 1 )
                ORDER BY M.MARCAS;';
        $params = array($this->id);
        return Conexion::getRows($sql, $params);
    }
}
?>