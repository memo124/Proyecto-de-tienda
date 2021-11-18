//Aca se elimina el copy paste con jquery
$('body').bind('copy paste',function(e) {
  e.preventDefault(); return false; 
});

//método que valida la escritura de algun campo
function ValidarEscritura($Evento, $permitidos, evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode;
   if (charCode == 46 ){
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
  var charCode = (evt.which) ? evt.which : event.keyCode;
  if (charCode == 46 ){
    return false;
  } else {
    var $numeros = "0123456789",
          $caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóú",
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
function ValidarEscritura4($Evento, $permitidos, evt) {
  var charCode = (evt.which) ? evt.which : event.keyCode;
  if (charCode == 46 ){
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
  var charCode = (evt.which) ? evt.which : event.keyCode;
  if (charCode == 46 ){
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
  var charCode = (evt.which) ? evt.which : event.keyCode;
  if (charCode == 46 ){
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
  var charCode = (evt.which) ? evt.which : event.keyCode;
   if (charCode == 46 ){
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
        noespacios_guiones = 0;
        array_texto_contraseña = document.Iniciar_Sesion.txt_contraseña_usuario.value.split("");
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
  if ( document.Iniciar_Sesion.txt_usuario.value=="") {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'El campo de usuario está vacio',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('El campo de usuario está vacio');
      return false; 
  } else if  (document.Iniciar_Sesion.txt_usuario.value.length < 8 || 
              document.Iniciar_Sesion.txt_usuario.value.length > 30 ) {
             Swal.fire({
               title: '<h3><b>Error</b></h3>',
               icon: 'error',
               text:'El campo de usuario no tiene un valor de 8 a 30 carácteres',
               confirmButtonColor: '#212121',
               confirmButtonText: 'Aceptar',
               showClass:{
                 popup: 'animated fadeInDown'
               },
               hideClass: {
                   popup: 'animated hinge'
               }
             });
             console.log('El campo de usuario no tiene un valor de 8 a 30 carácteres');
             return false; 
  } else  if ( noespacios_guiones<8 ){
              Swal.fire({
                title: '<h3><b>Error</b></h3>',
                icon: 'error',
                text:'Nombre de usuario inválido, debe tener al menos 8 letras, números o combinados',
                confirmButtonColor: '#212121',
                confirmButtonText: 'Aceptar',
                showClass:{
                  popup: 'animated fadeInDown'
                },
                hideClass: {
                    popup: 'animated hinge'
                }
              });
              console.log('Nombre de usuario inválido, debe tener al menos 8 letras, números o combinados');
              return false; 
  } else if ( document.Iniciar_Sesion.txt_contraseña_usuario.value=="") {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de contraseña está vacio',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
          popup: 'animated hinge'
      }
    });
    console.log('El campo de contraseña está vacio');
    return false;
  } else if  (document.Iniciar_Sesion.txt_contraseña_usuario.value.length < 6 || 
        document.Iniciar_Sesion.txt_contraseña_usuario.value.length > 60 ) {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'El campo de contraseña no tiene un valor de 6 a 60 carácteres',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('El campo de contraseña no tiene un valor de 6 a 60 carácteres');
      return false;
  }  else  if ( no_guiones<6 ){
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'Contraseña inválida, debe tener al menos 6 letras, números o combinados',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
          popup: 'animated hinge'
      }
    });
    console.log('Contraseña inválida, debe tener al menos 6 letras, números o combinados');
    return false;
  }
  return true;
}



//función que valida que los datos del usuario al ser ingresados al recuperar la contraseña estén correctos
function DatosCorrectos() {
  var array_texto_usuario = document.Paso1.txt_usuario.value.split(""),
    noespacios_guiones = 0,
    no_guiones = 0,
    valor_correo = document.Paso1.txt_correo_usuario.value,
    expresion_correo = /\w+@\w+\.+[a-z]/ ;
  for ( w in array_texto_usuario ) {
    if ( array_texto_usuario[w]!=' ' && array_texto_usuario[w]!='_' ) {
      noespacios_guiones++;
    }
  }

  if ( document.Paso1.txt_usuario.value=="") {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'El campo de usuario está vacio',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('El campo de usuario está vacio');
      return false; 
  } else if  (document.Paso1.txt_usuario.value.length < 8 || 
           document.Paso1.txt_usuario.value.length > 30 ) {
             Swal.fire({
               title: '<h3><b>Error</b></h3>',
               icon: 'error',
               text:'El campo de usuario no tiene un valor de 8 a 30 carácteres',
               confirmButtonColor: '#212121',
               confirmButtonText: 'Aceptar',
               showClass:{
                 popup: 'animated fadeInDown'
               },
               hideClass: {
                   popup: 'animated hinge'
               }
             });
             console.log('El campo de usuario no tiene un valor de 8 a 30 carácteres');
             return false; 
  } else  if ( noespacios_guiones<8 ){
              Swal.fire({
                title: '<h3><b>Error</b></h3>',
                icon: 'error',
                text:'Nombre de usuario inválido, debe tener al menos 8 letras, números o combinados',
                confirmButtonColor: '#212121',
                confirmButtonText: 'Aceptar',
                showClass:{
                  popup: 'animated fadeInDown'
                },
                hideClass: {
                    popup: 'animated hinge'
                }
              });
              console.log('Nombre de usuario inválido, debe tener al menos 8 letras, números o combinados');
              return false; 
  }else if ( document.Paso1.txt_correo_usuario.value=="" ) {
              Swal.fire({
                title: '<h3><b>Error</b></h3>',
                icon: 'error',
                text:'El campo de correo está vacio',
                confirmButtonColor: '#212121',
                confirmButtonText: 'Aceptar',
                showClass:{
                  popup: 'animated fadeInDown'
                },
                hideClass: {
                    popup: 'animated hinge'
                }
              });
              console.log('El campo de correo está vacio');
              return false; 
  } else if ( !expresion_correo.test(valor_correo) ) {
              Swal.fire({
                title: '<h3><b>Error</b></h3>',
                icon: 'error',
                text:'Formato de correo inválido',
                confirmButtonColor: '#212121',
                confirmButtonText: 'Aceptar',
                showClass:{
                  popup: 'animated fadeInDown'
                },
                hideClass: {
                    popup: 'animated hinge'
                }
              });
              console.log('Formato de correo inválido');
              return false; 
  }else if  (document.Paso1.txt_correo_usuario.value.indexOf('@')==-1 || 
            document.Paso1.txt_correo_usuario.value.indexOf('.')==-1 ) {
              Swal.fire({
                title: '<h3><b>Error</b></h3>',
                icon: 'error',
                text:'El campo de correo no contiene "@" o "."',
                confirmButtonColor: '#212121',
                confirmButtonText: 'Aceptar',
                showClass:{
                  popup: 'animated fadeInDown'
                },
                hideClass: {
                    popup: 'animated hinge'
                }
              });
              console.log('El campo de correo no contiene "@" o "."');
              return false; 
  } else if  (document.Paso1.txt_correo_usuario.value.length < 15|| 
            document.Paso1.txt_correo_usuario.value.length > 100 ) {
              Swal.fire({
                title: '<h3><b>Error</b></h3>',
                icon: 'error',
                text:'El correo no tiene un valor de 15 a 100 carácteres',
                confirmButtonColor: '#212121',
                confirmButtonText: 'Aceptar',
                showClass:{
                  popup: 'animated fadeInDown'
                },
                hideClass: {
                    popup: 'animated hinge'
                }
              });
              console.log('El correo no tiene un valor de 15 a 100 carácteres');
              return false; 
  }
 return true;
}

//función que valida que los codigos del usuario al ser ingresados al recuperar la contraseña estén correctos
function CodigoCorrecto(){
var codigo1 = document.Paso2.txt_codigo.value,
   codigo2 = document.Paso2.txt_codigo2.value;
   tamaño_codigo1 = codigo1.length,
   tamaño_codigo2 = codigo2.length;
   array_codigo1 = codigo1.split("");
   array_codigo2 = codigo2.split("");
  caracteres_no_numeros1 = 0;
  caracteres_no_numeros2 = 0;
  for ( a in array_codigo1) {
    if ( (array_codigo1[a]!=0) && (array_codigo1[a]!=1) && (array_codigo1[a]!=2) && (array_codigo1[a]!=3) &&
       (array_codigo1[a]!=4) && (array_codigo1[a]!=5) && (array_codigo1[a]!=6) && (array_codigo1[a]!=7) &&
       (array_codigo1[a]!=8) && (array_codigo1[a]!=9) ) {
      caracteres_no_numeros1++;
      break;
    }
  }

  for ( b in array_codigo2) {
    if ( (array_codigo2[b]!=0) && (array_codigo2[b]!=1) && (array_codigo2[b]!=2) && (array_codigo2[b]!=3) &&
       (array_codigo2[b]!=4) && (array_codigo2[b]!=5) && (array_codigo2[b]!=6) && (array_codigo2[b]!=7) &&
       (array_codigo2[b]!=8) && (array_codigo2[b]!=9) ) {
      caracteres_no_numeros2++;
      break;
    }
  }
if ( codigo1 == '' ) {
Swal.fire({
 title: '<h3><b>Error</b></h3>',
 icon: 'error',
 text:'El campo de código está vacío',
 confirmButtonColor: '#212121',
 confirmButtonText: 'Aceptar',
 showClass:{
   popup: 'animated fadeInDown'
 },
 hideClass: {
     popup: 'animated hinge'
 }
});
console.log('El campo de código está vacío');
return false;
} else if ( isNaN( codigo1 ) || (codigo1<100000 || codigo1>999999) || (caracteres_no_numeros1!=0) || (!(codigo1 % 1==0)) ) {
Swal.fire({
 title: '<h3><b>Error</b></h3>',
 icon: 'error',
 text:'El campo de código tiene un valor indefinido o inválido',
 confirmButtonColor: '#212121',
 confirmButtonText: 'Aceptar',
 showClass:{
   popup: 'animated fadeInDown'
 },
 hideClass: {
     popup: 'animated hinge'
 }
});
console.log('El campo de código tiene un valor indefinido o inválido');
return false;
} else if ( tamaño_codigo1 != 6 ) {
Swal.fire({
 title: '<h3><b>Error</b></h3>',
 icon: 'error',
 text:'El campo de código no tiene un valor de 6 digitos',
 confirmButtonColor: '#212121',
 confirmButtonText: 'Aceptar',
 showClass:{
   popup: 'animated fadeInDown'
 },
 hideClass: {
     popup: 'animated hinge'
 }
});
console.log('El campo de código no tiene un valor de 6 digitos');
return false;
} else if ( codigo2 == '' ) {
Swal.fire({
 title: '<h3><b>Error</b></h3>',
 icon: 'error',
 text:'El campo de confirmación de código está vacío',
 confirmButtonColor: '#212121',
 confirmButtonText: 'Aceptar',
 showClass:{
   popup: 'animated fadeInDown'
 },
 hideClass: {
     popup: 'animated hinge'
 }
});
console.log('El campo de confirmación de código está vacío');
return false;
} else if ( isNaN( codigo2 ) || (codigo1<100000 || codigo1>999999) || (caracteres_no_numeros2!=0) || (!(codigo2 % 1==0)) ) {
Swal.fire({
 title: '<h3><b>Error</b></h3>',
 icon: 'error',
 text:'El campo de confirmación de código tiene un valor indefinido o inválido',
 confirmButtonColor: '#212121',
 confirmButtonText: 'Aceptar',
 showClass:{
   popup: 'animated fadeInDown'
 },
 hideClass: {
     popup: 'animated hinge'
 }
});
console.log('El campo de confirmación de código tiene un valor indefinido o inválido');
return false;
} else if ( tamaño_codigo2 != 6 ) {
Swal.fire({
 title: '<h3><b>Error</b></h3>',
 icon: 'error',
 text:'El campo de confirmación de código no tiene un valor de 6 digitos',
 confirmButtonColor: '#212121',
 confirmButtonText: 'Aceptar',
 showClass:{
   popup: 'animated fadeInDown'
 },
 hideClass: {
     popup: 'animated hinge'
 }
});
console.log('El campo de confirmación de código no tiene un valor de 6 digitos');
return false;
} else if ( codigo1 != codigo2 || codigo2 != codigo1 ) {
Swal.fire({
 title: '<h3><b>Error</b></h3>',
 icon: 'error',
 text:'Los campos tienen valores distintos',
 confirmButtonColor: '#212121',
 confirmButtonText: 'Aceptar',
 showClass:{
   popup: 'animated fadeInDown'
 },
 hideClass: {
     popup: 'animated hinge'
 }
});
console.log('Los campos tienen valores distintos');
return false;
}
return true;
}

//funcion que valida las contraseñas al momento de recuperar la contraseña en el paso 3
function Validar_Contraseñas1() {
  var array_texto_contraseña_paso3 = document.Paso3.txt_contraseña_usuario.value.split("");
        no_guiones_paso3 = 0;
        array_texto_contraseña2_paso3 = document.Paso3.txt_contraseña_usuario2.value.split("");
        no_guiones2_paso3 = 0;
        valor_contraseña_paso3 = document.Paso3.txt_contraseña_usuario.value;
        valor_contraseña2_paso3 = document.Paso3.txt_contraseña_usuario2.value;
    for ( x in array_texto_contraseña_paso3 ) {
      if ( array_texto_contraseña_paso3[x]!='_' ) {
        no_guiones_paso3++;
      }
    }
    for ( x in array_texto_contraseña2_paso3 ) {
      if ( array_texto_contraseña2_paso3[x]!='_' ) {
        no_guiones2_paso3++;
      }
    }
    if ( document.Paso3.txt_contraseña_usuario.value=="") {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'El campo de contraseña está vacio',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('El campo de contraseña está vacio');
      return false;
    }  else  if ( no_guiones_paso3<6 ){
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'Contraseña inválida, debe tener al menos 6 letras, números o combinados',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('Contraseña inválida, debe tener al menos 6 letras, números o combinados');
      return false;
    } else if  (document.Paso3.txt_contraseña_usuario.value.length < 6 || 
                document.Paso3.txt_contraseña_usuario.value.length > 60 ) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de contraseña no tiene un valor de 6 a 60 carácteres',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
          popup: 'animated hinge'
      }
    });
    console.log('El campo de contraseña no tiene un valor de 6 a 60 carácteres');
    return false;
      } else if ( document.Paso3.txt_contraseña_usuario2.value=="") {
        Swal.fire({
          title: '<h3><b>Error</b></h3>',
          icon: 'error',
          text:'El campo de confirmación de contraseña está vacio',
          confirmButtonColor: '#212121',
          confirmButtonText: 'Aceptar',
          showClass:{
            popup: 'animated fadeInDown'
          },
          hideClass: {
              popup: 'animated hinge'
          }
        });
        console.log('El campo de confirmación de contraseña está vacio');
        return false;
      }  else  if ( no_guiones2_paso3<6 ){
        Swal.fire({
          title: '<h3><b>Error</b></h3>',
          icon: 'error',
          text:'Confirmación de contraseña inválida, debe tener al menos 6 letras, números o combinados',
          confirmButtonColor: '#212121',
          confirmButtonText: 'Aceptar',
          showClass:{
            popup: 'animated fadeInDown'
          },
          hideClass: {
              popup: 'animated hinge'
          }
        });
        console.log('Confirmación de contraseña inválida, debe tener al menos 6 letras, números o combinados');
        return false;
      } else if  (document.Paso3.txt_contraseña_usuario2.value.length < 6 || 
                  document.Paso3.txt_contraseña_usuario2.value.length > 60 ) {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'El campo de confirmación de contraseña no tiene un valor de 6 a 60 carácteres',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('El campo de confirmación de contraseña no tiene un valor de 6 a 60 carácteres');
      return false;
    } else if ( (valor_contraseña_paso3 != valor_contraseña2_paso3) || (valor_contraseña2_paso3 != valor_contraseña_paso3) ) {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'Los campos tienen valores distintos',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('Los campos tienen valores distintos');
      return false;
    }
    return true;
}

