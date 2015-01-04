<?php
require('bootstrap.php');
require('api.php');

delegate($_SERVER['REQUEST_METHOD']);

echo "Hooray!";

// FUNCTIONS //

function delegate($requestMethod){
  $api = new api_class();
  $params = $_REQUEST;

  switch($requestMethod){
    case 'GET':
      $id = $_GET['id'];
      return $api->get($id);
    case 'POST':
      return $api->create($params);
    case 'PUT':
      $id = $_PUT['id'];
      return $api->update($id,$params);
    case 'DELETE':
      return $api->delete($_REQUEST);
    default:
      error_log('Unknown Request');
  }
}
