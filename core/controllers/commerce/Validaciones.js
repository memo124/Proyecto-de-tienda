//Aca se elimina el copy paste con jquery
$('body').bind('copy paste',function(e) {
  e.preventDefault(); return false; 
});

//método que valida la escritura de algun campo
function ValidarEscritura($Evento, $permitidos, evt) {
  var charCode = ( evt.which ) ? evt.which : event.keyCode;
   if ( charCode == 46 ) {
      return false;
   } else {
     var $numeros = "0123456789",
   $caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ_",
   $caracteres2 = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóú",
   $numeros_caracteres = $numeros + $caracteres,
   $numeros_caracteres2 = $numeros + $caracteres2,
   $teclas_especiales = [46];

   switch ( $permitidos ) {
     case 'num':
       $permitidos = $numeros;
       break;
     case 'car':
       $permitidos = $caracteres;
       break;
     case 'num_car':
       $permitidos = $numeros_caracteres;
       break;
     case 'num_car2':
       $permitidos = $numeros_caracteres2;
       break;
     }
   // Obtener la tecla pulsada
   var $evento = $Evento || window.event,
         $codigoCaracter = $evento.charCode || $evento.keyCode,
         $caracter = String.fromCharCode($codigoCaracter);
   // Comprobar si la tecla pulsada es alguna de las teclas especiales
   // (teclas de borrado y flechas horizontales)
   var $tecla_especial = false;
   for ( var i in $teclas_especiales ) {
     if ( $codigoCaracter == $teclas_especiales[i] ) {
       $tecla_especial = true;
       break;
     }
   }
   // Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
   // o si es una tecla especial
   return $permitidos.indexOf($caracter) != -1 || $tecla_especial;
 }
}

//método que valida la escritura de algun campo
function ValidarEscritura2($Evento, $permitidos) {
var $numeros = "0123456789",
   $caracteres = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ_@.",
   $caracteres2 = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ_@áéíóú",
   $caracteres3 = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóú",
   $numeros_caracteres = $numeros + $caracteres,
   $numeros_caracteres2 = $numeros + $caracteres2,
   $numeros_caracteres3 = $numeros + $caracteres3,
   $teclas_especiales = [46];

switch ( $permitidos ) {
case 'num':
 $permitidos = $numeros;
 break;
case 'car':
 $permitidos = $caracteres;
 break;
case 'num_car':
 $permitidos = $numeros_caracteres;
 break;
case 'num_car2':
$permitidos = $numeros_caracteres2;
break;
case 'num_car3':
$permitidos = $numeros_caracteres3;
break;
}
// Obtener la tecla pulsada
var $evento = $Evento || window.event,
   $codigoCaracter = $evento.charCode || $evento.keyCode,
   $caracter = String.fromCharCode($codigoCaracter);
// Comprobar si la tecla pulsada es alguna de las teclas especiales
// (teclas de borrado y flechas horizontales)
var $tecla_especial = false;
for ( var i in $teclas_especiales ) {
if ( $codigoCaracter == $teclas_especiales[i] ) {
 $tecla_especial = true;
 break;
}
}
// Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
// o si es una tecla especial
return $permitidos.indexOf($caracter) != -1 || $tecla_especial;
}

//método que valida la escritura de algun campo
function ValidarEscritura3($Evento, $permitidos, evt) {
  var charCode = ( evt.which ) ? evt.which : event.keyCode;
  if ( charCode == 46 ) {
    return false;
  } else {
    var $numeros = "0123456789",
          $caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóú",
          $caracteres2 = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóú.,",
          $numeros_caracteres = $numeros + $caracteres,
          $numeros_caracteres2 = $numeros + $caracteres2,
          $teclas_especiales = [46];

  switch ( $permitidos ) {
  case 'num':
    $permitidos = $numeros;
    break;
  case 'car':
    $permitidos = $caracteres;
    break;
  case 'num_car':
    $permitidos = $numeros_caracteres;
    break;
  case 'num_car2':
    $permitidos = $numeros_caracteres2;
    break;
  }
// Obtener la tecla pulsada
var $evento = $Evento || window.event,
    $codigoCaracter = $evento.charCode || $evento.keyCode,
    $caracter = String.fromCharCode($codigoCaracter);
// Comprobar si la tecla pulsada es alguna de las teclas especiales
// (teclas de borrado y flechas horizontales)
var $tecla_especial = false;
for ( var i in $teclas_especiales ) {
  if ( $codigoCaracter == $teclas_especiales[i] ) {
   $tecla_especial = true;
    break;
  }
}
// Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
// o si es una tecla especial
  return $permitidos.indexOf($caracter) != -1 || $tecla_especial;
  }
}