//funcion que valida los campos de un formulario al registrarse
function Validar_Registrarse(){
  var   nombres = document.Registrarse.txt_nombres_usuario.value,
        array_nombre_usuario = document.Registrarse.txt_nombres_usuario.value.split(""),
        noespacios1 = 0;
        no_letras1=0;
        apellidos = document.Registrarse.txt_apellidos_usuario.value,
        array_apellido_usuario = document.Registrarse.txt_apellidos_usuario.value.split(""),
        noespacios2= 0;
        noletras2=0;
        expresion_correo = /\w+@\w+\.+[a-z]/ ,
        valor_correo = document.Registrarse.txt_correo_usuario.value,
        array_texto_contraseña1 = document.Registrarse.txt_contraseña_usuario.value.split("");
        no_guiones1 = 0;
        array_texto_contraseña2 = document.Registrarse.txt_contraseña_usuario2.value.split("");
        no_guiones2 = 0;
        valor_contraseña1 = document.Registrarse.txt_contraseña_usuario.value,
        valor_contraseña2 = document.Registrarse.txt_contraseña_usuario2.value;
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
  if ( nombres == '' ) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de nombre está vacío',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
        popup: 'animated hinge'
      }
    });
    console.log('El campo de nombre está vacío');
    return false; 
  } else if ( nombres.length < 2 || nombres.length > 50 ) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de nombre no tiene al menos 2 carácteres o sobrepasa los 50',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
        popup: 'animated hinge'
      }
    });
    console.log('El campo de nombre no tiene al menos 2 carácteres o sobrepasa los 50');
    return false; 
  } else if ( nombres.indexOf(0)!=-1 || nombres.indexOf(1)!=-1 || nombres.indexOf(2)!=-1 || 
              nombres.indexOf(3)!=-1 || nombres.indexOf(4)!=-1 || nombres.indexOf(5)!=-1 ||
              nombres.indexOf(6)!=-1 || nombres.indexOf(7)!=-1 || nombres.indexOf(8)!=-1 ||
              nombres.indexOf(9)!=-1 || nombres.indexOf('.')!=-1 || nombres.indexOf('+')!=-1 ||
              nombres.indexOf('-')!=-1 ) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de apellido no tiene al menos 2 letras',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
        popup: 'animated hinge'
        }
      });
      console.log('El campo de apellido no tiene al menos 2 letras');
      return false; 
  } else if ( noespacios1 < 2) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de nombre no tiene al menos 2 letras',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
        popup: 'animated hinge'
      }
    });
    console.log('El campo de nombre no tiene al menos 2 letras');
    return false; 
  } if ( apellidos == '' ) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de apellido está vacío',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
        popup: 'animated hinge'
      }
    });
    console.log('El campo de apellido está vacío');
    return false; 
  } else if ( apellidos.length < 2 || apellidos.length > 50 ) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de apellido no tiene al menos 2 carácteres o sobrepasa los 50',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
        popup: 'animated hinge'
      }
    });
    console.log('El campo de apellido no tiene al menos 2 carácteres o sobrepasa los 50');
    return false; 
  } else if ( apellidos.indexOf(0)!=-1 || apellidos.indexOf(1)!=-1 || apellidos.indexOf(2)!=-1 || 
              apellidos.indexOf(3)!=-1 || apellidos.indexOf(4)!=-1 || apellidos.indexOf(5)!=-1 ||
              apellidos.indexOf(6)!=-1 || apellidos.indexOf(7)!=-1 || apellidos.indexOf(8)!=-1 ||
              apellidos.indexOf(9)!=-1 || apellidos.indexOf('.')!=-1 || apellidos.indexOf('+')!=-1 ||
              apellidos.indexOf('-')!=-1 ) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de apellido no tiene al menos 2 letras',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
        popup: 'animated hinge'
      }
    });
    console.log('El campo de apellido no tiene al menos 2 letras');
    return false; 
  } else if ( noespacios2 < 2 ) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de apellido no tiene al menos 2 letras',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
          popup: 'animated hinge'
      }
    });
    console.log('El campo de apellido no tiene al menos 2 letras');
    return false; 
  } else if ( document.Registrarse.txt_correo_usuario.value=="" ) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de correo está vacio',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
          popup: 'animated hinge'
      }
    });
    console.log('El campo de correo está vacio');
    return false; 
  } else if ( !expresion_correo.test(valor_correo) ) {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'Formato de correo inválido',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('Formato de correo inválido');
      return false; 
  } else if  ( document.Registrarse.txt_correo_usuario.value.indexOf('@')==-1 || 
               document.Registrarse.txt_correo_usuario.value.indexOf('.')==-1 ) {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'El campo de correo no contiene "@" o "."',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('El campo de correo no contiene "@" o "."');
      return false; 
  } else if  ( document.Registrarse.txt_correo_usuario.value.length < 15|| 
               document.Registrarse.txt_correo_usuario.value.length > 100 ) {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'El correo no tiene un valor de 15 a 100 carácteres',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('El correo no tiene un valor de 15 a 100 carácteres');
      return false; 
  } else if ( document.Registrarse.txt_contraseña_usuario.value=="" ) {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'El campo de contraseña está vacio',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('El campo de contraseña está vacio');
      return false;
    }  else  if ( no_guiones1 < 6 ){
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'Contraseña inválida, debe tener al menos 6 letras, números o combinados',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('Contraseña inválida, debe tener al menos 6 letras, números o combinados');
      return false;
    } else if  ( document.Registrarse.txt_contraseña_usuario.value.length < 6 || 
                 document.Registrarse.txt_contraseña_usuario.value.length > 60 ) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de contraseña no tiene un valor de 6 a 60 carácteres',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
          popup: 'animated hinge'
      }
    });
    console.log('El campo de contraseña no tiene un valor de 6 a 60 carácteres');
    return false;
      } else if ( document.Registrarse.txt_contraseña_usuario2.value=="" ) {
        Swal.fire({
          title: '<h3><b>Error</b></h3>',
          icon: 'error',
          text:'El campo de confirmación de contraseña está vacio',
          confirmButtonColor: '#212121',
          confirmButtonText: 'Aceptar',
          showClass:{
            popup: 'animated fadeInDown'
          },
          hideClass: {
              popup: 'animated hinge'
          }
        });
        console.log('El campo de confirmación de contraseña está vacio');
        return false;
      }  else  if ( no_guiones2 < 6 ){
        Swal.fire({
          title: '<h3><b>Error</b></h3>',
          icon: 'error',
          text:'Confirmación de contraseña inválida, debe tener al menos 6 letras, números o combinados',
          confirmButtonColor: '#212121',
          confirmButtonText: 'Aceptar',
          showClass:{
            popup: 'animated fadeInDown'
          },
          hideClass: {
              popup: 'animated hinge'
          }
        });
        console.log('Confirmación de contraseña inválida, debe tener al menos 6 letras, números o combinados');
        return false;
      } else if  ( document.Registrarse.txt_contraseña_usuario2.value.length < 6 || 
                   document.Registrarse.txt_contraseña_usuario2.value.length > 60 ) {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'El campo de confirmación de contraseña no tiene un valor de 6 a 60 carácteres',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('El campo de confirmación de contraseña no tiene un valor de 6 a 60 carácteres');
      return false;
    } else if ( (valor_contraseña1!= valor_contraseña2) || (valor_contraseña2 != valor_contraseña1) ) {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'Los campos de contraseña tienen valores distintos',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('Los campos  de contraseña tienen valores distintos');
      return false;
    }
  return true;
}

