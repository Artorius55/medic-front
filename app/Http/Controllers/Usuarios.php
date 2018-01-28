<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Dao\UsuariosDao;
use Illuminate\Support\Facades\Log;
use Hash;

class Usuarios extends Controller
{
    //
    function usersAdmin(Request $request){

      $mail = $request->input('user_name');
      $nombre = $request->input('doc_name');

      $usersDao = new UsuariosDao;
      $users = $usersDao->getUsers($mail,$nombre);

      $data = array(
        'usuarios' => $users,
        'mail' => $mail,
        'nombre' => $nombre
      );
      return view('users',$data);
    }

    function addUser(Request $request){

      $usr_name = $request->input('usr_mail');
      $usr_pass = Hash::make($request->input('usr_pass'));
      $rolAdmin = $request->input('admin_check');
      $rolMedic = $request->input('doctor_check');
      $idUser = $request->input('idUsuario');

      $roles = array($rolAdmin,$rolMedic);

      $newUser = array(
        'nombre' => $usr_name,
        'password' => $usr_pass,
        'roles'=> $roles
      );

      $exito;
      $usersDao = new UsuariosDao;
      if($idUser != null){
        $newUser['id'] = $idUser;
        $exito = $usersDao->updateUser($newUser);
      }
      else{
        $exito = $usersDao->addUser($newUser);
      }

      if($exito){
        $message = 'Usuario guardado con exito';
      }
      else {
        $message = 'Ha habido un problema, comunicate con soporte';
      }

      return redirect()->route('usersAdmin')->with('message', $message);
    }

  function deleteUser(Request $request){
    $usr_name = $request->input('usrMail');
    $idUser = $request->input('idUser');

    $user = array(
      'nombre' => $usr_name,
      'id' => $idUser
    );

    $usersDao = new UsuariosDao;
    $exito = $usersDao->deleteUser($user);

    if($exito){
      $message = 'Usuario borrado con exito';
    }
    else {
      $message = 'Ha habido un problema, comunicate con soporte';
    }

    return redirect()->route('usersAdmin')->with('message', $message);

  }
}
