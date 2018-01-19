@extends('templates.mainTemplate')

@section('content')

@if (Session::has('success'))
  <script type="text/javascript">
      Materialize.toast('{!! Session::get("success") !!}', 4000);
  </script>
@endif

  <div class="full-height">
    <div class="container filters">
      {!! Form::open(['url' => 'users', 'method' => 'get']) !!}
        <div class="row">
          <div class="input-field col s6">
            <input id="doc_name" type="text" name="doc_name" class="validate" value="{{$nombre}}">
            <label for="doc_name">Doctor</label>
          </div>
          <div class="input-field col s6">
            <input id="user_name" type="text" name="user_name" class="validate" value="{{$mail}}">
            <label for="user_name">Usuario</label>
          </div>
        </div>
        <center>
          <button class="waves-effect waves-light btn blue" type="submit"><i class="material-icons left">search</i>Buscar</button>
        </center>
      {!! Form::close() !!}
    </div>
    @if (count($usuarios) > 0)
      <div class="container results">
        <div class="row">

          @foreach($usuarios as $usr)
            <div class="col s1 m3 l3 column-card">
              <div class="card hoverable card-profile">
                <!-- <img src="{{ asset("img/elgali.jpg") }}" class="card-profile-photo" /> -->
                <div class="user-name">
                  @if ($usr->datosDoctor != null)
                    <h6 class="center-align">{{$usr->datosDoctor->contacto->nombre}}</h6>
                    <h6 class="center-align">{{$usr->datosDoctor->contacto->apPaterno}} {{$usr->datosDoctor->contacto->apMaterno}}</h6>
                  @else
                    <h6 class="center-align">Doctor aun no asociado</h6>
                  @endif
                </div>
                <div class="user-mail">
                  <h6 class="center-align">{{$usr->nombre}}</h6>
                </div>
                <div class="user-actions">
                  <center>
                    <a class="waves-effect waves-light btn light-green modal-trigger" href="#modalEdit" onclick="setDatosUsuario('{{json_encode($usr)}}')"><i class="material-icons">edit</i></a>
                    <a class="waves-effect waves-light btn red modal-trigger" href="#modalEdit"><i class="material-icons">delete</i></a>
                  </center>
                </div>
              </div>
            </div>
          @endforeach

        </div>
      </div>
    @else
      <div class="container no-data">
        <img src="" />
        <h4>¡Oooops! Parece que aún no tenemos datos para mostrar... </h4>
      </div>
    @endif
    <a id="fab" class="btn-floating btn-large waves-effect waves-light blue modal-trigger my-fab" href="#modalEdit" ><i class="material-icons">add</i></a>
  </div>

  <!-- Modal Structure -->
  <div id="modalEdit" class="modal">
    {{ Form::open(['url' => 'users/add','id' => 'editUser', 'method' => 'post']) }}
      <div class="modal-content">
        <div class="valign-wrapper blue modal-header">
          <h5>Usuario</h5>
        </div>
        <div class="row margin_top_bottom_10">
          <div class="input-field col s8 offset-s2">
            <input id="usr_mail" type="email" name="usr_mail" class="validate" >
            <label id="mail_label" data-error="Mail inválido" data-success="Mail válido" for="usr_mail">E-mail</label>
          </div>
          <div class="input-field col s8 offset-s2">
            <input id="usr_pass" type="password" name="usr_pass" class="validate" >
            <label for="usr_pass">Contraseña</label>
          </div>
          <div class="col s8 offset-s2 margin_top_bottom_10">
            <input type="checkbox" class="filled-in checkbox-blue" id="admin_check" value="ADMIN" name="admin_check" />
            <label for="admin_check" class="my_inline_check_lbl">ADMIN</label>
            <input type="checkbox" class="filled-in checkbox-blue" id="doctor_check" value="MEDICO" name="doctor_check" />
            <label for="doctor_check" class="my_inline_check_lbl">DOCTOR</label>
          </div>
        </div>
        <input type="hidden" id="idUsuario" name="idUsuario" />
      </div>
      <div class="modal-footer">
        <a href="#!" class="waves-effect waves-light btn red modal-action modal-close waves-green btn-flat">Cancelar</a>
        <button href="#!" class="waves-effect waves-light btn light-green modal-action modal-close waves-green btn-flat">Aceptar</button>
      </div>
    {{ Form::close() }}
  </div>

@endsection