//método que valida la escritura de algun campo
function ValidarEscritura4($Evento, $permitidos, evt) {
  var charCode = ( evt.which ) ? evt.which : event.keyCode;
  if ( charCode == 46 ) {
    return false;
  } else {
    var $numeros = "0123456789",
          $caracteres = "_abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
          $numeros_caracteres = $numeros + $caracteres,
          $teclas_especiales = [46];

  switch ( $permitidos ) {
  case 'num':
    $permitidos = $numeros;
    break;
  case 'car':
    $permitidos = $caracteres;
    break;
  case 'num_car':
    $permitidos = $numeros_caracteres;
    break;
  }
// Obtener la tecla pulsada
var $evento = $Evento || window.event,
    $codigoCaracter = $evento.charCode || $evento.keyCode,
    $caracter = String.fromCharCode($codigoCaracter);
// Comprobar si la tecla pulsada es alguna de las teclas especiales
// (teclas de borrado y flechas horizontales)
var $tecla_especial = false;
for ( var i in $teclas_especiales ) {
  if ( $codigoCaracter == $teclas_especiales[i] ) {
   $tecla_especial = true;
    break;
  }
}
// Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
// o si es una tecla especial
  return $permitidos.indexOf($caracter) != -1 || $tecla_especial;
  }
}

//método que valida la escritura de algun campo
function ValidarEscritura5($Evento, $permitidos, evt) {
  var charCode = ( evt.which ) ? evt.which : event.keyCode;
  if ( charCode == 46 ) {
    return false;
  } else {
    var $numeros = "0123456789",
          $caracteres = "_abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
          $numeros_caracteres = $numeros + $caracteres,
          $teclas_especiales = [46];

  switch ( $permitidos ) {
  case 1:
    $permitidos = $numeros;
    break;
  case 2:
    $permitidos = $caracteres;
    break;
  case 3:
    $permitidos = $numeros_caracteres;
    break;
  }
// Obtener la tecla pulsada
var $evento = $Evento || window.event,
    $codigoCaracter = $evento.charCode || $evento.keyCode,
    $caracter = String.fromCharCode($codigoCaracter);
// Comprobar si la tecla pulsada es alguna de las teclas especiales
// (teclas de borrado y flechas horizontales)
var $tecla_especial = false;
for ( var i in $teclas_especiales ) {
  if ( $codigoCaracter == $teclas_especiales[i] ) {
   $tecla_especial = true;
    break;
  }
}
// Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
// o si es una tecla especial
  return $permitidos.indexOf($caracter) != -1 || $tecla_especial;
  }
}

//método que valida la escritura de algun campo
function ValidarEscritura6($Evento, $permitidos, evt) {
  var charCode = ( evt.which ) ? evt.which : event.keyCode;
  if ( charCode == 46 ) {
    return false;
  } else {
    var $numeros = "0123456789",
          $caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóú",
          $numeros_caracteres = $numeros + $caracteres,
          $teclas_especiales = [46];

  switch ( $permitidos ) {
  case 1:
    $permitidos = $numeros;
    break;
  case 2:
    $permitidos = $caracteres;
    break;
  case 3:
    $permitidos = $numeros_caracteres;
    break;
  }
// Obtener la tecla pulsada
var $evento = $Evento || window.event,
    $codigoCaracter = $evento.charCode || $evento.keyCode,
    $caracter = String.fromCharCode($codigoCaracter);
// Comprobar si la tecla pulsada es alguna de las teclas especiales
// (teclas de borrado y flechas horizontales)
var $tecla_especial = false;
for ( var i in $teclas_especiales ) {
  if ( $codigoCaracter == $teclas_especiales[i] ) {
   $tecla_especial = true;
    break;
  }
}
// Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
// o si es una tecla especial
  return $permitidos.indexOf($caracter) != -1 || $tecla_especial;
  }
}

