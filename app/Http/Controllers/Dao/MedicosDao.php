<?php

namespace App\Http\Controllers\Dao;

use App\Libraries\MedicFrontApi;
use Log;

/**
 *    Clase para obtener los datos de los usuarios a partir de los servicios publicados por el back
 **/
class MedicosDao extends MedicFrontApi{

  const URL = "/usuario/{idUser}/doctor/";
  const URL_USUARIO = "/usuario";
  protected $options;

  public function __construct(){
    $this->options = array('Content-Type' => 'application/json');
  }

  /**
  * TODO falta un parametro
  * Metodo para obtener toda la lista de Destinations
  * @return Users list
  **/
  public function getMedicos($nombre){
  $filters = array('active' => 'true','role'=>'MEDICO');

    if($nombre != null){
      $filters['name'] = $nombre;
    }

    $medicos = self::searchEndpoint(self::URL_USUARIO, $filters, null);
    return $medicos;
  }

  public function addMedico($idUsuario,$datosDoctor){
    if($datosDoctor != null && $idUsuario != null){
      $url = str_replace("{idUser}", $idUsuario, self::URL);
      $this->options = array('Content-Type' => 'application/json');

      $medicoJson = json_encode($datosDoctor);
      Log::info('Medico JSon:'.$medicoJson);

      $resp = self::saveOrUpdateEndpoint('POST',$url, $medicoJson, null);
    
      return !is_null($resp);
    }
    return false;
  }

  public function updateMedico($idUsuario,$datosDoctor){
    if($datosDoctor != null && $idUsuario != null){
      $url = str_replace("{idUser}", $idUsuario, self::URL);
      $this->options = array('Content-Type' => 'application/json');

      $medicoJson = json_encode($datosDoctor);
      Log::info('Medico JSon:'.$medicoJson);

      $resp = self::saveOrUpdateEndpoint('PUT',$url, $medicoJson, null);
      return !is_null($resp);
    }
    return false;
  }

  // TODO sin usar por el momento, implementar cuando sea necesario
  public function deleteMedico($usuario){
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
