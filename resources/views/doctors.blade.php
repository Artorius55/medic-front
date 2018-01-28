@extends('templates.mainTemplate')

@section('content')

@if (Session::has('message'))
  <script type="text/javascript">
      Materialize.toast('{!! Session::get("message") !!}', 4000);
  </script>
@endif

<div class="full-height">
  <div class="container filters">
    {!! Form::open(['url' => 'medicos', 'method' => 'get']) !!}
      <div class="row">
        <div class="input-field col s12">
          <input id="doctor_name" type="text" name="doctor_name" class="validate" value="{{$nombre}}">
          <label for="doctor_name">Doctor</label>
        </div>
      </div>
      <center>
        <button class="waves-effect waves-light btn blue" type="submit"><i class="material-icons left">search</i>Buscar</button>
      </center>
    {!! Form::close() !!}
  </div>
  @if (count($medicos) > 0)
    <div class="container results">
      <div class="row">

        @foreach($medicos as $medic)
          <div class="col s1 m3 l3 column-card">
            <div class="card hoverable card-profile">
              <!-- <img src="{{ asset("img/elgali.jpg") }}" class="card-profile-photo" /> -->
              <div class="user-name">
                @if ($medic->datosDoctor != null)
                  <h6 class="center-align">{{$medic->datosDoctor->contacto->nombre}}</h6>
                  <h6 class="center-align">{{$medic->datosDoctor->contacto->apPaterno}} {{$medic->datosDoctor->contacto->apMaterno}}</h6>
                @else
                  <h6 class="center-align">Aun no se agregan los datos del doctor</h6>
                @endif
              </div>
              <div class="user-mail">
                <h6 class="center-align">{{$medic->nombre}}</h6>
              </div>
              <div class="medic-actions">
                @if ($medic->datosDoctor != null)
                  <a class="waves-effect waves-light btn light-green modal-trigger" href="#modalEdit" onclick="setDatosMedico('{{json_encode($medic)}}')"><i class="material-icons">edit</i>Editar</a>
                @else
                  <a class="waves-effect waves-light btn light-green modal-trigger" href="#modalEdit" onclick="setDatosMedico('{{json_encode($medic)}}')"><i class="material-icons">add</i>Agregar</a>
                @endif
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
  <!-- <a id="fab" class="btn-floating btn-large waves-effect waves-light blue modal-trigger my-fab" href="#modalEdit" ><i class="material-icons">add</i></a> -->
</div>

<!-- Agregar/Editar -->
<div id="modalEdit" class="modal">
  {{ Form::open(['url' => 'medicos/edit','id' => 'editMedico', 'method' => 'post']) }}
    <div class="modal-content">
      <div class="valign-wrapper blue modal-header">
        <h5>Médico</h5>
      </div>
      <div class="row margin_top_bottom_10">
        <div class="input-field col s12">
          <input id="doc_name" type="text" name="doc_name" class="validate" >
          <label id="name_label" for="doc_name">Nombre(s)</label>
        </div>
        <div class="input-field col s6">
          <input id="doc_app" type="text" name="doc_app" class="validate" >
          <label id="app_label" for="doc_app">Apellido Paterno</label>
        </div>
        <div class="input-field col s6">
          <input id="doc_apm" type="text" name="doc_apm" class="validate" >
          <label id="apm_label" for="doc_apm">Apellido Materno</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="cedula" type="text" name="cedula" class="validate" >
          <label id="cedula_label" for="cedula">Cédula</label>
        </div>
        <div class="input-field col s6">
          <input id="especialidad" type="text" name="especialidad" class="validate" >
          <label id="especialidad_label" for="especialidad">Especialidad</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input id="tel_fijo" type="text" name="tel_fijo" class="validate" >
          <label id="fijo_label" for="tel_fijo">Télefono Fijo</label>
        </div>
        <div class="input-field col s6">
          <input id="tel_movil" type="text" name="tel_movil" class="validate" >
          <label id="movil_label" for="especialidad">Celular</label>
        </div>
      </div>
      <input type="hidden" id="id_user" name="id_user" />
      <input type="hidden" id="hide_cedula" name="hide_cedula" />
    </div>
    <div class="modal-footer">
      <a href="#!" class="waves-effect waves-light btn red modal-action modal-close waves-green btn-flat">Cancelar</a>
      <button class="waves-effect waves-light btn light-green modal-action modal-close waves-green btn-flat">Aceptar</button>
    </div>
  {{ Form::close() }}
</div>

<!-- Eliminar -->
<!-- <div id="modalDelete" class="modal">
  {{ Form::open(['url' => 'users/delete','id' => 'deleteUser', 'method' => 'post']) }}
    <div class="modal-content">
      <div class="valign-wrapper blue modal-header">
        <h5>Confirmación</h5>
      </div>
      <h6>¿Estás seguro que deseas eliminar este usuario ?</h6>
      <div class="input-field col s8 offset-s2">
        <input id="usrMail" type="email" name="usrMail" class="validate" disabled>
        <label id="mailLabel" data-error="Mail inválido" data-success="Mail válido" for="usr_mail">E-mail</label>
      </div>
      <input type="hidden" id="idUser" name="idUser" />
    </div>
    <div class="modal-footer">
      <a href="#!" class="waves-effect waves-light btn red modal-action modal-close waves-green btn-flat">Cancelar</a>
      <button class="waves-effect waves-light btn light-green modal-action modal-close waves-green btn-flat">Aceptar</button>
    </div>
  {{ Form::close() }}
</div> -->

@endsection
