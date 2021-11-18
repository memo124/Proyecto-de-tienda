<?php
//Se crea la clase Conexion, que servira para conectarse y manipular la base de datos
class Conexion
{
    //Creacion de los atributos de la clase Conexion
    private static $connection = null;
    private static $statement = null;
    private static $error = null;
    private static $id = null;

    //Método que estable la conexion con la base de datos
    private function conectar()
    {
        $server = 'localhost';
        $database = 'BaseTienda_#20180296_#20180695';
        $username = 'postgres';
        $password = 'postgres';

        try
        {
            self::$connection = new PDO('pgsql:host='.$server.';dbname='.$database.';port=5432', $username,$password);
        } catch(PDOException $error) {
            //var_dump($error);
            self::setException($error->getcode(),$error->getMessage());
            exit(self::getException());
        }
    }

    /*Método que sirve cerrar la conexión con la base de datos*/
    private function desconectar()
    {
        self::$connection = null;
        $error = self::$statement->errorInfo();
        if( $error[0] != '00000' ) {
            self::setException($error[0], $error[2]);
        }
    }

    /*Método para realizar alguna operacion en una fila de la base de datos*/
    public static function executeRow($query, $values)
    {
        self::conectar();
        self::$statement = self::$connection->prepare($query);
        $state = self::$statement->execute($values);
        self::$id = self::$connection->lastInsertId();
        self::desconectar();
        return $state;
    }

    /*Metodo para obtener una fila de una consulta en la base de datos*/
    public static function getRow($query, $values)
    {
        self::conectar();
        self::$statement = self::$connection->prepare($query);
        self::$statement->execute($values);
        self::desconectar();
        return self::$statement->fetch(PDO::FETCH_ASSOC);
    }

    /*Método que obtiene las filas de una consulta de la base de datos*/
    public static function getRows($query, $values)
    {
        self::conectar();
        self::$statement = self::$connection->prepare($query);
        self::$statement->execute($values);
        self::desconectar();
        return self::$statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /*Método que obtiene la ultima fila de una consulta de la base de datos*/
    public static function getLastRowId()
    {
        return self::$id;
    }

    /*Método que obtiene un error al realizar una operacion con la base de datos y lo
    almacena en un atributo*/
    private static function setException($code, $message)
    {
        switch ( $code ) {
            case '7':
                self::$error = 'Existe un problema con el servidor';
                break;
            case '42703':
                self::$error = 'Nombre de campo desconocido';
                break;
            case '23505':
                self::$error = 'Dato duplicado, no se puede guardar';
                break;
            case '42P01':
                self::$error = 'Nombre de tabla desconocido';
                break;
            case '23503':
                self::$error = 'Registro ocupado, no se puede eliminar';
                break;
            default:
                self::$error = $message;
        }
    }

    /*Métod que obtiene el error de una operación en la base de datos*/
    public static function getException()
    {
        return self::$error;
    }
}
?>