//funcion que valida las contraseñas al momento de cambiarla
function Validar_Cambiar_Contraseña() {
  var array_texto_contraseña1 = document.Editar_Contraseña.contrasena_actual1.value.split("");
        no_guiones1 = 0;
        array_texto_contraseña2= document.Editar_Contraseña.contrasena_actual2.value.split("");
        no_guiones2 = 0;
        valor_contraseña1 = document.Editar_Contraseña.contrasena_actual1.value,
        valor_contraseña2 = document.Editar_Contraseña.contrasena_actual2.value,
        array_texto_contraseña3 = document.Editar_Contraseña.contrasena_nueva1.value.split("");
        no_guiones3 = 0;
        array_texto_contraseña4 = document.Editar_Contraseña.contrasena_nueva2.value.split("");
        no_guiones4 = 0;
        valor_contraseña3 = document.Editar_Contraseña.contrasena_nueva1.value,
        valor_contraseña4 = document.Editar_Contraseña.contrasena_nueva2.value;
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
    for ( c3 in array_texto_contraseña3 ) {
      if ( array_texto_contraseña3[c3]!='_' ) {
        no_guiones3++;
      }
    }
    for ( c4 in array_texto_contraseña4 ) {
      if ( array_texto_contraseña4[c4]!='_' ) {
        no_guiones4++;
      }
    }
    if ( document.Editar_Contraseña.contrasena_actual1.value=="" ) {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'El campo de contraseña está vacio',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('El campo de contraseña está vacio');
      return false;
    }  else  if ( no_guiones1 < 6 ){
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'Contraseña actual inválida, debe tener al menos 6 letras, números o combinados',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('Contraseña actual inválida, debe tener al menos 6 letras, números o combinados');
      return false;
    } else if  ( document.Editar_Contraseña.contrasena_actual1.value.length < 6 || 
                 document.Editar_Contraseña.contrasena_actual1.value.length > 60 ) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de contraseña actual no tiene un valor de 6 a 60 carácteres',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
          popup: 'animated hinge'
      }
    });
    console.log('El campo de contraseña actual no tiene un valor de 6 a 60 carácteres');
    return false;
      } else if ( document.Editar_Contraseña.contrasena_actual2.value=="" ) {
        Swal.fire({
          title: '<h3><b>Error</b></h3>',
          icon: 'error',
          text:'El campo de confirmación de contraseña actual está vacio',
          confirmButtonColor: '#212121',
          confirmButtonText: 'Aceptar',
          showClass:{
            popup: 'animated fadeInDown'
          },
          hideClass: {
              popup: 'animated hinge'
          }
        });
        console.log('El campo de confirmación de contraseña actual está vacio');
        return false;
      }  else  if ( no_guiones2 < 6 ){
        Swal.fire({
          title: '<h3><b>Error</b></h3>',
          icon: 'error',
          text:'Confirmación de contraseña actual inválida, debe tener al menos 6 letras, números o combinados',
          confirmButtonColor: '#212121',
          confirmButtonText: 'Aceptar',
          showClass:{
            popup: 'animated fadeInDown'
          },
          hideClass: {
              popup: 'animated hinge'
          }
        });
        console.log('Confirmación de contraseña actual inválida, debe tener al menos 6 letras, números o combinados');
        return false;
      } else if  ( document.Editar_Contraseña.contrasena_actual2.value.length < 6 || 
                   document.Editar_Contraseña.contrasena_actual2.value.length > 60 ) {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'El campo de confirmación de contraseña actual no tiene un valor de 6 a 60 carácteres',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('El campo de confirmación de contraseña actual no tiene un valor de 6 a 60 carácteres');
      return false;
    } else if ( (valor_contraseña1 != valor_contraseña2) || (valor_contraseña2 != valor_contraseña1) ) {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'Los campos de contraseña actual tienen valores distintos',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('Los campos  de contraseña actual tienen valores distintos');
      return false;
    } else if ( document.Editar_Contraseña.contrasena_nueva1.value=="" ) {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'El campo de contraseña nueva está vacio',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('El campo de contraseña nueva está vacio');
      return false;
    }  else  if ( no_guiones3 < 6 ){
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'Contraseña nueva inválida, debe tener al menos 6 letras, números o combinados',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('Contraseña nueva inválida, debe tener al menos 6 letras, números o combinados');
      return false;
    } else if  ( document.Editar_Contraseña.contrasena_nueva1.value.length < 6 || 
                 document.Editar_Contraseña.contrasena_nueva1.value.length > 60 ) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de contraseña nueva no tiene un valor de 6 a 60 carácteres',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
          popup: 'animated hinge'
      }
    });
    console.log('El campo de contraseña nueva no tiene un valor de 6 a 60 carácteres');
    return false;
      } else if ( document.Editar_Contraseña.contrasena_nueva2.value=="" ) {
        Swal.fire({
          title: '<h3><b>Error</b></h3>',
          icon: 'error',
          text:'El campo de confirmación de contraseña nueva está vacio',
          confirmButtonColor: '#212121',
          confirmButtonText: 'Aceptar',
          showClass:{
            popup: 'animated fadeInDown'
          },
          hideClass: {
              popup: 'animated hinge'
          }
        });
        console.log('El campo de confirmación de contraseña nueva está vacio');
        return false;
      }  else  if ( no_guiones4 < 6 ){
        Swal.fire({
          title: '<h3><b>Error</b></h3>',
          icon: 'error',
          text:'Confirmación de contraseña nueva inválida, debe tener al menos 6 letras, números o combinados',
          confirmButtonColor: '#212121',
          confirmButtonText: 'Aceptar',
          showClass:{
            popup: 'animated fadeInDown'
          },
          hideClass: {
              popup: 'animated hinge'
          }
        });
        console.log('Confirmación de contraseña nueva inválida, debe tener al menos 6 letras, números o combinados');
        return false;
      } else if  ( document.Editar_Contraseña.contrasena_nueva2.value.length < 6 || 
                   document.Editar_Contraseña.contrasena_nueva2.value.length > 60 ) {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'El campo de confirmación de contraseña actual no tiene un valor de 6 a 60 carácteres',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('El campo de confirmación de contraseña actual no tiene un valor de 6 a 60 carácteres');
      return false;
    } else if ( (valor_contraseña3 != valor_contraseña4) || (valor_contraseña4 != valor_contraseña3) ) {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'Los campos de contraseña nueva tienen valores distintos',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('Los campos  de contraseña nueva tienen valores distintos');
      return false;
    } else if ( (valor_contraseña1 && valor_contraseña2) == (valor_contraseña3 && valor_contraseña4) ) {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'Los campos  de contraseña nueva son iguales a  la contraseña actual',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('Los campos  de contraseña nueva son iguales a  la contraseña actual');
      return false;
    }
    return true;
}