//método que valida la escritura de algun campo
function ValidarEscritura8($Evento, $permitidos, evt) {
  var charCode = ( evt.which ) ? evt.which : event.keyCode;
   if ( charCode == 46 ) {
      return false;
   } else {
     var $numeros = "0123456789",
   $caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ_",
   $numeros_caracteres = $numeros + $caracteres,
   $teclas_especiales = [46];

   switch ( $permitidos ) {
     case 1:
       $permitidos = $numeros;
       break;
     case 2:
       $permitidos = $caracteres;
       break;
     case 3:
       $permitidos = $numeros_caracteres;
       break;
     }
   // Obtener la tecla pulsada
   var $evento = $Evento || window.event,
         $codigoCaracter = $evento.charCode || $evento.keyCode,
         $caracter = String.fromCharCode($codigoCaracter);
   // Comprobar si la tecla pulsada es alguna de las teclas especiales
   // (teclas de borrado y flechas horizontales)
   var $tecla_especial = false;
   for ( var i in $teclas_especiales ) {
     if ( $codigoCaracter == $teclas_especiales[i] ) {
       $tecla_especial = true;
       break;
     }
   }
   // Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
   // o si es una tecla especial
   return $permitidos.indexOf($caracter) != -1 || $tecla_especial;
 }
}

//método que valida la escritura de algun campo
function ValidarEscritura7($Evento, $permitidos) {
  var $numeros = "0123456789",
     $caracteres = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ_@",
     $numeros_caracteres = $numeros + $caracteres,
     $teclas_especiales = [46];
  
  switch ( $permitidos ) {
  case 1:
   $permitidos = $numeros;
   break;
  case 2:
   $permitidos = $caracteres;
   break;
  case 3:
   $permitidos = $numeros_caracteres;
   break;
  }
  // Obtener la tecla pulsada
  var $evento = $Evento || window.event,
     $codigoCaracter = $evento.charCode || $evento.keyCode,
     $caracter = String.fromCharCode($codigoCaracter);
  // Comprobar si la tecla pulsada es alguna de las teclas especiales
  // (teclas de borrado y flechas horizontales)
  var $tecla_especial = false;
  for ( var i in $teclas_especiales ) {
  if ( $codigoCaracter == $teclas_especiales[i] ) {
   $tecla_especial = true;
   break;
  }
  }
  // Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
  // o si es una tecla especial
  return $permitidos.indexOf($caracter) != -1 || $tecla_especial;
  }

