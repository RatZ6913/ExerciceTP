<?php


require_once __DIR__ . './core/database/parameters/parameters.php';

// Je récupère le numéro de l'id, envoyé par le <a> : list-patients.php
if (!empty($_SERVER["QUERY_STRING"])) {
  $patientId = $_SERVER["QUERY_STRING"];
}

$profilOfThisPatient->execute(); // Puis je le compare avec les infos de l'user si c'est =id . parameters.php
$showThisProfil = $profilOfThisPatient->fetch();

if (empty($showThisProfil)) {
  // Message pour informer l'user que aucun patient a été sélectionner
  echo "<p style=color:red> Veuillez sélectionner un patient !</p>";
  echo '<a href="./list-patients.php">Retour</a>';
  // Ou je coupe le script si un petit malin accède directement via l'URL
  die();
}

?>

<head>
  <?php require_once __DIR__ . './public/common/head.php'; ?>
  <link rel="stylesheet" href="./public/css/style.css">
  <title>Liste des patients</title>
</head>

<body>
  <?php require_once __DIR__ . './public/common/header.php'; ?>
  <a href="./add-patients.php">Ajouter un patient</a>
  <section id="listPatients">
    <div class="listOfpatients">
      <h1>Les infos du patient</h1>
      <!-- Si les variables sont NULL alors je les remplaces par des valeurs vides pour éviter des erreurs -->
      <p>Nom : <?= $showThisProfil['lastName'] ?? '' ?> </p>
      <p>Prénom : <?= $showThisProfil['firstName'] ?? ''; ?></p>
      <p>Date de Naissance : <?= $showThisProfil['birthdate'] ?? ''; ?></p>
      <p>Téléphone : <?= $showThisProfil['phone'] ?? ''; ?></p>
      <p>Mail : <?= $showThisProfil['mail'] ?? ''; ?></p>
    </div>
  </section>
</body>


