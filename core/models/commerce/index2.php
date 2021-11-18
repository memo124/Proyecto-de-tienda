<?php
    /*Creación de la clase Index que hereda de la clase Validator*/
    class Index2 extends Validator
    {
        /*Creación de atributos a utilizar en la Clase Index2 heredada de Validator.*/
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

        /*Métodos para obtener los datos de los productos y las marcas*/

        /*Funcion para obtener los productos con estado en existencia
        y con cantidad de producto mayor que 0*/
        public function mostrarProductos()
        {
            $sql = 'SELECT P.ID_PRODUCTOS, M.MARCAS, P.NOMBRE_PRODUCTO, P.IMAGEN, T.PROMOCION, P.PRECIO FROM MARCAS M
                    INNER JOIN PRODUCTOS P ON M.ID_MARCAS = P.ID_MARCAS
                    INNER JOIN ESTADO_PRODUCTOS EP ON P.ID_ESTADO_PRODUCTO = EP.ID_ESTADO_PRODUCTO
                    INNER JOIN TIPO_PRODUCTOS T ON T.ID_TIPO_PRODUCTO = P.ID_TIPO_PRODUCTO
                    WHERE P.CANTIDAD_PRODUCTO > 0 AND P.ID_ESTADO_PRODUCTO IN (1) 
                    ORDER BY P.ID_PRODUCTOS;';
            $params = null;
            return Conexion::getRows($sql, $params);
        }

        /*Funcion para obtener las marcas con productos con estado en existencia
        y con cantidad de producto mayor que 0, y la cantidad de productos de cada marca que cumplen las
        condiciones*/
        public function mostrarMarcas()
        {
            $sql = 'SELECT M.ID_MARCAS, M.MARCAS, M.IMAGEN_MARCA,COUNT(P.ID_MARCAS) AS productospormarca FROM MARCAS M
                    INNER JOIN PRODUCTOS P ON M.ID_MARCAS = P.ID_MARCAS
                    INNER JOIN ESTADO_PRODUCTOS EP ON P.ID_ESTADO_PRODUCTO = EP.ID_ESTADO_PRODUCTO
                    WHERE P.CANTIDAD_PRODUCTO > 0 AND P.ID_ESTADO_PRODUCTO IN ( 1 )
                    GROUP BY M.ID_MARCAS ORDER BY M.ID_MARCAS;';
            $params = null;
            return Conexion::getRows($sql, $params);
        }

        /*Función para obtener la cantidad, promocion y precio de un producto segun su ID*/
        public function readProductosCompra()
        {
            $sql = 'SELECT P.ID_PRODUCTOS, P.CANTIDAD_PRODUCTO, P.PRECIO, T.PROMOCION FROM PRODUCTOS P 
                    INNER JOIN TIPO_PRODUCTOS T USING( ID_TIPO_PRODUCTO ) 
                    WHERE P.ID_PRODUCTOS = ?;';
            $params = array($this->id);
            return Conexion::getRows($sql, $params);
        }
    }
?>