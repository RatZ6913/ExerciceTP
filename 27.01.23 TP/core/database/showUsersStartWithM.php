<?php

require_once __DIR__ . './database.php';

$showUsersStartWithM = $pdo->prepare("SELECT firstName, lastName FROM clients WHERE firstName OR lastName LIKE 'm%' ORDER BY lastName ASC");
$showUsersStartWithM->execute();

$getUsersStartWithM = $showUsersStartWithM->fetchAll();


