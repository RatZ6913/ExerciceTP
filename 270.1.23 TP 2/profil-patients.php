<?php

require_once __DIR__ . './core/database/parameters/parameters.php';

// Je récupère le numéro de l'id, envoyé par le <a> : list-patients.php
if (!empty($_SERVER["QUERY_STRING"])) {
  $patientId = $_SERVER["QUERY_STRING"];
}

// Liste de tous les rendez-vous de ce patient
$dateOfThisPatient->execute();
$showDateOfPatient = $dateOfThisPatient->fetchAll();

$profilOfThisPatient->execute(); // Puis je le compare avec les infos de l'user si c'est =id . parameters.php
$showThisProfil = $profilOfThisPatient->fetch();

if (empty($showThisProfil)) {
  // Message pour informer l'user que aucun patient a été sélectionner
  echo "<p style='color:red'> Veuillez sélectionner un patient !</p>";
  echo '<a href="./list-patients.php">Liste des patients</a>';
  // Et si le patient n'existe pas je coupe le script
  die();
}


?>

<head>
  <?php require_once __DIR__ . './public/common/head.php'; ?>
  <title>Liste des patients</title>
</head>

<body>
  <?php require_once __DIR__ . './public/common/header.php'; ?>
  <a href="./add-patients.php">Ajouter un patient</a>
  <section id="box-listAppments">
    <div class="content">
      <h1>Les infos du patient</h1>
      <!-- Si les variables sont NULL alors je les remplaces par des valeurs vides pour éviter des erreurs -->
      <p>Nom : <?= $showThisProfil['lastName'] ?? '' ?> </p>
      <p>Prénom : <?= $showThisProfil['firstName'] ?? ''; ?></p>
      <p>Date de Naissance : <?= $showThisProfil['birthdate'] ?? ''; ?></p>
      <p>Téléphone : <?= $showThisProfil['phone'] ?? ''; ?></p>
      <p>Mail : <?= $showThisProfil['mail'] ?? ''; ?></p>
    </div>

    <div id="profilPatient">
      <h2>Liste des rendez-vous de Mr/Mme. <?= $showThisProfil['lastName'] . " " . $showThisProfil['firstName'] ?></h2>
      <?php
      foreach ($showDateOfPatient as $key) {
      ?>
        <p><?= $key['dateHour']; ?></p>
      <?php
      }
      ?>
    </div>
  </section>
</body>








