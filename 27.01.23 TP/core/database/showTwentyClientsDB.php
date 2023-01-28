<?php

require_once __DIR__ . './database.php';

$showTwentyClientsDB = $pdo->prepare('SELECT id, lastName, firstName  FROM clients LIMIT 20');
$showTwentyClientsDB->execute();

$getTwentyClientsDB = $showTwentyClientsDB->fetchAll();