//funcion que valida llos campos del formulario de editar perfil
function Validar_Editar_Perfil() {
  var  nombres = document.Editar_Perfil.txt_nombres_perfil.value,
        array_nombre_usuario = document.Editar_Perfil.txt_nombres_perfil.value.split(""),
        noespacios1 = 0;
        apellidos = document.Editar_Perfil.txt_apellidos_perfil.value,
        array_apellido_usuario = document.Editar_Perfil.txt_apellidos_perfil.value.split(""),
        noespacios2= 0;
        expresion_correo = /\w+@\w+\.+[a-z]/ ,
        valor_correo = document.Editar_Perfil.txt_correo_usuario.value;
        array_texto_usuario = document.Editar_Perfil.txt_usuario_perfil.value.split(""),
        noespacios_guiones = 0;
  for ( w in array_texto_usuario ) {
    if ( array_texto_usuario[w]!=' ' && array_texto_usuario[w]!='_' ) {
      noespacios_guiones++;
    }
  }
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
  if ( nombres == '' ) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de nombre está vacío',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
        popup: 'animated hinge'
      }
    });
    console.log('El campo de nombre está vacío');
    return false; 
  } else if ( nombres.length < 2 || nombres.length > 50 ) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de nombre no tiene al menos 2 carácteres o sobrepasa los 50',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
        popup: 'animated hinge'
      }
    });
    console.log('El campo de nombre no tiene al menos 2 carácteres o sobrepasa los 50');
    return false; 
  } else if ( nombres.indexOf(0)!=-1 || nombres.indexOf(1)!=-1 || nombres.indexOf(2)!=-1 || 
              nombres.indexOf(3)!=-1 || nombres.indexOf(4)!=-1 || nombres.indexOf(5)!=-1 ||
              nombres.indexOf(6)!=-1 || nombres.indexOf(7)!=-1 || nombres.indexOf(8)!=-1 ||
              nombres.indexOf(9)!=-1 || nombres.indexOf('.')!=-1 || nombres.indexOf('+')!=-1 ||
              nombres.indexOf('-')!=-1 ) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de apellido no tiene al menos 2 letras',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
        popup: 'animated hinge'
        }
      });
      console.log('El campo de apellido no tiene al menos 2 letras');
      return false; 
  } else if ( noespacios1 < 2) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de nombre no tiene al menos 2 letras',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
        popup: 'animated hinge'
      }
    });
    console.log('El campo de nombre no tiene al menos 2 letras');
    return false; 
  } if ( apellidos == '' ) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de apellido está vacío',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
        popup: 'animated hinge'
      }
    });
    console.log('El campo de apellido está vacío');
    return false; 
  } else if ( apellidos.length < 2 || apellidos.length > 50 ) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de apellido no tiene al menos 2 carácteres o sobrepasa los 50',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
        popup: 'animated hinge'
      }
    });
    console.log('El campo de apellido no tiene al menos 2 carácteres o sobrepasa los 50');
    return false; 
  } else if ( apellidos.indexOf(0)!=-1 || apellidos.indexOf(1)!=-1 || apellidos.indexOf(2)!=-1 || 
              apellidos.indexOf(3)!=-1 || apellidos.indexOf(4)!=-1 || apellidos.indexOf(5)!=-1 ||
              apellidos.indexOf(6)!=-1 || apellidos.indexOf(7)!=-1 || apellidos.indexOf(8)!=-1 ||
              apellidos.indexOf(9)!=-1 || apellidos.indexOf('.')!=-1 || apellidos.indexOf('+')!=-1 ||
              apellidos.indexOf('-')!=-1 ) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de apellido no tiene al menos 2 letras',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
        popup: 'animated hinge'
      }
    });
    console.log('El campo de apellido no tiene al menos 2 letras');
    return false; 
  } else if ( noespacios2 < 2 ) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de apellido no tiene al menos 2 letras',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
          popup: 'animated hinge'
      }
    });
    console.log('El campo de apellido no tiene al menos 2 letras');
    return false; 
  } else if ( document.Editar_Perfil.txt_correo_usuario.value=="" ) {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de correo está vacio',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
          popup: 'animated hinge'
      }
    });
    console.log('El campo de correo está vacio');
    return false; 
  } else if ( !expresion_correo.test(valor_correo) ) {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'Formato de correo inválido',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('Formato de correo inválido');
      return false; 
  } else if  ( document.Editar_Perfil.txt_correo_usuario.value.indexOf('@')==-1 || 
               document.Editar_Perfil.txt_correo_usuario.value.indexOf('.')==-1 ) {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'El campo de correo no contiene "@" o "."',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('El campo de correo no contiene "@" o "."');
      return false; 
  } else if  ( document.Editar_Perfil.txt_correo_usuario.value.length < 15|| 
               document.Editar_Perfil.txt_correo_usuario.value.length > 100 ) {
      Swal.fire({
        title: '<h3><b>Error</b></h3>',
        icon: 'error',
        text:'El correo no tiene un valor de 15 a 100 carácteres',
        confirmButtonColor: '#212121',
        confirmButtonText: 'Aceptar',
        showClass:{
          popup: 'animated fadeInDown'
        },
        hideClass: {
            popup: 'animated hinge'
        }
      });
      console.log('El correo no tiene un valor de 15 a 100 carácteres');
      return false; 
  } else if ( document.Editar_Perfil.txt_usuario_perfil.value=="") {
    Swal.fire({
      title: '<h3><b>Error</b></h3>',
      icon: 'error',
      text:'El campo de usuario está vacio',
      confirmButtonColor: '#212121',
      confirmButtonText: 'Aceptar',
      showClass:{
        popup: 'animated fadeInDown'
      },
      hideClass: {
          popup: 'animated hinge'
      }
    });
    console.log('El campo de usuario está vacio');
    return false; 
} else if ( document.Editar_Perfil.txt_usuario_perfil.value.length < 8 || 
            document.Editar_Perfil.txt_usuario_perfil.value.length > 30 ) {
           Swal.fire({
             title: '<h3><b>Error</b></h3>',
             icon: 'error',
             text:'El campo de usuario no tiene un valor de 8 a 30 carácteres',
             confirmButtonColor: '#212121',
             confirmButtonText: 'Aceptar',
             showClass:{
               popup: 'animated fadeInDown'
             },
             hideClass: {
                 popup: 'animated hinge'
             }
           });
           console.log('El campo de usuario no tiene un valor de 8 a 30 carácteres');
           return false; 
} else  if ( noespacios_guiones < 8 ){
            Swal.fire({
              title: '<h3><b>Error</b></h3>',
              icon: 'error',
              text:'Nombre de usuario inválido, debe tener al menos 8 letras, números o combinados',
              confirmButtonColor: '#212121',
              confirmButtonText: 'Aceptar',
              showClass:{
                popup: 'animated fadeInDown'
              },
              hideClass: {
                  popup: 'animated hinge'
              }
            });
            console.log('Nombre de usuario inválido, debe tener al menos 8 letras, números o combinados');
            return false; 
}
  return true;
}

//funcion que valida los campos del formulario de clientes
function Validar_Clientes() {
  var id = document.Form_clientes.id_cliente.value,
          nombres = document.Form_clientes.txt_nombres_cliente.value,
          array_nombre_cliente = document.Form_clientes.txt_nombres_cliente.value.split(""),
          noespacios1 = 0,
          apellidos = document.Form_clientes.txt_apellidos_cliente.value,
          array_apellido_cliente = document.Form_clientes.txt_apellidos_cliente.value.split(""),
          noespacios2= 0,
          expresion_correo = /\w+@\w+\.+[a-z]/ ,
          valor_correo = document.Form_clientes.txt_correo_cliente.value;
          array_texto_usuario = document.Form_clientes.txt_usuario_cliente.value.split(""),
          noespacios_guiones = 0,
          array_texto_contraseña = document.Form_clientes.txt_contraseña_cliente.value.split(""),
          no_guiones = 0;
for ( w in array_texto_usuario ) {
  if ( array_texto_usuario[w]!=' ' && array_texto_usuario[w]!='_' ) {
    noespacios_guiones++;
  }
}
for ( n in array_nombre_cliente ) {
  if ( array_nombre_cliente[n]!=' ' ) {
    noespacios1++;
  }
}
for ( a in array_apellido_cliente ) {
  if ( array_apellido_cliente[a]!=' ' ) {
    noespacios2++;
  }
}
for ( x in array_texto_contraseña ) {
  if ( array_texto_contraseña[x]!='_' ) {
    no_guiones++;
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
            text: 'El campo de nombres tiene carácteres inválidos',
            icon: 'error',
            closeOnClickOutside: false,
            closeOnEsc: false
        })
console.log('El campo de nombres tiene carácteres inválidos');
return false; 
} else if ( noespacios1 < 2) {
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
            text: 'El campo de apellido tiene carácteres inválidos',
            icon: 'error',
            closeOnClickOutside: false,
            closeOnEsc: false
        })
console.log('El campo de apellido tiene carácteres inválidos');
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
} else if ( document.Form_clientes.txt_correo_cliente.value=="" ) {
  swal({
    title: 'Error',
    text: 'El campo de correo está vacío',
    icon: 'error',
    closeOnClickOutside: false,
    closeOnEsc: false
})
console.log('El campo de correo está vacio');
return false; 
} else if ( !expresion_correo.test(valor_correo) ) {
  swal({
    title: 'Error',
    text: 'El correo tiene un formato inválido',
    icon: 'error',
    closeOnClickOutside: false,
    closeOnEsc: false
})
console.log('El correo tiene un formato inválido');
return false; 
} else if  ( document.Form_clientes.txt_correo_cliente.value.indexOf('@')==-1 || 
             document.Form_clientes.txt_correo_cliente.value.indexOf('.')==-1 ) {
              swal({
                title: 'Error',
                text: 'El correo no tiene "@" o "."',
                icon: 'error',
                closeOnClickOutside: false,
                closeOnEsc: false
            })
console.log('El correo no tiene "@" o "."');
return false; 
} else if  ( document.Form_clientes.txt_correo_cliente.value.length < 15|| 
             document.Form_clientes.txt_correo_cliente.value.length > 100 ) {
              swal({
                title: 'Error',
                text: 'El correo no tiene 15 carácteres o sobrepasa los 100',
                icon: 'error',
                closeOnClickOutside: false,
                closeOnEsc: false
            })
console.log('El correo no tiene 15 carácteres o sobrepasa los 100');
return false; 
}
return true;
}

//funcion que valida el campo de busqueda de clientes
function Validar_Buscar_Cliente() {
  var valor_busqueda = document.Buscar_cliente.txt_buscar.value,
        array_texto_busqueda = valor_busqueda.split(""),
        caracter_mas = valor_busqueda.indexOf("+"),
        caracter_menos = valor_busqueda.indexOf("-"),
        no_espacios_guiones = 0;
  for ( b in array_texto_busqueda ) {
    if ( array_texto_busqueda[b] != " " && array_texto_busqueda[b]!="_" ) {
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
      text: 'No hay al menos un caracter para poder buscar',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
  })
    console.log('No hay al menos un caracter para poder buscar');
    return false;
  } else if ( caracter_mas!=-1 || caracter_menos!=-1 ) {
    swal({
      title: 'Error',
      text: 'El campo de busqueda contiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
  })
    console.log('El campo de busqueda contiene carácteres inválidos');
    return false;
  } else if ( document.Buscar_cliente.txt_buscar.value.length < 1 ||
              document.Buscar_cliente.txt_buscar.value.length > 100) {
                swal({
                  title: 'Error',
                  text: 'El campo de busqueda no tiene un carácter o sobrepasa los 100',
                  icon: 'error',
                  closeOnClickOutside: false,
                  closeOnEsc: false
              })
    console.log('El campo de busqueda no tiene un carácter o sobrepasa los 100');
    return false;              
  }
  return true;
}

