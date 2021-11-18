<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class DetalleFactura extends Validator
{
    // Declaración de los atributos de la clase.
    private $id = null;
    private $factura = null;
    private $precio = null;
    private $cantidad = null;
    private $nombre = null;

    /*                                                                  
    *   Métodos para otorgar valores a los atributos(SETTERS).
    */
    public function setId($value)
    {
        if ( $this->validateId($value) ) {
            $this->id = $value;
            return true;
        }
        else {
            return false;
        }
    }

    public function setfactura($value)
    {
        if ( $this->validateId($value) ) {
            $this->factura = $value;
            return true;
        }
        else {
            return false;
        }
    }   
    
    public function setprecio($value)
    {
        if ( $this->validateMoney($value) ) {
            $this->precio = $value;
            return true;
        }
        else {
            return false;
        }
    }   
    
    public function setcantidad($value)
    {
        if ( $this->validateId($value) ) {
            $this->cantidad = $value;
            return true;
        }
        else {
            return false;
        }
    }
    
    public function setnombre($value)
    {
        if ( $this->validateId($value) ) {
            $this->nombre = $value;
            return true;
        }
        else {
            return false;
        }
    }

        public function getfactura()
        {
            return $this->factura;
        }
        
        public function getprecio()
        {
            return $this->precio;
        }
        
        public function getcantidad()
        {
            return $this->cantidad;
        }
        
        public function getnombre()
        {
            return $this->nombre;
        }
    /*
    *   Métodos que realizan las operaciones SCRUD (search, create, read, update, delete) de la clase.
    */

    /*Método para obtener los datos de un detalle de factura*/
    public function getDetalle()
    {
        $sql = 'SELECT id_detalle_factura, id_factura, precio_comprados, cantidad_comprados, id_productos 
                from detalle_factura 
                where id_detalle_factura = ?';
        $param = array($this->id);
        return Conexion::getRow($sql, $param);
    }

    /*Método para elminar un detalle de factura*/
    public function deleteDetalle()
    {
        $sql = 'DELETE from detalle_factura where id_detalle_factura = ?';
        $param = array($this->id);
        return Conexion::executeRow($sql, $param);
    }

    /*Método para obtener los datos de todos los detalles de factura*/
    public function readDetalle()
    {
        $sql = 'SELECT id_detalle_factura, id_factura, precio_comprados, cantidad_comprados, nombre_producto 
        from detalle_factura d inner join productos p on d.id_productos = p.id_productos order by id_detalle_factura';
        $param = null;
        return Conexion::getRows($sql, $param);
    }

    /*Método para buscar un detalle de factura*/
    public function searchDetalle($value)
    {
        $sql = 'SELECT id_detalle_factura, id_factura, precio_comprados, cantidad_comprados, nombre_producto 
        from detalle_factura d inner join productos p on d.id_productos = p.id_productos 
        where nombre_producto ilike ?';
        $param = array("%$value%");
        return Conexion::getRows($sql, $param);
    }

    /*Método para agregar un detalle de factura*/
    public function createDetalle()
    {
        $sql = 'INSERT into detalle_factura (id_factura, precio_comprados, cantidad_comprados, id_productos) values (?,?,?,?)';
        $param = array($this->factura,$this->precio,$this->cantidad,$this->nombre);
        return Conexion::executeRow($sql, $param);
    }

    /*Método para actualizar un detalle de factura*/
    public function updateDetalle()
    {
        $sql = 'UPDATE detalle_factura set id_factura = ?, precio_comprados = ?, cantidad_comprados = ?, id_productos = ? where id_detalle_factura = ?';
        $param = array($this->factura,$this->precio,$this->cantidad,$this->nombre,$this->id);
        return Conexion::executeRow($sql, $param);
    }

    /*Método que devuelve los 7 productos más comprados*/
    public function topCompras()
    {
        $sql = 'SELECT DISTINCT(DF.ID_PRODUCTOS) , P.NOMBRE_PRODUCTO , COUNT( * ) AS comprados 
                FROM DETALLE_FACTURA DF 
                JOIN PRODUCTOS P USING(ID_PRODUCTOS)
                GROUP BY DF.ID_PRODUCTOS , P.NOMBRE_PRODUCTO 
                ORDER BY comprados DESC LIMIT 7;';
        $params = null;
        return Conexion::getRows($sql, $params);
    }

    /*Método que devuelve los 7 productos menos comprados*/
    public function topCompras2()
    {
        $sql = 'SELECT DISTINCT(DF.ID_PRODUCTOS) , P.NOMBRE_PRODUCTO , COUNT( * ) AS comprados 
                FROM DETALLE_FACTURA DF 
                JOIN PRODUCTOS P USING(ID_PRODUCTOS)
                GROUP BY DF.ID_PRODUCTOS , P.NOMBRE_PRODUCTO 
                ORDER BY comprados ASC LIMIT 7;';
        $params = null;
        return Conexion::getRows($sql, $params);
    }

    /*Método que devuelve los 7 clientes con más compras*/
    public function comprasClientes()
    {
        $sql = 'SELECT COUNT(F.ID_CLIENTE) AS comprascliente , F.ID_CLIENTE , C.USUARIO_CLIENTE 
                FROM FACTURA F 
                JOIN CLIENTE C USING( ID_CLIENTE )
                GROUP BY F.ID_CLIENTE , C.USUARIO_CLIENTE 
                ORDER BY comprascliente DESC LIMIT 7;';
        $params = null;
        return Conexion::getRows($sql, $params);
    }

    /*Método que devuelve la cantidad de pedidos según tipo de pago*/
    public function tiposPago()
    {
        $sql = 'SELECT COUNT(*) AS cantidad, TIPO_PAGO 
                FROM FACTURA 
                WHERE TIPO_PAGO IN ( ? , ? )  
                GROUP BY TIPO_PAGO;';
        $params = array("En efectivo","Tarjeta de crédito");
        return Conexion::getRows($sql, $params);
    }

    /*Método que devuelve la cantidad de pedidos según estado de pedido*/
    public function estadoPedidos()
    {
        $sql = 'SELECT COUNT(*) AS cantidad, E.ESTADO_FACTURA FROM FACTURA F
                JOIN ESTADO_FACTURA E USING(ID_ESTADO_FACTURA)
                WHERE F.ID_ESTADO_FACTURA NOT IN ( 5 )
                GROUP BY E.ESTADO_FACTURA';
        $params = null;
        return Conexion::getRows($sql, $params);
    }

    /*Método que devuelve la cantidad de productos según marca*/
    public function productosMarcas()
    {
        $sql = 'SELECT M.MARCAS, COUNT(P.ID_MARCAS) AS cantidad FROM MARCAS M
                JOIN PRODUCTOS P USING(ID_MARCAS)
                GROUP BY M.ID_MARCAS';
        $params = null;
        return Conexion::getRows($sql, $params);
    }

    /*Método que devuelve el descuento según tipo de producto*/
    public function descuentos()
    {
        $sql = 'SELECT * FROM TIPO_PRODUCTOS';
        $params = null;
        return Conexion::getRows($sql, $params);
    }

    /*Método que devuelve la cantidad de producto según tipo de producto*/
    public function tiposProductos()
    {
        $sql = 'SELECT T.TIPO_PRODUCTO, COUNT(P.ID_TIPO_PRODUCTO) AS cantidad 
                FROM PRODUCTOS P
                INNER JOIN TIPO_PRODUCTOS T USING(ID_TIPO_PRODUCTO)
                GROUP BY T.ID_TIPO_PRODUCTO
        ';
        $params = null;
        return Conexion::getRows($sql, $params);
    }

    /*Método que devuelve la cantidad de usuarios según tipo de usuario*/
    public function tiposUsuarios()
    {
        $sql = 'SELECT T.TIPO_USUARIO, COUNT(U.ID_TIPO_USUARIO) AS cantidad 
                FROM USUARIO U
                INNER JOIN TIPO_USUARIO T USING(ID_TIPO_USUARIO)
                GROUP BY T.ID_TIPO_USUARIO';
        $params = null;
        return Conexion::getRows($sql, $params);
    }

    /*Método que devuelve la cantidad de reseñas según calificación*/
    public function calificaciones()
    {
        $sql = 'SELECT R.CLASIFICACION, COUNT(R.CLASIFICACION) AS cantidad 
                FROM RESENA R
                GROUP BY R.CLASIFICACION;';
        $params = null;
        return Conexion::getRows($sql, $params);
    }

    /*Método que devuelve los 7 clientes con más dinero invertido en la tienda*/
    public function inversionesClientes()
    {
        $sql = 'SELECT C.USUARIO_CLIENTE, SUM(F.TOTAL_FACTURA) AS cantidad FROM FACTURA F
        JOIN CLIENTE C USING(ID_CLIENTE) WHERE F.TOTAL_FACTURA > 0 
        GROUP BY C.USUARIO_CLIENTE ORDER BY CANTIDAD DESC  LIMIT 7;';
        $params = null;
        return Conexion::getRows($sql, $params);
    }

    /*Método que devuelve los 5 clientes con más reseñas*/
    public function resenasClientes()
    {
        $sql = 'SELECT C.USUARIO_CLIENTE, COUNT(R.ID_RESENA) AS cantidad FROM CLIENTE C
        JOIN FACTURA F USING(ID_CLIENTE)
        INNER JOIN DETALLE_FACTURA DF ON F.ID_FACTURA_CLIENTE = DF.ID_FACTURA
        JOIN RESENA R USING(ID_DETALLE_FACTURA)
        GROUP BY C.USUARIO_CLIENTE ORDER BY CANTIDAD DESC LIMIT 5;';
        $params = null;
        return Conexion::getRows($sql, $params);
    }

    /*Método que devuelve la cantidad de compras de productos de cada marca*/
    public function comprasMarcas()
    {
        $sql = 'SELECT M.MARCAS, COUNT(DF.ID_DETALLE_FACTURA) AS CANTIDAD FROM FACTURA F
        INNER JOIN DETALLE_FACTURA DF ON F.ID_FACTURA_CLIENTE = DF.ID_FACTURA
        JOIN PRODUCTOS P USING(ID_PRODUCTOS)
        JOIN MARCAS M USING(ID_MARCAS) GROUP BY M.MARCAS ORDER BY CANTIDAD DESC;';
        $params = null;
        return Conexion::getRows($sql, $params);
    }

    /*Método que devuelve la cantidad de reseñas según estado de reseña*/
    public function estadosResenas()
    {
        $sql = 'SELECT R.ESTADO_COMENTARIO, COUNT(*) AS cantidad FROM RESENA R
                GROUP BY R.ESTADO_COMENTARIO ORDER BY CANTIDAD DESC;';
        $params = null;
        return Conexion::getRows($sql, $params);
    }

    /*Método que devuelve los 7 productos con más reseñas*/
    public function resenasProductos()
    {
        $sql = 'SELECT P.NOMBRE_PRODUCTO, COUNT(P.ID_PRODUCTOS) AS cantidad FROM DETALLE_FACTURA DF
                JOIN RESENA R USING(ID_DETALLE_FACTURA)
                JOIN PRODUCTOS P USING(ID_PRODUCTOS) GROUP BY P.NOMBRE_PRODUCTO ORDER BY CANTIDAD DESC LIMIT 7;';
        $params = null;
        return Conexion::getRows($sql, $params);
    }

    /*Método que devuelve los 7 productos con mejor promedio de calificaciones en sus reseñas*/
    public function promedioResenas()
    {
        $sql = 'SELECT P.NOMBRE_PRODUCTO, ROUND(AVG(R.CLASIFICACION) , 1 ) AS promedio FROM DETALLE_FACTURA DF
        JOIN RESENA R USING(ID_DETALLE_FACTURA)
        JOIN PRODUCTOS P USING(ID_PRODUCTOS) GROUP BY P.NOMBRE_PRODUCTO ORDER BY promedio DESC LIMIT 7;';
        $params = null;
        return Conexion::getRows($sql, $params);
    }
}
?>