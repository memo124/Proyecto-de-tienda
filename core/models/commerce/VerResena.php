<?php
    class Resena extends Validator
    {    
        /*Creación de atributos a utilizar en la Clase Resena que es heredada de Validator.*/
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
    
        //Funcion para leer el id de las resenas
        public function readId() {
            $sql =  "SELECT DISTINCT(P.ID_PRODUCTOS) ,P.NOMBRE_PRODUCTO, P.IMAGEN, M.MARCAS FROM PRODUCTOS P
            INNER JOIN DETALLE_FACTURA DF ON DF.ID_PRODUCTOS = P.ID_PRODUCTOS
            INNER JOIN RESENA R ON R.ID_DETALLE_FACTURA = DF.ID_DETALLE_FACTURA
            INNER JOIN MARCAS M ON P.ID_MARCAS = M.ID_MARCAS
            INNER JOIN FACTURA F ON DF.ID_FACTURA = F.ID_FACTURA_CLIENTE
            INNER JOIN ESTADO_FACTURA EF ON F.ID_ESTADO_FACTURA = EF.ID_ESTADO_FACTURA
            INNER JOIN CLIENTE C ON F.ID_CLIENTE = C.ID_CLIENTE
            WHERE EF.ID_ESTADO_FACTURA IN ( 4 ) AND R.estado_comentario = 'Activo';";
            $params = null;
            return Conexion::getRows( $sql, $params );
        }
        //Funcion para leer todas las resenas en base a su id
        public function readAllResena() {
            $sql =  "SELECT R.ID_RESENA, R.COMENTARIO, R.CLASIFICACION, C.USUARIO_CLIENTE FROM PRODUCTOS P
            INNER JOIN DETALLE_FACTURA DF ON DF.ID_PRODUCTOS = P.ID_PRODUCTOS
            INNER JOIN RESENA R ON R.ID_DETALLE_FACTURA = DF.ID_DETALLE_FACTURA
            INNER JOIN MARCAS M ON P.ID_MARCAS = M.ID_MARCAS
            INNER JOIN FACTURA F ON DF.ID_FACTURA = F.ID_FACTURA_CLIENTE
            INNER JOIN ESTADO_FACTURA EF ON F.ID_ESTADO_FACTURA = EF.ID_ESTADO_FACTURA
            INNER JOIN CLIENTE C ON F.ID_CLIENTE = C.ID_CLIENTE
            WHERE EF.ID_ESTADO_FACTURA IN ( 4 ) AND R.estado_comentario = 'Activo' AND P.ID_PRODUCTOS = ?;";
            $params = array($this->id);
            return Conexion::getRows( $sql, $params );
        }
    }
?>