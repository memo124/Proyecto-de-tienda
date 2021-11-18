$(document).ready(function(){
    $('.sidenav').sidenav();
    $('.slider').slider();
    $('.carousel').carousel();
    $('.collapsible').collapsible();
    $(".dropdown-trigger").dropdown();
    $('.sidenav').sidenav();
    $('select').formSelect();
    $('.modal').modal();
    $('.tooltipped').tooltip();
    $('.datepicker').datepicker();
});

function Salir(){
    Swal.fire({
    title: '<h3><b>¿Desea salir?</h3></b>',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#212121',
    cancelButtonColor: '#f44336',
    cancelButtonText:'Cancelar.',
    confirmButtonText: 'Si, salir.',
    showClass: {
      popup: 'animated slideInDown'
    },
    hideClass: {
      popup: 'animated hinge'
    }
    }).then((result) => {
      if (result.value) {
          document.location.href='../../views/privado/Index.php';
      }
    })
};
