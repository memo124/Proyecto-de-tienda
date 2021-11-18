<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Producto extends Validator
{
    // Declaración de atributos (propiedades).
    private $id = null;
    private $nombre = null;
    private $precio = null;
    private $cantidad = null;
    private $imagen = null;
    private $archivo = null;
    private $ruta = '../../../resources/img/cards/';
    private $estado =  null;
    private $marca = null;
    private $tipo = null;

    /*
    *   Métodos para asignar valores a los atributos.
    */
        public function setId($value)
        {
            if ($this->validateId($value)) {
                $this->id = $value;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function setNombre($values)
        {
            if($this->validateAlphanumeric($values, 1, 50))
            {
                $this->nombre = $values;
                return true;
            }
            else
            {
                return false;
            }
        }
        public function setPrecio($values)
        {
            if($this->validateMoney($values))
            {
                $this->precio = $values;
                return true;
            }
            else
            {
                return false;
            }
        }
        public function setCantidad($values)
        {
            if($this->validateId($values))
            {
                $this->cantidad = $values;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function setImagen($file)
        {
            if ($this->validateImageFile($file, 700, 700)) {
                $this->imagen = $this->getImageName();
                $this->archivo = $file;
                return true;
            } else {
                return false;
            }
        }
        public function setEstado($values)
        {
            if($this->validateId($values))
            {
                $this->estado = $values;
                return true;
            }
            else
            {
                return false;
            }
        }
        public function setMarca($values)
        {
            if($this->validateId($values))
            {
                $this->marca = $values;
                return true;
            }
            else
            {
                return false;
            }
        }
        public function setTipo($values)
        {
            if($this->validateId($values))
            {
                $this->tipo = $values;
                return true;
            }
            else
            {
                return false;
            }
        }

        public function getNombre()
        {
            return $this->nombre;
        }

        

        public function getPrecio()
        {
            return $this->precio;
        }

        public function getCantidad()
        {
            return $this->cantidad;
        }

        public function getImagen()
        {
            return $this->imagen;
        }

        public function getRuta()
        {
            return $this->ruta;
        }

        public function getEstado()
        {
            return $this->estado;
        }

        public function getMarca()
        {
            return $this->marca;
        }

        public function getTipo()
        {
            return $this->tipo;
        }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */

    public function readproducto()
    {
        $sql = 'SELECT id_productos, nombre_producto, precio, cantidad_producto, imagen, estado_producto, marcas, tipo_producto from productos p 
        inner join estado_productos ep on ep.id_estado_producto = p.id_estado_producto
        inner join marcas m on p.id_marcas = m.id_marcas
        inner join tipo_productos tp on p.id_tipo_producto = tp.id_tipo_producto order by id_productos';
        $param = null;
        return Conexion::getRows($sql, $param);
    }

    public function createproducto()
    {
        $sql = 'INSERT into productos (nombre_producto,precio,cantidad_producto,imagen,id_estado_producto,id_marcas,id_tipo_producto)
        values(?,?,?,?,?,?,?)';
        $param =  array($this->nombre,$this->precio,$this->cantidad,$this->imagen,$this->estado,$this->marca,$this->tipo);
        return Conexion::executeRow($sql, $param);
    }

    public function getproducto()
    {
        $sql = 'SELECT id_productos, nombre_producto, precio, cantidad_producto, imagen, id_estado_producto, id_marcas, id_tipo_producto 
        from productos where id_productos = ?';
        $param = array($this->id);
        return Conexion::getRow($sql, $param);
    }

    public function updateproducto()
    {
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'UPDATE productos set nombre_producto = ?, precio = ?, 
            cantidad_producto = ?, imagen = ?, id_estado_producto = ?, 
            id_marcas = ?, id_tipo_producto = ? where id_productos = ?';
            $param = array($this->nombre,$this->precio,$this->cantidad,$this->imagen,$this->estado,$this->marca,$this->tipo,$this->id);
        } else {
            $sql = 'UPDATE productos set nombre_producto = ?, precio = ?, 
            cantidad_producto = ?, id_estado_producto = ?, id_marcas = ?, 
            id_tipo_producto = ? where id_productos = ?';
            $param = array($this->nombre,$this->precio,$this->cantidad,$this->estado,$this->marca,$this->tipo,$this->id);
        }
        return Conexion::executeRow($sql, $param);
    }

    public function deleteproducto()
    {
        $sql = 'DELETE from productos where id_productos = ?';
        $param = array($this->id);
        return Conexion::executeRow($sql, $param);
    }

    public function searchproducto($value)
    {
        $sql = 'SELECT id_productos, nombre_producto, precio, cantidad_producto, imagen, estado_producto, marcas, tipo_producto from productos p 
        inner join estado_productos ep on ep.id_estado_producto = p.id_estado_producto
        inner join marcas m on p.id_marcas = m.id_marcas
        inner join tipo_productos tp on p.id_tipo_producto = tp.id_tipo_producto 
        where nombre_producto ilike ? or estado_producto ilike ? or marcas ilike ? or tipo_producto ilike ?';
        $param = array("%$value%","%$value%","%$value%","%$value%");
        return Conexion::getRows($sql,$param);
    }

    //Metodo para obtener los productos y ordernarlos por la marca
    public function readMarcaProducto()
    {
        $sql = 'SELECT nombre_producto, precio, cantidad_producto, marcas, tipo_producto from productos 
        inner join  marcas using(id_marcas)
        inner join tipo_productos  using(id_tipo_producto)
        where id_marcas = ?
        group by id_marcas, nombre_producto, precio, cantidad_producto, marcas, tipo_producto';
        $param = array($this->marca);
        return Conexion::getRows($sql, $param);
    }

}
?>