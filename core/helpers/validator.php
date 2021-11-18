<?php
/**
*	Creación de la clase Validator que sirve para validar los datos del lado del servidos
*/
class Validator
{
    /*Creacion de atributos de la clase Validator*/
    private $imageError = null;
    private $imageName = null;

    /*Método que obtiene el nombre de la imagen*/
    public function getImageName()
    {
        return $this->imageName;
    }

    /*Método que obtiene el error según el atributo imageError*/
    public function getImageError()
    {
        switch ( $this->imageError ) {
            case 1:
                $error = 'El tipo de la imagen debe ser gif, jpg o png';
                break;
            case 2:
                $error = 'La dimensión de la imagen es incorrecta';
                break;
            case 3:
                $error = 'El tamaño de la imagen debe ser menor a 2MB';
                break;
            case 4:
                $error = 'El archivo de la imagen no existe';
                break;
            default:
                $error = 'Ocurrió un problema con la imagen';
        }
        return $error;
    }

    /*Método que sirve para validar los formularios*/
    public function validateForm($fields)
    {
        foreach ( $fields as $index => $value ) {
            $value = trim($value);
            $fields[$index] = $value;
        }
        return $fields;
    }

     /*
    *   Método para validar un dato de tipo booleano (True o False).
    *
    *   Parámetros: $value que es el dato a validarse.
    *   
    *   Retorno: booleano (si se cumplio la condicion o false si no lo hizo).
    */
    public function validateBoolean($value)
    {
        if ( $value == 1 || $value == 0 || $value == true || $value == false ) {
            return true;
        } else {
            return false;
        }
    }
     /*
    *   Método para validar un numero como natural.
    *
    *   Parámetros: $value número a validar.
    *   
    *   Retorno: booleano (true si cumple las condiciones o false si no lo hizo).
    */
    public function validateNaturalNumber($value)
    {
        //Se verifica que el valor a validar sea un número entero positivo y mayor o igual a 1
        if ( filter_var($value, FILTER_VALIDATE_INT, array('min_range' => 1)) ) {
            return true;
        } else {
            return false;
        }
    }

    /*Método que sirve para validar los datos númericos que correspondan a alguna llave
    primaria o foránea*/
    public function validateId($value)
    {
        //Se verifica que el valor a validar sea un número entero positivo y mayor o igual a 1
        if ( filter_var($value, FILTER_VALIDATE_INT, array('min_range' => 1)) ) {
            return true;
        } else {
            return false;
        }
    }

    /*Método que valida el archivo de una imagen*/
    public function validateImageFile($file, $maxWidth, $maxHeigth)
    {
        if ( $file ) {
            // Se evalua si el archivo pesa menos o es igual a 2MB
            if ( $file['size'] <= 2097152 ) {
                list($width, $height, $type) = getimagesize($file['tmp_name']);
                if ( $width <= $maxWidth && $height <= $maxHeigth ) {
                    // Se evalua que la imagen sea de los formatos: 1 - GIF, 2 - JPG y 3 - PNG
                    if ( $type == 1 || $type == 2 || $type == 3 ) {
                        // Se le coloca un nombre al archivo
                        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                        $this->imageName = uniqid().'.'.$extension;
                        return true;
                    } else {
                        $this->imageError = 1;
                        return false;
                    }
                } else {
                    $this->imageError = 2;
                    return false;
                }
             } else {
                $this->imageError = 3;
                return false;
             }
        } else {
            $this->imageError = 4;
            return false;
        }
    }

    /*Método para validar un texto de correo electrónico*/
    public function validateEmail($email)
    {
        if ( filter_var($email, FILTER_VALIDATE_EMAIL) ) {
            return true;
        } else {
            return false;
        }
    }

    /*Método para validar un texto de solo letras*/
    public function validateAlphabetic($value, $minimum, $maximum)
    {
        if ( preg_match('/^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{'.$minimum.','.$maximum.'}$/', $value) ) {
            return true;
        } else {
            return false;
        }
    }

    /*Método para validar un texto de solo letras, números, espacios, y "." */
    public function validateAlphanumeric($value, $minimum, $maximum)
    {
        if ( preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ\s\.]{'.$minimum.','.$maximum.'}$/', $value) ) {
            return true;
        } else {
            return false;
        }
    }

    /*Método para validar textos de tipo monetario*/
    public function validateMoney($value)
    {
        if ( preg_match('/^[0-9]+(?:\.[0-9]{1,2})?$/', $value) ) {
            return true;
        } else {
            return false;
        }
    }

    /*Método que valida las contraseñas*/
    public function validatePassword($value)
    {
        if ( strlen($value) >= 8 ) {
            return true;
        } else {
            return false;
        }
    }

    /*Método que evalua si se guardo un archivo*/
    public function saveFile($file, $path, $name)
    {
        if ( $file ) {
            if ( file_exists($path) ) {
                if ( move_uploaded_file($file['tmp_name'], $path.$name) ) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

   /*
    *   Método para validar textos con letras, digitos, espacios en blanco y signos de puntuación.
    *
    *   Parámetros: $value es el dato de entrada, $minimum y $maximum establece la longitud que debe cumplir el texto.
    *   
    *   Retorno: booleano (true si el valor cumplio las condiciones o false si no lo hizo).
    */
    public function validateString($value, $minimum, $maximum)
    {
        // Se evalue que el contenido concuerde con lo establecido en la base de datos.
        if ( preg_match('/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ\s\,\;\.]{'.$minimum.','.$maximum.'}$/', $value) ) {
            return true;
        } else {
            return false;
        }
    }

    /*Método que permite evaluar si se elimino un archivo*/
    public function deleteFile($path, $name)
    {
        if ( file_exists($path) ) {
            if ( @unlink($path.$name) ) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
?>
