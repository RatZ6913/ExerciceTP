<?php

require_once __DIR__ . './database.php';

$showArtistsAndShows = $pdo->prepare("SELECT title, performer, date, startTime FROM shows  
ORDER BY title ASC;");
$showArtistsAndShows->execute();

$getArtistsAndShows = $showArtistsAndShows->fetchAll();





