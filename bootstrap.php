<?php
require('config.php');

$conn = db_connect($db_name, $servername, $username, $password);
test_tables($conn);

/** FUNCTIONS **/

function db_connect($db_name, $servername, $username, $password){
  try{
    $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
  }catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
  }
}

function test_tables($conn){
  require('create_tables.php');

  if(!table_exists($conn, 'user')){
    create_user_table($conn);
  }

  if(!table_exists($conn, 'wikipage')){
    create_wikipage_table($conn);
  }

  if(!table_exists($conn, 'user_wikipage_mapper')){
    create_user_wikipage_mapper_table($conn);
  }
}

function table_exists($pdo, $table) {
  try {
    $result = $pdo->query("SELECT 1 FROM $table LIMIT 1");
  } catch (Exception $e) {
    return FALSE;
  }

  return $result !== FALSE;
}