//funcion que valida los datos del cliente al momento de iniciar sesión
function Validar_Iniciar_Sesion () {
  var array_texto_usuario = document.Iniciar_Sesion.txt_usuario.value.split(""),
        noespacios_guiones = 0,
        array_texto_contraseña = document.Iniciar_Sesion.txt_contraseña.value.split(""),
        no_guiones = 0;
    for ( w in array_texto_usuario ) {
      if ( array_texto_usuario[w]!=' ' && array_texto_usuario[w]!='_' ) {
        noespacios_guiones++;
      }
    }
    for ( x in array_texto_contraseña ) {
      if ( array_texto_contraseña[x]!='_' ) {
        no_guiones++;
      }
    }
  if ( document.Iniciar_Sesion.txt_usuario.value=="" ) {
    swal({
      title: 'Error',
      text: 'El campo de usuario está vacio',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
      console.log('El campo de usuario está vacio');
      return false; 
  } else if  ( document.Iniciar_Sesion.txt_usuario.value.length < 8 || 
              document.Iniciar_Sesion.txt_usuario.value.length > 30 ) {
    swal({
      title: 'Error',
      text: 'El campo de usuario no tiene un valor de 8 a 30 carácteres',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
      })
      console.log('El campo de usuario no tiene un valor de 8 a 30 carácteres');
      return false; 
  } else  if ( noespacios_guiones<8 ){
    swal({
      title: 'Error',
      text: 'Nombre de usuario inválido, debe tener al menos 8 letras, números o combinados',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
      })
      console.log('Nombre de usuario inválido, debe tener al menos 8 letras, números o combinados');
      return false; 
  } else if ( document.Iniciar_Sesion.txt_contraseña.value=="" ) {
    swal({
      title: 'Error',
      text: 'El campo de contraseña está vacio',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
      })
    console.log('El campo de contraseña está vacio');
    return false;
  } else if  ( document.Iniciar_Sesion.txt_contraseña.value.length < 6 || 
              document.Iniciar_Sesion.txt_contraseña.value.length > 60 ) {
    swal({
      title: 'Error',
      text: 'El campo de contraseña no tiene un valor de 6 a 60 carácteres',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
      })
    console.log('El campo de contraseña no tiene un valor de 6 a 60 carácteres');
    return false;
  }  else  if ( no_guiones<6 ){
    swal({
      title: 'Error',
      text: 'Contraseña inválida, debe tener al menos 6 letras, números o combinados',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
      })
    console.log('Contraseña inválida, debe tener al menos 6 letras, números o combinados');
    return false;
  }
  return true;
}

//funcion que valida los campos de un formulario al registrarse
function Validar_Registrarse(){
  var   nombres = document.Registrarse.txt_nombres_usuario.value,
        array_nombre_usuario = document.Registrarse.txt_nombres_usuario.value.split(""),
        noespacios1 = 0,
        apellidos = document.Registrarse.txt_apellidos_usuario.value,
        array_apellido_usuario = document.Registrarse.txt_apellidos_usuario.value.split(""),
        noespacios2= 0,
        expresion_correo = /\w+@\w+\.+[a-z]/ ,
        valor_correo = document.Registrarse.txt_correo.value,
        array_texto_contraseña1 = document.Registrarse.txt_contraseña.value.split(""),
        no_guiones1 = 0,
        array_texto_contraseña2 = document.Registrarse.txt_contraseña2.value.split(""),
        no_guiones2 = 0,
        valor_contraseña1 = document.Registrarse.txt_contraseña.value,
        valor_contraseña2 = document.Registrarse.txt_contraseña2.value,
        array_texto_usuario = document.Registrarse.txt_usuario.value.split(""),
        noespacios_guiones = 0;
  for ( n in array_nombre_usuario ) {
    if ( array_nombre_usuario[n]!=' ' ) {
      noespacios1++;
    }
  }
  for ( a in array_apellido_usuario ) {
    if ( array_apellido_usuario[a]!=' ' ) {
      noespacios2++;
    }
  }
  for ( c1 in array_texto_contraseña1 ) {
    if ( array_texto_contraseña1[c1]!='_' ) {
      no_guiones1++;
    }
  }
  for ( c2 in array_texto_contraseña2 ) {
    if ( array_texto_contraseña2[c2]!='_' ) {
      no_guiones2++;
    }
  }

  for ( w in array_texto_usuario ) {
    if ( array_texto_usuario[w]!=' ' && array_texto_usuario[w]!='_' ) {
      noespacios_guiones++;
    }
  }

  if ( nombres == '' ) {
    swal({
      title: 'Error',
      text: 'El campo de nombre está vacío',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de nombre está vacío');
    return false; 
  } else if ( nombres.length < 2 || nombres.length > 50 ) {
    swal({
      title: 'Error',
      text: 'El campo de nombre no tiene al menos 2 carácteres o sobrepasa los 50',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de nombre no tiene al menos 2 carácteres o sobrepasa los 50');
    return false; 
  } else if ( nombres.indexOf(0)!=-1 || nombres.indexOf(1)!=-1 || nombres.indexOf(2)!=-1 || 
              nombres.indexOf(3)!=-1 || nombres.indexOf(4)!=-1 || nombres.indexOf(5)!=-1 ||
              nombres.indexOf(6)!=-1 || nombres.indexOf(7)!=-1 || nombres.indexOf(8)!=-1 ||
              nombres.indexOf(9)!=-1 || nombres.indexOf('.')!=-1 || nombres.indexOf('+')!=-1 ||
              nombres.indexOf('-')!=-1 ) {
      swal({
        title: 'Error',
        text: 'El campo de nombres tiene caracteres invalidos',
        icon: 'error',
        closeOnClickOutside: false,
        closeOnEsc: false
      })
      console.log('El campo de nombres tiene carácteres inválidos');
      return false; 
  } else if ( noespacios1 < 2 ) {
    swal({
      title: 'Error',
      text: 'El campo de nombre no tiene al menos 2 letras',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de nombre no tiene al menos 2 letras');
    return false; 
  } if ( apellidos == '' ) {
    swal({
      title: 'Error',
      text: 'El campo de apellido está vacío',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de apellido está vacío');
    return false; 
  } else if ( apellidos.length < 2 || apellidos.length > 50 ) {
    swal({
      title: 'Error',
      text: 'El campo de apellido no tiene al menos 2 carácteres o sobrepasa los 50',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de apellido no tiene al menos 2 carácteres o sobrepasa los 50');
    return false; 
  } else if ( apellidos.indexOf(0)!=-1 || apellidos.indexOf(1)!=-1 || apellidos.indexOf(2)!=-1 || 
              apellidos.indexOf(3)!=-1 || apellidos.indexOf(4)!=-1 || apellidos.indexOf(5)!=-1 ||
              apellidos.indexOf(6)!=-1 || apellidos.indexOf(7)!=-1 || apellidos.indexOf(8)!=-1 ||
              apellidos.indexOf(9)!=-1 || apellidos.indexOf('.')!=-1 || apellidos.indexOf('+')!=-1 ||
              apellidos.indexOf('-')!=-1 ) {
    swal({
      title: 'Error',
      text: 'El campo de apellido tiene carácteres invalidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de apellido tiene carácteres invalidos');
    return false; 
  } else if ( noespacios2 < 2 ) {
    swal({
      title: 'Error',
      text: 'El campo de apellido no tiene al menos 2 letras',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de apellido no tiene al menos 2 letras');
    return false; 
  } else if ( document.Registrarse.txt_correo.value=="" ) {
    swal({
      title: 'Error',
      text: 'El campo de correo está vacio',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de correo está vacio');
    return false; 
  } else if ( !expresion_correo.test(valor_correo) ) {
    swal({
      title: 'Error',
      text: 'Formato de correo inválido',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    });
      console.log('Formato de correo inválido');
      return false; 
  } else if  ( document.Registrarse.txt_correo.value.indexOf('@')==-1 || 
               document.Registrarse.txt_correo.value.indexOf('.')==-1 ) {
      swal({
        title: 'Error',
        text: 'El campo de correo no contiene "@" o "."',
        icon: 'error',
        closeOnClickOutside: false,
        closeOnEsc: false
      });
      console.log('El campo de correo no contiene "@" o "."');
      return false; 
  } else if  ( document.Registrarse.txt_correo.value.length < 15|| 
               document.Registrarse.txt_correo.value.length > 100 ) {
      swal({
        title: 'Error',
        text: 'El correo no tiene un valor de 15 a 100 carácteres',
        icon: 'error',
        closeOnClickOutside: false,
        closeOnEsc: false
      });
      console.log('El correo no tiene un valor de 15 a 100 carácteres');
      return false; 
  } 
  if ( document.Registrarse.txt_usuario.value=="" ) {
    swal({
      title: 'Error',
      text: 'El campo de usuario está vacio',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de usuario está vacio');
    return false; 
} else if  ( document.Registrarse.txt_usuario.value.length < 8 || 
             document.Registrarse.txt_usuario.value.length > 30 ) {
    swal({
      title: 'Error',
      text: 'El campo de usuario no tiene un valor de 8 a 30 carácteres',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
      })
    console.log('El campo de usuario no tiene un valor de 8 a 30 carácteres');
    return false; 
} else  if ( noespacios_guiones<8 ) {
  swal({
    title: 'Error',
    text: 'Nombre de usuario inválido, debe tener al menos 8 letras, números o combinados',
    icon: 'error',
    closeOnClickOutside: false,
    closeOnEsc: false
    })
            console.log('Nombre de usuario inválido, debe tener al menos 8 letras, números o combinados');
            return false; 
} else if ( document.Registrarse.txt_contraseña.value=="" ) {
    swal({
      title: 'Error',
      text: 'El campo de contraseña está vacio',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    });
      console.log('El campo de contraseña está vacio');
      return false;
    }  else  if ( no_guiones1 < 6 ) {
      swal({
        title: 'Error',
        text: 'Contraseña inválida, debe tener al menos 6 letras, números o combinados',
        icon: 'error',
        closeOnClickOutside: false,
        closeOnEsc: false
      });
      console.log('Contraseña inválida, debe tener al menos 6 letras, números o combinados');
      return false;
    } else if  ( document.Registrarse.txt_contraseña.value.length < 6 || 
                 document.Registrarse.txt_contraseña.value.length > 60 ) {
      swal({
        title: 'Error',
        text: 'Contraseña inválida, debe tener al menos 6 letras, números o combinados',
        icon: 'error',
        closeOnClickOutside: false,
        closeOnEsc: false
      });
    console.log('El campo de contraseña no tiene un valor de 6 a 60 carácteres');
    return false;
      } else if ( document.Registrarse.txt_contraseña2.value=="" ) {
        swal({
          title: 'Error',
          text: 'El campo de confirmación de contraseña está vacio',
          icon: 'error',
          closeOnClickOutside: false,
          closeOnEsc: false
        });
        console.log('El campo de confirmación de contraseña está vacio');
        return false;
      }  else  if ( no_guiones2 < 6 ) {
        swal({
          title: 'Error',
          text: 'Confirmación de contraseña inválida, debe tener al menos 6 letras, números o combinados',
          icon: 'error',
          closeOnClickOutside: false,
          closeOnEsc: false
        });
        console.log('Confirmación de contraseña inválida, debe tener al menos 6 letras, números o combinados');
        return false;
      } else if  ( document.Registrarse.txt_contraseña2.value.length < 6 || 
                   document.Registrarse.txt_contraseña2.value.length > 60 ) {
        swal({
          title: 'Error',
          text: 'El campo de confirmación de contraseña no tiene un valor de 6 a 60 carácteres',
          icon: 'error',
          closeOnClickOutside: false,
          closeOnEsc: false
        });
      console.log('El campo de confirmación de contraseña no tiene un valor de 6 a 60 carácteres');
      return false;
    } else if ( (valor_contraseña1!= valor_contraseña2) || (valor_contraseña2 != valor_contraseña1) ) {
      swal({
        title: 'Error',
        text: 'Los campos  de contraseña tienen valores distintos',
        icon: 'error',
        closeOnClickOutside: false,
        closeOnEsc: false
      });
      console.log('Los campos  de contraseña tienen valores distintos');
      return false;
    }
  return true;
}


//funcion que valida el campo de busqueda
function Validar_Buscar_Marcas(){
  var valor_busqueda = document.Buscar_marca.txt_buscar.value,
        array_texto_busqueda = valor_busqueda.split(""),
        caracter_mas = valor_busqueda.indexOf("+"),
        caracter_menos = valor_busqueda.indexOf("-"),
        no_espacios_guiones = 0;
  for ( b in array_texto_busqueda ) {
    if ( array_texto_busqueda[b] != " " && array_texto_busqueda[b]!="." ) {
      no_espacios_guiones++;
    }
  }
  if ( valor_busqueda == "" ) {
    swal({
      title: 'Error',
      text: 'El campo de búsqueda está vacío',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de búsqueda está vacío');
    return false;
  } else if ( no_espacios_guiones == 0 ) {
    swal({
      title: 'Error',
      text: 'El campo de búsqueda necesita al menos 1 carácter válido',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de búsqueda necesita al menos 1 carácter válido');
    return false;
  } else if ( caracter_mas!=-1 || caracter_menos!=-1 ) {
    swal({
      title: 'Error',
      text: 'El campo de búsqueda tiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de búsqueda contiene carácteres inválidos');
    return false;
  } else if ( document.Buscar_marca.txt_buscar.value.length < 1 ||
              document.Buscar_marca.txt_buscar.value.length > 50 ) {
    swal({
      title: 'Error',
      text: 'El campo de búsqueda no tiene al menos 1 carácter o sobrepasa los 50',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de búsqueda no tiene al menos 1 carácter o sobrepasa los 50');
    return false;              
  }
  return true;
}

//funcion que valida el campo de busqueda
function Validar_Buscar_Productos(){
  var valor_busqueda = document.Buscar_producto.txt_buscar.value,
        array_texto_busqueda = valor_busqueda.split(""),
        caracter_mas = valor_busqueda.indexOf("+"),
        caracter_menos = valor_busqueda.indexOf("-"),
        no_espacios_guiones = 0;
  for ( b in array_texto_busqueda ) {
    if ( array_texto_busqueda[b] != " " && array_texto_busqueda[b]!="." ) {
      no_espacios_guiones++;
    }
  }
  if ( valor_busqueda == "" ) {
    swal({
      title: 'Error',
      text: 'El campo de búsqueda está vacío',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de búsqueda está vacío');
    return false;
  } else if ( no_espacios_guiones == 0 ) {
    swal({
      title: 'Error',
      text: 'El campo de búsqueda necesita al menos 1 carácter válido',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de búsqueda necesita al menos 1 carácter válido');
    return false;
  } else if ( caracter_mas!=-1 || caracter_menos!=-1 ) {
    swal({
      title: 'Error',
      text: 'El campo de búsqueda tiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de búsqueda contiene carácteres inválidos');
    return false;
  } else if ( document.Buscar_producto.txt_buscar.value.length < 1 ||
              document.Buscar_producto.txt_buscar.value.length > 50 ) {
    swal({
      title: 'Error',
      text: 'El campo de búsqueda no tiene al menos 1 carácter o sobrepasa los 50',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de búsqueda no tiene al menos 1 carácter o sobrepasa los 50');
    return false;              
  }
  return true;
}

/*Función para validar el formulario de compras o editar la 
cantidad de producto del carrito*/
function validarCompras() {
  var precio = document.Form_compra.precio.value,
        cantidad = document.Form_compra.cantidad.value,
        cantidad2 = document.Form_compra.txt_cantidad.value,
        array1 = document.Form_compra.precio.value.split(""),
        array2 = document.Form_compra.cantidad.value.split(""),
        array4 = document.Form_compra.txt_cantidad.value.split(""),
        caracteres_invalidos1 = 0,
        caracteres_invalidos2 = 0,
        caracteres_invalidos4 = 0;
  for ( a in array1 ) {
    if ( array1 [a] != "." && array1 [a] != "0" &&
        array1 [a] != "1" && array1 [a] != "2" && 
        array1 [a] != "3" && array1 [a] != "4" &&
        array1 [a] != "5" && array1 [a] != "6" && 
        array1 [a] != "7" && array1 [a] != "8" &&
        array1 [a] != "9" ) {
        caracteres_invalidos1++;
        break;
      }
  }
  for ( b in array2 ) {
    if ( array2 [b] != "0" && array2 [b] != "1" && 
        array2 [b] != "2" && array2 [b] != "3" && 
        array2 [b] != "4" && array2 [b] != "5" && 
        array2 [b] != "6" && array2 [b] != "7" && 
        array2 [b] != "8" && array2 [b] != "9" ) {
        caracteres_invalidos2++;
        break;
      }
  }
  for ( d in array4 ) {
    if ( array4 [d] != "0" && array4 [d] != "1" && 
         array4 [d] != "2" && array4 [d] != "3" && 
         array4 [d] != "4" && array4 [d] != "5" && 
         array4 [d] != "6" && array4 [d] != "7" && 
         array4 [d] != "8" && array4 [d] != "9" ) {
        caracteres_invalidos4++;
        break;
      }
  }
  
  if ( isNaN(precio) || isNaN(cantidad) || isNaN(cantidad2) ) {
    swal({
      title: 'Error',
      text: 'Algún campo tiene un valor indefinido',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('Algún campo tiene un valor indefinido');
    return false;
  } else if ( precio == '' || cantidad == '' || cantidad2 == '' ) {
    swal({
      title: 'Error',
      text: 'Algún campo está vacío',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('Algún campo está vacío');
    return false;
  } else if ( caracteres_invalidos1 != 0 || caracteres_invalidos2 != 0 ||
              caracteres_invalidos4 != 0 ) {
    swal({
      title: 'Error',
      text: 'Algún campo está vacío',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('Algún campo está vacío');
    return false;
  } else if ( precio <= 0 || cantidad <= 0 || cantidad2 <= 0 ) {
    swal({
      title: 'Error',
      text: 'Algún campo tiene un valor menor o igual a 0',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('Algún campo tiene un valor menor o igual a 0');
    return false;
  } else if ( cantidad > 100 || cantidad2 > 100 ) {
    swal({
      title: 'Error',
      text: 'Algún campo tiene un valor mayor a 100',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('Algún campo tiene un valor mayor a 100');
    return false;
  } else if ( isFinite(precio) == false || isFinite(cantidad)==false || 
              isFinite(cantidad2)==false ) {
    swal({
      title: 'Error',
      text: 'Algún campo tiene un valor que no númerico',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('Algún campo tiene un valor que no númerico');
    return false;
  }
  return true;
}

/*Función que valida los datos cuando se finalizará un pedido*/
function validarFinalizarPedido() {
  var direccion = document.Form_factura.txt_direccion.value,
        fecha = document.Form_factura.txt_fecha.value,
        pago = document.Form_factura.cb_tipo.selectedIndex;
  if ( direccion == '' || fecha == '' || pago == '' ) {
    swal({
      title: 'Error',
      text: 'Algún campo está vacío',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('Algún campo está vacío');
    return false;
  } else if ( direccion.length < 15 || direccion.length > 200 ) {
    swal({
      title: 'Error',
      text: 'El campo de dirección no tiene de 15 a 100 carácteres',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de dirección no tiene de 15 a 100 carácteres');
    return false;
  } else if ( pago == 0 ) {
    swal({
      title: 'Error',
      text: 'No ha seleccionado un tipo de pago',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('No ha seleccionado un tipo de pago');
    return false;
  }
  return true;
}


function validarReseñas() {
  var comentario = document.Form_resena.txt_comentario.value,
        calificacion = document.Form_resena.txt_calificacion.value,
        caracteres_invalidos1 = 0,
        array1 = document.Form_resena.txt_calificacion.value.split("");
  for ( a in array1 ) {
    if ( array1 [a] != "0" &&
        array1 [a] != "1" && array1 [a] != "2" && 
        array1 [a] != "3" && array1 [a] != "4" &&
        array1 [a] != "5" && array1 [a] != "6" && 
        array1 [a] != "7" && array1 [a] != "8" &&
        array1 [a] != "9" ) {
        caracteres_invalidos1++;
        break;
      }
  }
  if ( comentario == '' || calificacion == '' ) {
    swal({
      title: 'Error',
      text: 'Hay campos vacios',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('Hay campos vacíos');
    return false;
  } else if ( comentario.length < 1 || comentario.length > 100 ) {
    swal({
      title: 'Error',
      text: 'El campo de comentario debe tener entre 1 y 100 carácteres',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de comentario debe tener entre 1 y 100 carácteres');
    return false;
  } else if ( isNaN(calificacion) ) {  
    swal({
      title: 'Error',
      text: 'La calificacion tiene un valor indefinido',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('La calificacion tiene un valor indefinido');
    return false;
  } else if ( isFinite(calificacion) == false ) {  
    swal({
      title: 'Error',
      text: 'La calificacion tiene un valor no númerico',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('La calificacion tiene un valor no númerico');
    return false;
  } else if ( calificacion < 1 || calificacion > 10 ) {  
    swal({
      title: 'Error',
      text: 'La calificacion debe estar entre 1 y 10',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('La calificacion debe estar entre 1 y 10');
    return false;
  } else if ( caracteres_invalidos1 > 0 ) {  
    swal({
      title: 'Error',
      text: 'El campo de calificacion tiene valores inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de calificacion tiene valores inválidos');
    return false;
  }
  return true;
}