<?php

require_once __DIR__ . './database.php';

$getAllShowsType = $pdo->prepare('SELECT type FROM showTypes');
$getAllShowsType->execute();

$howAllShowsType = $getAllShowsType->fetchAll();


