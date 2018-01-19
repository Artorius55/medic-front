$(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();

    // Admin users
    $('#fab').click(function (e){
      $('#editUser')[0].reset();
    });

  });

//Admin users functions
function setDatosUsuario(userJson) {
  var user = JSON.parse(userJson);

  $('#editUser')[0].reset();
  $('#usr_mail').val(user.nombre);
  $('#mail_label').addClass('active');
  $('#idUsuario').val(user.id);

  user.roles.forEach(function(rol) {
    if(rol == 'MEDICO'){
      $("#doctor_check").prop( "checked", true );
    }
    if(rol == 'ADMIN'){
      $("#admin_check").prop( "checked", true );
    }
  });

}
