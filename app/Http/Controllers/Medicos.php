<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Dao\MedicosDao;
use Illuminate\Support\Facades\Log;

class Medicos extends Controller
{
  //
  function medicosAdmin(Request $request){

    $nombre = $request->input('doctor_name');

    $medicsDao = new MedicosDao;
    $medicos = $medicsDao->getMedicos($nombre);

    $data = array(
      'medicos' => $medicos,
      'nombre' => $nombre
    );
    return view('doctors',$data);
  }

  function addMedico(Request $request){

    $medic_name = $request->input('doc_name');
    $medic_app = $request->input('doc_app');
    $medic_apm = $request->input('doc_apm');
    $cedula = $request->input('cedula');
    $especialidad = $request->input('especialidad');
    $telefono = $request->input('tel_fijo');
    $celular = $request->input('tel_movil');
    $nombreCompleto = $medic_name . ' ' . $medic_app . ' ' . $medic_apm;

    $idUser = $request->input('id_user');
    $cedulaUpdate = $request->input('hide_cedula');

    $contacto = array(
      'nombre' => $medic_name,
      'apPaterno' => $medic_app,
      'apMaterno'=> $medic_apm,
      'nombreCompleto' => $nombreCompleto,
      'tel' => $telefono,
      'cel' => $celular,
      'email' => '_'
    );

    $doctor = array(
      'cedula' => $cedula,
      'especialidad' => $cedula,
      'contacto' => $contacto
    );

    $exito;
    $medicsDao = new MedicosDao;
    if($cedulaUpdate != null){
      $exito = $medicsDao->updateMedico($idUser,$doctor);
    }
    else{
      $exito = $medicsDao->addMedico($idUser,$doctor);
    }

    if($exito){
      $message = 'Médico guardado con exito';
    }
    else {
      $message = 'Ha habido un problema, comunicate con soporte';
    }

    return redirect()->route('medicsAdmin')->with('message', $message);
  }

}
