<?php
/*
*	Clase para manejar la tabla productos de la base de datos. Es clase hija de Validator.
*/
class Marcas extends Validator
{
    // Declaración de atributos (propiedades).
    private $id_marca = null;
    private $marca = null;
    private $imagen = null;
    private $archivo = null;
    private $ruta = '../../../resources/img/cards/logos/';
    /*
    *   Métodos para asignar valores a los atributos.
    */
    public function setId($value)
    {
        if ($this->validateNaturalNumber($value)) {
            $this->id_marca = $value;
            return true;
        } else {
            return false;
        }
    }

    public function setMarca($value)
    {
        if ($this->validateAlphabetic($value, 2, 50)) {
            $this->marca = $value;
            return true;
        } else {
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
    /*
    *   Métodos para obtener valores de los atributos.
    */
    public function getId()
    {
        return $this->id_marca;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function getRuta()
    {
        return $this->ruta;
    }

    /*
    *   Métodos para realizar las operaciones SCRUD (search, create, read, update, delete).
    */
    public function buscarMarca($value)
    {
        $sql = 'SELECT id_marcas, marcas, imagen_marca
                FROM marcas
                WHERE marcas ILIKE ?';
        $params = array("%$value%");
        return Conexion::getRows($sql, $params);
    }

    public function createMarca()
    {
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'INSERT INTO marcas(marcas, imagen_marca)
                    VALUES( ?, ? )';
            $params = array($this->marca, $this->imagen);
            return Conexion::executeRow($sql, $params);
        } else {
            return false;
        }
    }

    public function readAllMarcas()
    {
        $sql = 'SELECT id_marcas, marcas, imagen_marca
                FROM marcas
                ORDER BY id_marcas';
        $params = null;
        return Conexion::getRows($sql, $params);
    }

    public function readOneMarcas()
    {
        $sql = 'SELECT id_marcas, marcas, imagen_marca
                FROM marcas
                WHERE id_marcas = ?';
        $params = array($this->id_marca);
        return Conexion::getRow($sql, $params);
    }

    public function updateMarcas()
    {
        if ($this->saveFile($this->archivo, $this->ruta, $this->imagen)) {
            $sql = 'UPDATE marcas
                    SET imagen_marca = ?, marcas = ?
                    WHERE id_marcas = ?';
            $params = array($this->imagen, $this->marca, $this->id_marca);
        } else {
            $sql = 'UPDATE marcas
                    SET marcas = ?
                    WHERE id_marcas = ?';
            $params = array($this->marca, $this->id_marca);
        }
        return Conexion::executeRow($sql, $params);
    }

    public function deleteMarca()
    {
        $sql = 'DELETE FROM marcas
                WHERE id_marcas = ?';
        $params = array($this->id_marca);
        return Conexion::executeRow($sql, $params);
    }

    /*
    *   Métodos para generar gráficas.
    */
    /*
    public function cantidadProductosCategoria()
    {
        $sql = 'SELECT nombre_categoria, COUNT(id_producto) cantidad
                FROM productos INNER JOIN categorias USING(id_categoria)
                GROUP BY id_categoria, nombre_categoria';
        $params = null;
        return Conexion::getRows($sql, $params);
    }*/
}
?>