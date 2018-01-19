<?php

namespace App\Libraries;

use GuzzleHttp\Client;

use Log;

class MedicFrontApi{

  protected static function searchEndpoint($endpoint, $queries, $onError = null){
    $client = new Client([
      'headers' => [ 'Content-Type' => 'application/json' ],
      'query' => $queries
    ]);

    try {
      $response = $client->request('GET', env("API_BASE_URL") . $endpoint);
      $respuesta = json_decode($response->getBody());
      return $respuesta;

    } catch (\Exception $e) {
      dd($e);
      return self::handleErrors($e, function($error){
        abort(404);
        return null;
      });
    }

  }

  protected static function saveOrUpdateEndpoint($method,$endpoint, $jsonObject, $onError = null){
    $object_api = new Client([
      'headers' => [ 'Content-Type' => 'application/json' ]
    ]);

    $request_options['http_errors'] = false;
    $request_options['connect_timeout'] = 200;

    try {
      $response = $object_api->request($method, env("API_BASE_URL") . $endpoint, ['body' => $jsonObject]);
      $respuesta = json_decode($response->getBody());
      return $respuesta;
    } catch (\Exception $e) {
      dd($e);
      return self::handleErrors($e, function($error){
        abort(404);
        return null;
      });
    }
  }

  private static function handleErrors($data = null, $onError){
    if($onError){
      try {
        return $onError($data);
      } catch (\Exception $e) {
        abort(404);
        //return dd($e->getMessage());
      }
    }
  }

}
