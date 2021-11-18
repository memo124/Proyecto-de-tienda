<?php
    /*Creación de la clase Index que hereda de la clase Validator*/
    class Index extends Validator
    {
        /*Métodos para obtener los datos de los productos y las marcas*/

        /*Funcion para obtener los productos con estado en existencia
        y con cantidad de producto mayor que 0*/
        public function mostrarProductos()
        {
            $sql = 'SELECT M.MARCAS, P.NOMBRE_PRODUCTO, P.IMAGEN, T.PROMOCION, P.PRECIO FROM MARCAS M
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
    }
?>