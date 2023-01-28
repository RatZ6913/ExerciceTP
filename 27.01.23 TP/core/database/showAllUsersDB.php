<?php

require_once __DIR__ . './database.php';

$getAllusers = $pdo->prepare('SELECT * FROM clients');
$getAllusers->execute();

$showAllUsers = $getAllusers->fetchAll();


