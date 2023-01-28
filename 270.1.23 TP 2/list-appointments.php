<?php

require_once __DIR__ . './core/database/parameters/parameters.php';

// Je récupère le numéro de l'id, envoyé par le <a> : list-patients.php


$getListAppointments->execute();
$showAllAppointments = $getListAppointments->fetchAll();

?>

<head>
  <?php require_once __DIR__ . './public/common/head.php'; ?>
  <title>Liste des rendez-vous</title>
</head>

<body>
  <?php require_once __DIR__ . './public/common/header.php'; ?>
  <a href="./add-date.php">Ajouter un rendez-vous</a>
  <section id="listPatients">
    <h1>Listes des rendez-vous</h1>
    <?php
    foreach ($showAllAppointments as $key) {
    ?>
      <div class="listOfpatients">
        <p><?= $key['dateHour']; ?></p>
        <p><?= $key['firstName']; ?></p>
        <p><?= $key['lastName'];?></p>
        <a href="./appointments.php?<?= $key['id']; ?>">Plus de détails</a>
        <a href="">Supprimer ce rendez-vous</a>
      </div>
    <?php
    }
    ?>
  </section>


  <?php require_once __DIR__ . './public/common/footer.php'; ?>

</body>
