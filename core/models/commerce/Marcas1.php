<?php
    /*Creación de la clase Marcas1 que hereda de la clase Validator*/
    class Marcas1 extends Validator {
        /** Funciones de la clase marcas1*/
        
        /*Funcion para obtener todas las marcas con su número de productos que tengan una cantidad mayor a 0
        y estado En existencia*/
        public function readAllMarca1(){
            $sql =  'SELECT M.ID_MARCAS, M.MARCAS, COUNT(P.ID_MARCAS) as productospormarca, M.IMAGEN_MARCA FROM MARCAS M
            INNER JOIN PRODUCTOS P ON M.ID_MARCAS = P.ID_MARCAS 
            WHERE P.CANTIDAD_PRODUCTO >0 AND P.id_estado_producto = 1
            GROUP BY M.ID_MARCAS ORDER BY M.ID_MARCAS;';
            $param = null;
            return Conexion::getRows( $sql, $param );
        }

        /*Funcion para buscar las marcas con su número de productos que tengan una cantidad mayor a 0
        y estado En existencia*/
        public function searchMarca1($value)
        {
        $sql = 'SELECT M.ID_MARCAS, M.MARCAS, COUNT(P.ID_MARCAS) as productospormarca, M.IMAGEN_MARCA FROM MARCAS M
        INNER JOIN PRODUCTOS P ON M.ID_MARCAS = P.ID_MARCAS WHERE M.MARCAS ILIKE ? AND P.CANTIDAD_PRODUCTO >0 AND P.id_estado_producto = 1
        GROUP BY M.ID_MARCAS ORDER BY M.ID_MARCAS;';
        $params = array("%$value%");
        return Conexion::getRows($sql, $params);
        }
    }
?>