//funcion que valida los campos del formulario de detalles de facturas
function Validar_Detalles() {
  var precio_comprado = document.Detalles_Facturas.txt_precio_comprados.value,
        array_precio = document.Detalles_Facturas.txt_precio_comprados.value.split(""),
        caracteres_invalidos1 = 0,
        cantidad_comprado = document.Detalles_Facturas.txt_cantidad_comprados.value,
        array_cantidad = document.Detalles_Facturas.txt_cantidad_comprados.value.split(""),
        caracteres_invalidos2 = 0;
  for ( p in array_precio ) {
    if ( array_precio [p] != "." && array_precio [p] != "0" &&
         array_precio [p] != "1" && array_precio [p] != "2" && 
         array_precio [p] != "3" && array_precio [p] != "4" &&
         array_precio [p] != "5" && array_precio [p] != "6" && 
         array_precio [p] != "7" && array_precio [p] != "8" &&
         array_precio [p] != "9" ) {
      caracteres_invalidos1++;
      break;
    }
  }
  for ( c in array_cantidad ) {
    if ( array_cantidad [c] != "0" &&
         array_cantidad [c] != "1" && array_cantidad [c] != "2" && 
         array_cantidad [c] != "3" && array_cantidad [c] != "4" &&
         array_cantidad [c] != "5" && array_cantidad [c] != "6" && 
         array_cantidad [c] != "7" && array_cantidad [c] != "8" &&
         array_cantidad [c] != "9" ) {
      caracteres_invalidos2++;
      break;
    }
  }
  if ( isNaN( precio_comprado ) ) {
    swal({
      title: 'Error',
      text: 'El campo de precio tiene un valor indefinido',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
      console.log('El campo de precio tiene un valor indefinido');
      return false;
  } else if ( precio_comprado == "" ) {
    swal({
      title: 'Error',
      text: 'El campo de precio está vacío',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
      console.log('El campo de precio está vacío');
      return false;
  } else if ( caracteres_invalidos1 != 0 ) {
    swal({
      title: 'Error',
      text: 'El campo de precio tiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
      console.log('El campo de precio tiene carácteres inválidos');
      return false;
  } else if ( precio_comprado < 0.01 || precio_comprado > 999999.99 ) {
    swal({
      title: 'Error',
      text: 'El campo de precio solo puede ser de 0.01 a 999999.99',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de precio solo puede ser de 0.01 a 999999.99');
    return false;
  } else if ( isNaN( cantidad_comprado ) ) {
    swal({
      title: 'Error',
      text: 'El campo de cantidad tiene un valor indefinido',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
      console.log('El campo de cantidad tiene un valor indefinido');
      return false;
  } else if ( cantidad_comprado == "" ) {
    swal({
      title: 'Error',
      text: 'El campo de cantidad está vacío',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
      console.log('El campo de cantidad está vacío');
      return false;
  } else if ( caracteres_invalidos2 != 0 ) {
    swal({
      title: 'Error',
      text: 'El campo de cantidad tiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
      console.log('El campo de cantidad tiene carácteres inválidos');
      return false;
  } else if ( document.Detalles_Facturas.txt_cantidad_comprados.value.indexOf(".")!=-1 || 
              document.Detalles_Facturas.txt_cantidad_comprados.value.indexOf("-")!=-1 ||
              document.Detalles_Facturas.txt_cantidad_comprados.value.indexOf("+")!=-1 ) {
                swal({
                  title: 'Error',
                  text: 'El campo de cantidad tiene carácteres inválidos',
                  icon: 'error',
                  closeOnClickOutside: false,
                  closeOnEsc: false
                })
    console.log('El campo de cantidad tiene carácteres inválidos');
    return false;
  } else if ( document.Detalles_Facturas.txt_cantidad_comprados.value < 1 ||
              document.Detalles_Facturas.txt_cantidad_comprados.value > 100 ) {
                swal({
                  title: 'Error',
                  text: 'El campo de cantidad solo puede ser de 1 a 100',
                  icon: 'error',
                  closeOnClickOutside: false,
                  closeOnEsc: false
                })
    console.log('El campo de cantidad solo puede ser de 1 a 100');
    return false;
  }
  return true;
}

//funcion que valida el campo de busqueda de detalles de facturas
function Validar_Buscar_Detalle() {
  var valor_busqueda = document.Buscar_Detalle.txt_buscar.value,
        array_texto_busqueda = valor_busqueda.split(""),
        caracter_mas = valor_busqueda.indexOf("+"),
        caracter_menos = valor_busqueda.indexOf("-"),
        no_espacios_guiones = 0;
  for ( b in array_texto_busqueda ) {
    if ( array_texto_busqueda[b] != " " && array_texto_busqueda[b]!=".") {
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
      text: 'No hay al menos un caracter para poder buscar',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('No hay al menos un caracter para poder buscar');
    return false;
  } else if ( caracter_mas!=-1 || caracter_menos!=-1 ) {
    swal({
      title: 'Error',
      text: 'El campo de busqueda contiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de busqueda contiene carácteres inválidos');
    return false;
  } else if ( document.Buscar_Detalle.txt_buscar.value.length < 1 ||
              document.Buscar_Detalle.txt_buscar.value.length > 50) {
                swal({
                  title: 'Error',
                  text: 'El campo de busqueda contiene carácteres inválidos',
                  icon: 'error',
                  closeOnClickOutside: false,
                  closeOnEsc: false
                })
    console.log('El campo de busqueda contiene carácteres inválidos');
    return false;              
  }
  return true;
}

//funcion que valida los campos del formulario de facturas
function Validar_Facturas() {
  var total = document.Facturas.txt_total.value,
        array_total = document.Facturas.txt_total.value.split(""),
        caracteres_invalidos1 = 0,
        fecha = document.Facturas.txt_fecha.value;
  for ( t in array_total ) {
    if ( array_total [t] != "." && array_total [t] != "0" &&
         array_total [t] != "1" && array_total [t] != "2" && 
         array_total [t] != "3" && array_total [t] != "4" &&
         array_total [t] != "5" && array_total [t] != "6" && 
         array_total [t] != "7" && array_total [t] != "8" &&
         array_total [t] != "9" ) {
      caracteres_invalidos1++;
      break;
    }
  }
  if ( isNaN( total ) ) {
    swal({
      title: 'Error',
      text: 'El campo de precio tiene un valor indefinido',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
  })
      console.log('El campo de precio tiene un valor indefinido');
      return false;
  } else if ( total == "" ) {
    swal({
      title: 'Error',
      text: 'El campo de precio está vacío',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
  })
      console.log('El campo de precio está vacío');
      return false;
  } else if ( caracteres_invalidos1 != 0 ) {
    swal({
      title: 'Error',
      text: 'El campo de precio tiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
  })
      console.log('El campo de precio tiene carácteres inválidos');
      return false;
  } else if ( document.Facturas.txt_total.value < 0.01 ||
              document.Facturas.txt_total.value > 999999.99 ) {
                swal({
                  title: 'Error',
                  text: 'El campo de precio solo puede ser de 0.01 a 999999.99',
                  icon: 'error',
                  closeOnClickOutside: false,
                  closeOnEsc: false
              })
    console.log('El campo de precio solo puede ser de 0.01 a 999999.99');
    return false;
  } else if ( fecha =="" ) {
    swal({
      title: 'Error',
      text: 'La fecha está vacía',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
  })
    console.log('La fecha está vacía');
    return false;
  }
  return true;
}

//funcion que valida el campo de busqueda de facturas
function Validar_Buscar_Factura() {
  var valor_busqueda = document.Buscar_factura.txt_buscar.value,
        array_texto_busqueda = valor_busqueda.split(""),
        caracter_mas = valor_busqueda.indexOf("+"),
        caracter_menos = valor_busqueda.indexOf("-"),
        no_espacios_guiones = 0;
  for ( b in array_texto_busqueda ) {
    if ( array_texto_busqueda[b] != " " && array_texto_busqueda[b]!=".") {
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
      text: 'No hay al menos un caracter para poder buscar',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
  })
    console.log('No hay al menos un caracter para poder buscar');
    return false;
  } else if ( caracter_mas!=-1 || caracter_menos!=-1 ) {
    swal({
      title: 'Error',
      text: 'El campo de busqueda contiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
  })
    console.log('El campo de busqueda contiene carácteres inválidos');
    return false;
  } else if ( document.Buscar_factura.txt_buscar.value.length < 1 ||
              document.Buscar_factura.txt_buscar.value.length > 50) {
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

//funcion que valida los campos del formulario de marcas
function Validar_Marcas() {
  var marca = document.Marcas.txt_marca.value,
        caracter_mas = marca.indexOf("+"),
        caracter_menos = marca.indexOf("-"),
        array_marca = document.Marcas.txt_marca.value.split(""),
        no_espacios_guiones = 0;
  for ( m in array_marca ) {
    if ( array_marca[m] != " " && array_marca[m]!=".") {
      no_espacios_guiones++;
    }
  }
  if ( marca == "" ) {
    swal({
      title: 'Error',
      text: 'El campo de marca está vacío',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de marca está vacío');
    return false;
  } else if ( no_espacios_guiones < 2 ) {
    swal({
      title: 'Error',
      text: 'El campo de marca debe tener al menos 2 carácteres válidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de marca debe tener al menos 2 carácteres válidos');
    return false;
  } else if ( caracter_mas!=-1 || caracter_menos!=-1 ) {
    swal({
      title: 'Error',
      text: 'El campo de marca tiene carácteres invalidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de marca tiene carácteres invalidos');
    return false;
  } else if ( document.Marcas.txt_marca.value.length < 2 ||
              document.Marcas.txt_marca.value.length >50 ) {
    swal({
      title: 'Error',
      text: 'El campo de marca no tiene 2 carácteres o sobrepasa los 50',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de marca no tiene 2 carácteres o sobrepasa los 50');
    return false;
  } 
  return true;
}

//funcion que valida el campo de busqueda de marcas
function Validar_Buscar_Marcas(){
  var valor_busqueda = document.Buscar_marca.txt_buscar.value,
        array_texto_busqueda = valor_busqueda.split(""),
        caracter_mas = valor_busqueda.indexOf("+"),
        caracter_menos = valor_busqueda.indexOf("-"),
        no_espacios_guiones = 0;
  for ( b in array_texto_busqueda ) {
    if ( array_texto_busqueda[b] != " " && array_texto_busqueda[b]!=".") {
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
              document.Buscar_marca.txt_buscar.value.length > 50) {
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

//funcion que valida el campo de estado del formulario de estado de productos
function Validar_Estado_Productos() {
  var  estado = document.Estado_productos.txt_estado.value,
        array_estado = document.Estado_productos.txt_estado.value.split(""),
        no_espacios = 0,
        caracteres_invalidos = 0;
  for ( e in array_estado ) {
    if ( array_estado[e] != " ") {
      no_espacios++;
    }
  }
  for ( e2 in array_estado ) {
    if ( array_estado[e2]=='0' || array_estado[e2]=='1' ||
         array_estado[e2]=='2' || array_estado[e2]=='3' ||
         array_estado[e2]=='4' || array_estado[e2]=='5' ||
         array_estado[e2]=='6' || array_estado[e2]=='7' ||
         array_estado[e2]=='8' || array_estado[e2]=='9' ||
         array_estado[e2]=='.' || array_estado[e2]=='_' ||
         array_estado[e2]=='-' || array_estado[e2]=='+' ||
         array_estado[e2]=='@' || array_estado[e2]=='/' ||
         array_estado[e2]=='(' || array_estado[e2]==')') {
    caracteres_invalidos++;
    break;
    }
  }
  
  if ( estado == "" ) {
      swal({
        title: 'Error',
        text: 'El campo de estado está vacío',
        icon: 'error',
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    console.log('El campo de estado está vacío');
    return false;
  } else if ( no_espacios < 2 ) {
    swal({
      title: 'Error',
      text: 'No hay al menos 2 caracteres válidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
  })
  console.log('No hay al menos 2 caracteres válidos');
  return false;
  } else if ( caracteres_invalidos!=0 ) {
    swal({
      title: 'Error',
      text: 'Hay carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
  })
  console.log('Hay carácteres inválidos');
  return false;
  } else if ( document.Estado_productos.txt_estado.value.length < 2 ||
              document.Estado_productos.txt_estado.value.length > 50) {
    swal({
      title: 'Error',
      text: 'El campo de estado no tiene 2 carácteres o supera los 50',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
              })
  console.log('El campo de estado no tiene 2 carácteres o supera los 50');
  return false;            
  }
return true;
}

//funcion que valida el campo de busqueda de estado de productos
function Validar_Buscar_Estado_Productos() {
  var valor_busqueda = document.Buscar_estado_productos.txt_buscar.value,
        array_texto_busqueda = valor_busqueda.split(""),
        no_espacios = 0,
        caracteres_invalidos = 0;
  for ( b in array_texto_busqueda ) {
    if ( array_texto_busqueda[b] != " ") {
      no_espacios++;
    }
  }
  for ( e2 in array_texto_busqueda ) {
      if ( array_texto_busqueda[e2]=='.' || array_texto_busqueda[e2]=='_' ||
            array_texto_busqueda[e2]=='-' || array_texto_busqueda[e2]=='+' ||
            array_texto_busqueda[e2]=='@' || array_texto_busqueda[e2]=='/' ||
            array_texto_busqueda[e2]=='(' || array_texto_busqueda[e2]==')') {
        caracteres_invalidos++;
    break;
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
  } else if ( no_espacios == 0 ) {
    swal({
      title: 'Error',
      text: 'No hay al menos un caracter para poder buscar',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('No hay al menos un caracter para poder buscar');
    return false;
  }  else if ( caracteres_invalidos!=0 ) {
    swal({
      title: 'Error',
      text: 'El campo de estado contiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de estado contiene carácteres inválidos');
    return false;
  } else if ( document.Buscar_estado_productos.txt_buscar.value.length < 1 ||
              document.Buscar_estado_productos.txt_buscar.value.length > 50) {
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

//funcion que valida los campos del formulario de estado de usuarios
function Validar_Estado_Usuarios() {
  var estado = document.Estado_usuarios.txt_estado.value,
        array_estado = document.Estado_usuarios.txt_estado.value.split(""),
        no_espacios = 0,
        caracteres_invalidos = 0;
  for ( e in array_estado ) {
    if ( array_estado[e] != " ") {
      no_espacios++;
    }
  }
  for ( e2 in array_estado ) {
    if ( array_estado[e2]=='0' || array_estado[e2]=='1' ||
         array_estado[e2]=='2' || array_estado[e2]=='3' ||
         array_estado[e2]=='4' || array_estado[e2]=='5' ||
         array_estado[e2]=='6' || array_estado[e2]=='7' ||
         array_estado[e2]=='8' || array_estado[e2]=='9' ||
         array_estado[e2]=='.' || array_estado[e2]=='_' ||
         array_estado[e2]=='-' || array_estado[e2]=='+' ||
         array_estado[e2]=='@' || array_estado[e2]=='/' ||
         array_estado[e2]=='(' || array_estado[e2]==')') {
    caracteres_invalidos++;
    break;
    }
  }
  if ( estado == "" ) {
    swal({
      title: 'Error',
      text: 'El campo de búsqueda está vacío',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de búsqueda está vacío');
    return false;
  } else if ( no_espacios < 2 ) {
    swal({
      title: 'Error',
      text: 'No hay al menos 2 carácteres letras.',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('No hay al menos 2 carácteres letras.');
    return false;
  } else if ( caracteres_invalidos!=0 ) {
    swal({
      title: 'Error',
      text: 'El campo de estado contiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de estado contiene carácteres inválidos');
    return false;
  } else if ( document.Estado_usuarios.txt_estado.value.length < 2 ||
              document.Estado_usuarios.txt_estado.value.length > 50) {
                swal({
                  title: 'Error',
                  text: 'El campo de estado no tiene al menos 2 carácteres o sobrepasa los 50',
                  icon: 'error',
                  closeOnClickOutside: false,
                  closeOnEsc: false
                })
    console.log('El campo de estado no tiene al menos 2 carácteres o sobrepasa los 50');
    return false;              
  }
  return true;
}

//funcion que valida el campo de busqueda de estado de usuarios
function Validar_Buscar_Estado_Usuarios() {
  var valor_busqueda = document.Buscar_estado_usuarios.txt_buscar.value,
        array_texto_busqueda = valor_busqueda.split(""),
        no_espacios = 0,
        caracteres_invalidos = 0;
  for ( b in array_texto_busqueda ) {
    if ( array_texto_busqueda[b] != " ") {
      no_espacios++;
    }
  }
  for ( e2 in array_texto_busqueda ) {
      if ( array_texto_busqueda[e2]=='.' || array_texto_busqueda[e2]=='_' ||
            array_texto_busqueda[e2]=='-' || array_texto_busqueda[e2]=='+' ||
            array_texto_busqueda[e2]=='@' || array_texto_busqueda[e2]=='/' ||
            array_texto_busqueda[e2]=='(' || array_texto_busqueda[e2]==')') {
        caracteres_invalidos++;
    break;
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
  } else if ( no_espacios == 0 ) {
    swal({
      title: 'Error',
      text: 'No hay al menos un caracter para poder buscar',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('No hay al menos un caracter para poder buscar');
    return false;
  }  else if ( caracteres_invalidos!=0 ) {
    swal({
      title: 'Error',
      text: 'El campo de estado contiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de estado contiene carácteres inválidos');
    return false;
  } else if ( document.Buscar_estado_usuarios.txt_buscar.value.length < 1 ||
              document.Buscar_estado_usuarios.txt_buscar.value.length > 50) {
                swal({
                  title: 'Error',
                  text: 'El campo de busqueda no tiene al menos 1 caracter o sobrepasa los 50',
                  icon: 'error',
                  closeOnClickOutside: false,
                  closeOnEsc: false
                })
    console.log('El campo de busqueda no tiene al menos 1 caracter o sobrepasa los 50');
    return false;              
  }
  return true;
}

//funcion que valida los campos del formulario de tipos de usuarios
function Validar_Tipo_Usuarios() {
  var estado = document.Tipo_usuarios.txt_tipo.value,
        array_estado = document.Tipo_usuarios.txt_tipo.value.split(""),
        no_espacios = 0,
        caracteres_invalidos = 0;
  for ( e in array_estado ) {
    if ( array_estado[e] != " ") {
      no_espacios++;
    }
  }
  for ( e2 in array_estado ) {
    if ( array_estado[e2]=='0' || array_estado[e2]=='1' ||
         array_estado[e2]=='2' || array_estado[e2]=='3' ||
         array_estado[e2]=='4' || array_estado[e2]=='5' ||
         array_estado[e2]=='6' || array_estado[e2]=='7' ||
         array_estado[e2]=='8' || array_estado[e2]=='9' ||
         array_estado[e2]=='.' || array_estado[e2]=='_' ||
         array_estado[e2]=='-' || array_estado[e2]=='+' ||
         array_estado[e2]=='@' || array_estado[e2]=='/' ||
         array_estado[e2]=='(' || array_estado[e2]==')') {
    caracteres_invalidos++;
    break;
    }
  }
 if ( estado == "" ) {
  swal({
    title: 'Error',
    text: 'El campo de estado está vacío',
    icon: 'error',
    closeOnClickOutside: false,
    closeOnEsc: false
  })
    console.log('El campo de estado está vacío');
    return false;
  } else if ( no_espacios < 2 ) {
    swal({
      title: 'Error',
      text: 'No hay al menos 2 carácteres letras.',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('No hay al menos 2 carácteres letras.');
    return false;
  } else if ( caracteres_invalidos!=0 ) {
    swal({
      title: 'Error',
      text: 'El campo de estado contiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de estado contiene carácteres inválidos');
    return false;
  } else if ( document.Tipo_usuarios.txt_tipo.value.length < 2 ||
              document.Tipo_usuarios.txt_tipo.value.length > 50) {
                swal({
                  title: 'Error',
                  text: 'El campo de estado no tiene al menos 2 carácteres o sobrepasa los 50',
                  icon: 'error',
                  closeOnClickOutside: false,
                  closeOnEsc: false
                })
    console.log('El campo de estado no tiene al menos 2 carácteres o sobrepasa los 50');
    return false;              
  }
  return true;
}

//funcion que valida el campo de busqueda de tipos de usuarios
function Validar_Buscar_Tipo_Usuarios() {
  var valor_busqueda = document.Buscar_tipo_usuarios.txt_buscar.value,
        array_texto_busqueda = valor_busqueda.split(""),
        no_espacios = 0,
        caracteres_invalidos = 0;
  for ( b in array_texto_busqueda ) {
    if ( array_texto_busqueda[b] != " ") {
      no_espacios++;
    }
  }
  for ( e2 in array_texto_busqueda ) {
      if ( array_texto_busqueda[e2]=='.' || array_texto_busqueda[e2]=='_' ||
            array_texto_busqueda[e2]=='-' || array_texto_busqueda[e2]=='+' ||
            array_texto_busqueda[e2]=='@' || array_texto_busqueda[e2]=='/' ||
            array_texto_busqueda[e2]=='(' || array_texto_busqueda[e2]==')') {
        caracteres_invalidos++;
    break;
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
  } else if ( no_espacios == 0 ) {
    swal({
      title: 'Error',
      text: 'No hay al menos un caracter para poder buscar',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('No hay al menos un caracter para poder buscar');
    return false;
  }  else if ( caracteres_invalidos!=0 ) {
    swal({
      title: 'Error',
      text: 'El campo de estado contiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de estado contiene carácteres inválidos');
    return false;
  } else if ( document.Buscar_tipo_usuarios.txt_buscar.value.length < 1 ||
              document.Buscar_tipo_usuarios.txt_buscar.value.length > 50) {
                swal({
                  title: 'Error',
                  text: 'El campo de busqueda no tiene al menos 1 caracter o sobrepasa los 50',
                  icon: 'error',
                  closeOnClickOutside: false,
                  closeOnEsc: false
                })
    console.log('El campo de busqueda no tiene al menos 1 caracter o sobrepasa los 50');
    return false;              
  }
  return true;
}

//funcion que valida los campos del formulario de tipos de productos
function Validar_Tipo_Productos() {
  var id = document.Tipo_productos.id_tipo.value,
        estado = document.Tipo_productos.txt_tipo.value,
        array_estado = document.Tipo_productos.txt_tipo.value.split(""),
        no_espacios = 0,
        caracteres_invalidos = 0,
        cantidad_promocion = document.Tipo_productos.txt_promocion.value,
        array_cantidad = document.Tipo_productos.txt_promocion.value.split(""),
        caracteres_invalidos2 = 0;
  for ( c in array_cantidad ) {
    if ( array_cantidad [c] != "0" &&
         array_cantidad [c] != "1" && array_cantidad [c] != "2" && 
         array_cantidad [c] != "3" && array_cantidad [c] != "4" &&
         array_cantidad [c] != "5" && array_cantidad [c] != "6" && 
         array_cantidad [c] != "7" && array_cantidad [c] != "8" &&
         array_cantidad [c] != "9" ) {
      caracteres_invalidos2++;
      break;
    }
  }
  for ( e in array_estado ) {
    if ( array_estado[e] != " ") {
      no_espacios++;
    }
  }
  for ( e2 in array_estado ) {
    if ( array_estado[e2]=='0' || array_estado[e2]=='1' ||
         array_estado[e2]=='2' || array_estado[e2]=='3' ||
         array_estado[e2]=='4' || array_estado[e2]=='5' ||
         array_estado[e2]=='6' || array_estado[e2]=='7' ||
         array_estado[e2]=='8' || array_estado[e2]=='9' ||
         array_estado[e2]=='.' || array_estado[e2]=='_' ||
         array_estado[e2]=='-' || array_estado[e2]=='+' ||
         array_estado[e2]=='@' || array_estado[e2]=='/' ||
         array_estado[e2]=='(' || array_estado[e2]==')') {
    caracteres_invalidos++;
    break;
    }
  }
  if ( estado == "" ) {
    swal({
      title: 'Error',
      text: 'El campo de estado está vacío',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de estado está vacío');
    return false;
  } else if ( no_espacios < 2 ) {
    swal({
      title: 'Error',
      text: 'No hay al menos 2 carácteres letras.',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('No hay al menos 2 carácteres letras.');
    return false;
  } else if ( caracteres_invalidos!=0 ) {
    swal({
      title: 'Error',
      text: 'El campo de estado contiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de estado contiene carácteres inválidos');
    return false;
  } else if ( document.Tipo_productos.txt_tipo.value.length < 2 ||
              document.Tipo_productos.txt_tipo.value.length > 50) {
                swal({
                  title: 'Error',
                  text: 'El campo de estado no tiene al menos 2 carácteres o sobrepasa los 50',
                  icon: 'error',
                  closeOnClickOutside: false,
                  closeOnEsc: false
                })
    console.log('El campo de estado no tiene al menos 2 carácteres o sobrepasa los 50');
    return false;              
  }else if ( isNaN( cantidad_promocion ) ) {
    swal({
      title: 'Error',
      text: 'El campo de cantidad tiene un valor indefinido',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
      console.log('El campo de cantidad tiene un valor indefinido');
      return false;
  } else if ( cantidad_promocion == "" ) {
    swal({
      title: 'Error',
      text: 'El campo de cantidad está vacío',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
      console.log('El campo de cantidad está vacío');
      return false;
  } else if ( caracteres_invalidos2 != 0 ) {
    swal({
      title: 'Error',
      text: 'El campo de cantidad tiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
      console.log('El campo de cantidad tiene carácteres inválidos');
      return false;
  } else if ( document.Tipo_productos.txt_promocion.value.indexOf(".")!=-1 || 
              document.Tipo_productos.txt_promocion.value.indexOf("-")!=-1 ||
              document.Tipo_productos.txt_promocion.value.indexOf("+")!=-1 ) {
                swal({
                  title: 'Error',
                  text: 'El campo de cantidad tiene carácteres inválidos',
                  icon: 'error',
                  closeOnClickOutside: false,
                  closeOnEsc: false
                })
    console.log('El campo de cantidad tiene carácteres inválidos');
    return false;
  } else if ( document.Tipo_productos.txt_promocion.value < 0 ||
              document.Tipo_productos.txt_promocion.value > 50 ) {
                swal({
                  title: 'Error',
                  text: 'El campo de cantidad solo puede ser de 0 a 50',
                  icon: 'error',
                  closeOnClickOutside: false,
                  closeOnEsc: false
                })
    console.log('El campo de cantidad solo puede ser de 0 a 50');
    return false;
  }
  return true;
}

//funcion que valida el campo de busqueda de tipos de usuarios
function Validar_Buscar_Tipo_Productos() {
  var valor_busqueda = document.Buscar_tipo_productos.txt_buscar.value,
        array_texto_busqueda = valor_busqueda.split(""),
        no_espacios = 0,
        caracteres_invalidos = 0;
  for ( b in array_texto_busqueda ) {
    if ( array_texto_busqueda[b] != " ") {
      no_espacios++;
    }
  }
  for ( e2 in array_texto_busqueda ) {
      if ( array_texto_busqueda[e2]=='.' || array_texto_busqueda[e2]=='_' ||
            array_texto_busqueda[e2]=='-' || array_texto_busqueda[e2]=='+' ||
            array_texto_busqueda[e2]=='@' || array_texto_busqueda[e2]=='/' ||
            array_texto_busqueda[e2]=='(' || array_texto_busqueda[e2]==')') {
        caracteres_invalidos++;
    break;
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
  } else if ( no_espacios == 0 ) {
    swal({
      title: 'Error',
      text: 'No hay al menos un caracter para poder buscar',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('No hay al menos un caracter para poder buscar');
    return false;
  }  else if ( caracteres_invalidos!=0 ) {
    swal({
      title: 'Error',
      text: 'El campo de estado contiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de estado contiene carácteres inválidos');
    return false;
  } else if ( document.Buscar_tipo_productos.txt_buscar.value.length < 1 ||
              document.Buscar_tipo_productos.txt_buscar.value.length > 50) {
                swal({
                  title: 'Error',
                  text: 'El campo de busqueda no tiene al menos 1 caracter o sobrepasa los 50',
                  icon: 'error',
                  closeOnClickOutside: false,
                  closeOnEsc: false
                })
    console.log('El campo de busqueda no tiene al menos 1 caracter o sobrepasa los 50');
    return false;              
  }
  return true;
}

//funcion que valida el campo de busqueda de reseñas
function Validar_Buscar_Resenas() {
  var valor_busqueda = document.Buscar_resenas.txt_buscar.value,
        array_texto_busqueda = valor_busqueda.split(""),
        no_espacios = 0,
        caracteres_invalidos = 0;
  for ( b in array_texto_busqueda ) {
    if ( array_texto_busqueda[b] != " ") {
      no_espacios++;
    }
  }
  for ( e2 in array_texto_busqueda ) {
      if ( array_texto_busqueda[e2]=='.' || array_texto_busqueda[e2]=='_' ||
            array_texto_busqueda[e2]=='-' || array_texto_busqueda[e2]=='+' ||
            array_texto_busqueda[e2]=='@' || array_texto_busqueda[e2]=='/' ||
            array_texto_busqueda[e2]=='(' || array_texto_busqueda[e2]==')') {
        caracteres_invalidos++;
    break;
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
  } else if ( no_espacios == 0 ) {
    swal({
      title: 'Error',
      text: 'No hay al menos un caracter para poder buscar',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
  })
    console.log('No hay al menos un caracter para poder buscar');
    return false;
  }  else if ( caracteres_invalidos!=0 ) {
    swal({
      title: 'Error',
      text: 'El campo de estado contiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
  })
    console.log('El campo de estado contiene carácteres inválidos');
    return false;
  } else if ( document.Buscar_resenas.txt_buscar.value.length < 1 ||
              document.Buscar_resenas.txt_buscar.value.length > 100) {
                swal({
                  title: 'Error',
                  text: 'El campo de busqueda no tiene al menos 1 caracter o sobrepasa los 50',
                  icon: 'error',
                  closeOnClickOutside: false,
                  closeOnEsc: false
              })
    console.log('El campo de busqueda no tiene al menos 1 caracter o sobrepasa los 50');
    return false;              
  }
  return true;
}

//funcion que valida los campos del formulario de usuarios
function Validar_Usuarios() {
  var   nombres = document.Usuarios.txt_nombres_usuario.value,
          array_nombre = document.Usuarios.txt_nombres_usuario.value.split(""),
          noespacios1 = 0,
          apellidos = document.Usuarios.txt_apellidos_usuario.value,
          array_apellido = document.Usuarios.txt_apellidos_usuario.value.split(""),
          noespacios2= 0,
          expresion_correo = /\w+@\w+\.+[a-z]/ ,
          valor_correo = document.Usuarios.txt_correo.value;
for ( n in array_nombre ) {
  if ( array_nombre[n]!=' ' ) {
    noespacios1++;
  }
}
for ( a in array_apellido ) {
  if ( array_apellido[a]!=' ' ) {
    noespacios2++;
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
            text: 'El campo de apellido no tiene al menos 2 letras',
            icon: 'error',
            closeOnClickOutside: false,
            closeOnEsc: false
          })
console.log('El campo de apellido no tiene al menos 2 letras');
return false; 
} else if ( noespacios1 < 2) {
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
} else if ( document.Usuarios.txt_correo.value=="" ) {
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
  })
console.log('Formato de correo inválido');
return false; 
} else if  ( document.Usuarios.txt_correo.value.indexOf('@')==-1 || 
             document.Usuarios.txt_correo.value.indexOf('.')==-1 ) {
              swal({
                title: 'Error',
                text: 'El campo de correo no contiene "@" o "."',
                icon: 'error',
                closeOnClickOutside: false,
                closeOnEsc: false
              })
console.log('El campo de correo no contiene "@" o "."');
return false; 
} else if  ( document.Usuarios.txt_correo.value.length < 15|| 
             document.Usuarios.txt_correo.value.length > 100 ) {
              swal({
                title: 'Error',
                text: 'El correo no tiene un valor de 15 a 100 carácteres',
                icon: 'error',
                closeOnClickOutside: false,
                closeOnEsc: false
              })
console.log('El correo no tiene un valor de 15 a 100 carácteres');
return false; 
  }
return true;
}

//funcion que valida el campo de busqueda de usuarios
function Validar_Buscar_Usuario() {
  var valor_busqueda = document.Buscar_usuario.txt_buscar.value,
        array_texto_busqueda = valor_busqueda.split(""),
        caracter_mas = valor_busqueda.indexOf("+"),
        caracter_menos = valor_busqueda.indexOf("-"),
        no_espacios_guiones = 0;
  for ( b in array_texto_busqueda ) {
    if ( array_texto_busqueda[b] != " " && array_texto_busqueda[b]!="_" ) {
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
      text: 'No hay al menos un caracter para poder buscar',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('No hay al menos un caracter para poder buscar');
    return false;
  } else if ( caracter_mas!=-1 || caracter_menos!=-1 ) {
    swal({
      title: 'Error',
      text: 'El campo de busqueda contiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de busqueda contiene carácteres inválidos');
    return false;
  } else if ( document.Buscar_usuario.txt_buscar.value.length < 1 ||
              document.Buscar_usuario.txt_buscar.value.length > 100) {
                swal({
                  title: 'Error',
                  text: 'El campo de busqueda no tiene un carácter o sobrepasa los 100',
                  icon: 'error',
                  closeOnClickOutside: false,
                  closeOnEsc: false
                })
    console.log('El campo de busqueda no tiene un carácter o sobrepasa los 100');
    return false;              
  }
  return true;
}

//funcion que valida los campos del formulario de productos
function Validar_Productos() {
  var producto = document.Productos.nombre_producto.value,
        caracter_mas = producto.indexOf("+"),
        caracter_menos = producto.indexOf("-"),
        array_producto = document.Productos.nombre_producto.value.split(""),
        no_espacios_guiones = 0,
        precio = document.Productos.precio_producto.value,
        array_precio = document.Productos.precio_producto.value.split(""),
        caracteres_invalidos1 = 0,
        cantidad = document.Productos.cantidad_producto.value,
        array_cantidad = document.Productos.cantidad_producto.value.split(""),
        caracteres_invalidos2 = 0;
  for ( m in array_producto ) {
    if ( array_producto[m] != " " && array_producto[m]!=".") {
      no_espacios_guiones++;
    }
  }
  for ( p in array_precio ) {
    if ( array_precio [p] != "." && array_precio [p] != "0" &&
          array_precio [p] != "1" && array_precio [p] != "2" && 
          array_precio [p] != "3" && array_precio [p] != "4" &&
          array_precio [p] != "5" && array_precio [p] != "6" && 
          array_precio [p] != "7" && array_precio [p] != "8" &&
          array_precio [p] != "9" ) {
      caracteres_invalidos1++;
      break;
    }
  }
for ( c in array_cantidad ) {
  if ( array_cantidad [c] != "0" &&
        array_cantidad [c] != "1" && array_cantidad [c] != "2" && 
        array_cantidad [c] != "3" && array_cantidad [c] != "4" &&
        array_cantidad [c] != "5" && array_cantidad [c] != "6" && 
        array_cantidad [c] != "7" && array_cantidad [c] != "8" &&
        array_cantidad [c] != "9" ) {
    caracteres_invalidos2++;
    break;
  }
}
if ( producto == "" ) {
  swal({
    title: 'Error',
    text: 'El campo de producto está vacío',
    icon: 'error',
    closeOnClickOutside: false,
    closeOnEsc: false
  })
    console.log('El campo de producto está vacío');
    return false;
  } else if ( no_espacios_guiones < 2 ) {
    swal({
      title: 'Error',
      text: 'No hay al menos 2 carácteres letras, números o combinados.',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('No hay al menos 2 carácteres letras, números o combinados.');
    return false;
  } else if ( caracter_mas!=-1 || caracter_menos!=-1 ) {
    swal({
      title: 'Error',
      text: 'El campo de producto contiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de producto contiene carácteres inválidos');
    return false;
  } else if ( document.Productos.nombre_producto.value.length < 2 ||
              document.Productos.nombre_producto.value.length >50 ) {
                swal({
                  title: 'Error',
                  text: 'El campo de producto no tiene al menos 2 carácteres o sobrepasa los 50',
                  icon: 'error',
                  closeOnClickOutside: false,
                  closeOnEsc: false
                })
    console.log('El campo de producto no tiene al menos 2 carácteres o sobrepasa los 50');
    return false;
  } else if ( isNaN( precio ) ) {
    swal({
      title: 'Error',
      text: 'El campo de precio tiene un valor indefinido',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
      console.log('El campo de precio tiene un valor indefinido');
      return false;
  } else if ( precio == "" ) {
    swal({
      title: 'Error',
      text: 'El campo de precio está vacío',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
      console.log('El campo de precio está vacío');
      return false;
  } else if ( caracteres_invalidos1 != 0 ) {
    swal({
      title: 'Error',
      text: 'El campo de precio tiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
      console.log('El campo de precio tiene carácteres inválidos');
      return false;
  } else if ( precio < 0.01 || precio > 999999.99 ) {
    swal({
      title: 'Error',
      text: 'El campo de precio solo puede ser de 0.01 a 999999.99',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de precio solo puede ser de 0.01 a 999999.99');
    return false;
  } else if ( isNaN( cantidad ) ) {
    swal({
      title: 'Error',
      text: 'El campo de cantidad tiene un valor indefinido',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
      console.log('El campo de cantidad tiene un valor indefinido');
      return false;
  } else if ( cantidad == "" ) {
    swal({
      title: 'Error',
      text: 'El campo de cantidad está vacío',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
      console.log('El campo de cantidad está vacío');
      return false;
  } else if ( caracteres_invalidos2 != 0 ) {
    swal({
      title: 'Error',
      text: 'El campo de cantidad tiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    });
      console.log('El campo de cantidad tiene carácteres inválidos');
      return false;
  } else if ( document.Productos.cantidad_producto.value.indexOf(".")!=-1 || 
              document.Productos.cantidad_producto.value.indexOf("-")!=-1 ||
              document.Productos.cantidad_producto.value.indexOf("+")!=-1 ) {
                swal({
                  title: 'Error',
                  text: 'El campo de cantidad tiene carácteres inválidos',
                  icon: 'error',
                  closeOnClickOutside: false,
                  closeOnEsc: false
                });
    console.log('El campo de cantidad tiene carácteres inválidos');
    return false;
  } else if ( document.Productos.cantidad_producto.value < 0 ||
              document.Productos.cantidad_producto.value > 9999 ) {
                swal({
                  title: 'Error',
                  text: 'El campo de cantidad solo puede ser de 1 a 100',
                  icon: 'error',
                  closeOnClickOutside: false,
                  closeOnEsc: false
                });
    console.log('El campo de cantidad solo puede ser de 1 a 100');
    return false;
  }
return true;
}

//funcion que valida el campo de busqueda de productos
function Validar_Buscar_Productos() {
  var valor_busqueda = document.Buscar_productos.txt_buscar.value,
        array_texto_busqueda = valor_busqueda.split(""),
        caracter_mas = valor_busqueda.indexOf("+"),
        caracter_menos = valor_busqueda.indexOf("-"),
        no_espacios_guiones = 0;
  for ( b in array_texto_busqueda ) {
    if ( array_texto_busqueda[b] != " " && array_texto_busqueda[b]!=".") {
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
    });
    console.log('El campo de búsqueda está vacío');
    return false;
  } else if ( no_espacios_guiones == 0 ) {
    swal({
      title: 'Error',
      text: 'No hay al menos un caracter para poder buscar',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    });
    console.log('No hay al menos un caracter para poder buscar');
    return false;
  } else if ( caracter_mas!=-1 || caracter_menos!=-1 ) {
    swal({
      title: 'Error',
      text: 'El campo de busqueda contiene carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    });
    console.log('El campo de busqueda contiene carácteres inválidos');
    return false;
  } else if ( document.Buscar_productos.txt_buscar.value.length < 1 ||
              document.Buscar_productos.txt_buscar.value.length > 50) {
                swal({
                  title: 'Error',
                  text: 'El campo de busqueda contiene carácteres inválidos',
                  icon: 'error',
                  closeOnClickOutside: false,
                  closeOnEsc: false
                });
    console.log('El campo de busqueda contiene carácteres inválidos');
    return false;              
  }
  return true;
}

//funcion que valida los campos del formulario de estado clientes
function Validar_Estado_Clientes() {
  var  estado = document.Estadoclientes.txt_estado.value,
        array_estado = document.Estadoclientes.txt_estado.value.split(""),
        no_espacios = 0,
        caracteres_invalidos = 0;
  for ( e in array_estado ) {
    if ( array_estado[e] != " ") {
      no_espacios++;
    }
  }
  for ( e2 in array_estado ) {
    if ( array_estado[e2]=='0' || array_estado[e2]=='1' ||
         array_estado[e2]=='2' || array_estado[e2]=='3' ||
         array_estado[e2]=='4' || array_estado[e2]=='5' ||
         array_estado[e2]=='6' || array_estado[e2]=='7' ||
         array_estado[e2]=='8' || array_estado[e2]=='9' ||
         array_estado[e2]=='.' || array_estado[e2]=='_' ||
         array_estado[e2]=='-' || array_estado[e2]=='+' ||
         array_estado[e2]=='@' || array_estado[e2]=='/' ||
         array_estado[e2]=='(' || array_estado[e2]==')') {
    caracteres_invalidos++;
    break;
    }
  }
  
  if ( estado == "" ) {
      swal({
        title: 'Error',
        text: '¿El campo de estado está vacío?',
        icon: 'error',
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    console.log('El campo de estado está vacío');
    return false;
  } else if ( no_espacios < 2 ) {
    swal({
      title: 'Error',
      text: 'No hay al menos 2 caracteres válidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
  })
  console.log('No hay al menos 2 caracteres válidos');
  return false;
  } else if ( caracteres_invalidos!=0 ) {
    swal({
      title: 'Error',
      text: 'Hay carácteres inválidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
  })
  console.log('Hay carácteres inválidos');
  return false;
  } else if ( document.Estadoclientes.txt_estado.value.length < 2 ||
              document.Estadoclientes.txt_estado.value.length > 50) {
    swal({
      title: 'Error',
      text: 'El campo de estado no tiene 2 carácteres o supera los 50',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
              })
  console.log('El campo de estado no tiene 2 carácteres o supera los 50');
  return false;            
  }
return true;
}

//funcion que valida el campo de busqueda de estado de clientes
function Validar_Buscar_Estado_Clientes() {
  var valor_busqueda = document.Buscar_estado_clientes.txt_buscar.value,
        array_texto_busqueda = valor_busqueda.split(""),
        caracter_mas = valor_busqueda.indexOf("+"),
        caracter_menos = valor_busqueda.indexOf("-"),
        no_espacios_guiones = 0;
  for ( b in array_texto_busqueda ) {
    if ( array_texto_busqueda[b] != " " && array_texto_busqueda[b]!=".") {
      no_espacios_guiones++;
    }
  }
  if ( valor_busqueda == "" ) {
    swal({
      title: 'Error',
      text: 'El campo de busqueda está vacío',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de busqueda está vacío');
    return false;
  } else if ( no_espacios_guiones == 0 ) {
    swal({
      title: 'Error',
      text: 'El campo de búsqueda no tiene al menos un carácter para poder buscar',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de búsqueda no tiene al menos un carácter para poder buscar');
    return false;
  } else if ( caracter_mas!=-1 || caracter_menos!=-1 ) {
    swal({
      title: 'Error',
      text: 'El campo de búsqueda tiene carácteres invalidos',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de búsqueda contiene carácteres inválidos');
    return false;
  } else if ( document.Buscar_estado_clientes.txt_buscar.value.length < 1 ||
              document.Buscar_estado_clientes.txt_buscar.value.length > 50) {
    swal({
      title: 'Error',
      text: 'El campo de búsqueda no tiene 2 carácteres o supera los 50',
      icon: 'error',
      closeOnClickOutside: false,
      closeOnEsc: false
    })
    console.log('El campo de búsqueda no tiene 2 carácteres o supera los 50');
    return false;              
  }
  return true;
}

// Función para verificar si existen usuarios en el sitio privado antes de iniciar sesión.
function checkUsuarios()
{
    // Se obtiene la ruta del documento en el servidor web.
    let current = window.location.pathname;
    console.log(current);
    $.ajax({
        dataType: 'json',
        url: API_USUARIOS + 'ridal'
    })
    .done(function( response ) {
        
        // Se comprueba si la página web actual es register.php, de lo contrario seria index.php
        if ( current == '/Sitioweb/Sitioweb/views/privado/Registrarse.php' ) {
            // Si ya existe un usuario registrado se envía a iniciar sesión, de lo contrario se pide crear el primero.
            if ( response.status ) {
                sweetAlert( 3, response.message, 'Index.php' );
            } else {
                sweetAlert( 4, 'Debe crear un usuario para comenzar', null );
            }
        } else {
            // Si ya existe al menos un usuario registrado se pide iniciar sesión, de lo contrario se envía a crear el primero.
            if ( response.status ) {
                sweetAlert( 4, 'Debe autentificarse para ingresar', null );
            } else {
                sweetAlert( 3, response.exception, 'Registrarse.php' );
            }
        }
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}