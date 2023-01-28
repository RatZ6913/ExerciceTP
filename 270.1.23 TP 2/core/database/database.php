<?php

const DB_HOST = "127.0.0.1";
const DB_PORT = "3306";
const DB_DATABASE = "hospitale2n";
// const DB_NAME = "root"; // Greta
// const DB_PWD = ""; // Greta

try {
  $pdo = new PDO(
    'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_DATABASE,
    getenv('DB_NAME'),
    getenv('DB_PWD'),
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8; USE hospitale2n;'
    ]
  );
} catch (PDOException $e) {
  throw new Exception($e->getMessage());
}

return $pdo;


// J'initialise 
//  - getenv('DB_NAME') 
//  - getenv('DB_PWD')

// en déclarant les variables avec le CLI 
// DB_NAME='NOM_BDD' DB_PWD='PWD_BDD' php -S localhost:3000




