<?php

namespace App\Http\Controllers\Dao;

use App\Libraries\MedicFrontApi;
use Log;

/**
 *    Clase para obtener los datos de los usuarios a partir de los servicios publicados por el back
 **/
class UsuariosDao extends MedicFrontApi{

  const URL = "/usuario";
  protected $options;

  public function __construct(){
    $this->options = array('Content-Type' => 'application/json');
  }

  /**
  *    Metodo para obtener toda la lista de Destinations
  * @return Users list
  **/
  public function getUsers($mail,$nombre){
  $filters = array('active' => 'true');

    if($mail != null){
      $filters['email'] = $mail;
    }
    if($nombre != null){
      $filters['name'] = $nombre;
    }

    $users = self::searchEndpoint(self::URL, $filters, null);
    return $users;
  }

  public function addUser($usuario){
    if($usuario != null){
      $this->options = array('Content-Type' => 'application/json');

      $usuarioJson = json_encode($usuario);
      Log::info('Usuario JSon:'. $usuarioJson);
      //$data = array('usuario' => $usuarioJson);
      $resp = self::saveOrUpdateEndpoint('POST',self::URL, $usuarioJson, null);
      Log::info('ID generado:'.$resp->id);
      return !is_null($resp->id);
    }
    return false;
  }

  public function updateUser($usuario){
    if($usuario != null){
      $this->options = array('Content-Type' => 'application/json');

      $usuarioJson = json_encode($usuario);
      Log::info('Usuario JSon:'. $usuarioJson);
      //$data = array('usuario' => $usuarioJson);
      $resp = self::saveOrUpdateEndpoint('PUT',self::URL, $usuarioJson, null);
      return !is_null($resp);
    }
    return false;
  }

  public function deleteUser($usuario){
    if($usuario != null){
      $this->options = array('Content-Type' => 'application/json');

      $usuarioJson = json_encode($usuario);
      Log::info('Usuario JSon:'. $usuarioJson);
      //$data = array('usuario' => $usuarioJson);
      $resp = self::saveOrUpdateEndpoint('DELETE',self::URL, $usuarioJson, null);
      return is_null($resp);
    }
    return false;
  }

}
