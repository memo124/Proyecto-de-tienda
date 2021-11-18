<?php
    /*Creación de la clase Producto1 que hereda de la clase Validator*/
    class Producto1 extends Validator
    {
        /** Funciones de la clase Producto1*/
        
        /*Funcion para obtener todos los productos que tengan una cantidad mayor a 0
        y estado En existencia*/
        public function readAllProducto1(){
            $sql =  'SELECT P.ID_PRODUCTOS, P.NOMBRE_PRODUCTO, P.PRECIO, P.CANTIDAD_PRODUCTO, P.IMAGEN, M.MARCAS, T.TIPO_PRODUCTO, T.PROMOCION
            FROM PRODUCTOS P INNER JOIN MARCAS M ON P.ID_MARCAS = M.ID_MARCAS
            INNER JOIN TIPO_PRODUCTOS T ON P.ID_TIPO_PRODUCTO = T.ID_TIPO_PRODUCTO 
            WHERE P.CANTIDAD_PRODUCTO > 0 AND P.id_estado_producto = 1;';
            $param = null;
            return Conexion::getRows( $sql, $param );
        }

        /*Funcion para buscar productos que tengan una cantidad mayor a 0
        y estado En existencia*/
        public function searchProducto1($value)
    {
        $sql = 'SELECT P.ID_PRODUCTOS, P.NOMBRE_PRODUCTO, P.PRECIO, P.CANTIDAD_PRODUCTO, P.IMAGEN, M.MARCAS, T.TIPO_PRODUCTO, T.PROMOCION
        FROM PRODUCTOS P INNER JOIN MARCAS M ON P.ID_MARCAS = M.ID_MARCAS
        INNER JOIN TIPO_PRODUCTOS T ON P.ID_TIPO_PRODUCTO = T.ID_TIPO_PRODUCTO 
        WHERE (P.NOMBRE_PRODUCTO ILIKE ? OR T.TIPO_PRODUCTO ILIKE ? OR M.MARCAS ILIKE ?) AND P.CANTIDAD_PRODUCTO > 0 AND P.id_estado_producto = 1;';
        $params = array("%$value%","%$value%","%$value%");
        return Conexion::getRows($sql, $params);
    }
    }
?>