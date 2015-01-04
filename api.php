<?php

/*
*
* REST API
* Create -> Post
* Update -> Put
* Get -> Get
* Delete -> Delete
*
*/
class api_class{

  public function create(array $params){
    return false;
  }

  public function get($identifier=null){
    return false;
  }

  public function update($identifier,array $params){
    return false;
  }

  public function delete($request){
    return false;
  }
}
