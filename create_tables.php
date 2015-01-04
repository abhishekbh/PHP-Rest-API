<?php

//create_user_table();
//create_wikipage_table();
//create_user_wikipage_mapper_table();

/// FUNCTIONS ///

function create_user_table($conn){
  $build = 'CREATE TABLE user (
              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              firstname VARCHAR(30) NOT NULL,
              lastname VARCHAR(30) NOT NULL,
              email VARCHAR(100),
              created_date TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )';

  if ($conn->query($build) === FALSE) {
    echo "Error creating table:";
    print_r($conn->errorInfo());
  }
}

function create_wikipage_table($conn){
  $build = 'CREATE TABLE wikipage (
              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              page_title VARCHAR(250),
              page_url VARCHAR(250),
              created_date TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )';

  if ($conn->execute($build) === FALSE) {
    echo "Error creating table:";
    print_r($conn->errorInfo());
  }
}

function create_user_wikipage_mapper_table($conn){
  $build = 'CREATE TABLE user_wikipage_mapper (
              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              user_id INT(6),
              wikipage_id INT(6),
              created_date TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )';

  if ($conn->execute($build) === FALSE) {
    echo "Error creating table:";
    print_r($conn->errorInfo());
  }
}
