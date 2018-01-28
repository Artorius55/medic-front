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

function setDelete(userJson){
  var user = JSON.parse(userJson);
  $('#deleteUser')[0].reset();
  $('#usrMail').val(user.nombre);
  $('#idUser').val(user.id);
  $('#mailLabel').addClass('active');
}

//medicos
function setDatosMedico(userJson){
  var user = JSON.parse(userJson);

  $('#editMedico')[0].reset();
  $('#id_user').val(user.id);
  if(user.datosDoctor != null){
    $('#hide_cedula').val(user.datosDoctor.cedula);
    $('#cedula').val(user.datosDoctor.cedula);
    $('#cedula_label').addClass('active');
    $('#especialidad').val(user.datosDoctor.especialidad);
    $('#especialidad_label').addClass('active');
    if(user.datosDoctor.contacto != null){
      $('#doc_name').val(user.datosDoctor.contacto.nombre);
      $('#name_label').addClass('active');
      $('#doc_app').val(user.datosDoctor.contacto.apPaterno);
      $('#app_label').addClass('active');
      $('#doc_apm').val(user.datosDoctor.contacto.apMaterno);
      $('#apm_label').addClass('active');
      $('#tel_fijo').val(user.datosDoctor.contacto.tel);
      $('#fijo_label').addClass('active');
      $('#tel_movil').val(user.datosDoctor.contacto.cel);
      $('#movil_label').addClass('active');
    }
  }

}
