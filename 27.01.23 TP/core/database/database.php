<?php

const DB_HOST = "localhost";
const DB_PORT = "3306";
const DB_DATABASE = "colyseum";
// const DB_USERNAME = "";
// const DB_PASSWORD = "";

try {
  $pdo = new PDO(
    'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_DATABASE,
    getenv('DB_USERNAME'),
    getenv('DB_PASSWORD'),
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8; USE colyseum;'
    ]
  );
  echo 'test réussi';
} catch (PDOException $e) {
  throw new Exception($e->getMessage());
}


return $pdo;



