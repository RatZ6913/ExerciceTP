<?php

require_once __DIR__ . './core/database/parameters/parameters.php';

$listOfPatients->execute();
$showAllPatients = $listOfPatients->fetchAll();


?>

<head>
  <?php require_once __DIR__ . './public/common/head.php'; ?>
  <title>Liste des patients</title>
</head>

<body>
  <?php require_once __DIR__ . './public/common/header.php'; ?>
  <a href="./add-patients.php">Ajouter un patient</a>
  <section id="listPatients">
    <h1>Liste des patients</h1>
    <?php
    foreach ($showAllPatients as $key) {
    ?>
      <div class="listOfpatients">
        <p> Nom : <?= $key['firstName']; ?></p>
        <p> Prénom : <?= $key['lastName']; ?></p>
        <!-- // J'envoie l'id du patient pour le récupérer dans : profil-patients.php. Et pouvoir le comparer -->
        <a href="./profil-patients.php?<?= substr(md5($key['id']), 0, 6) ?>">Infos de <?= $key['firstName']; ?></a>
      </div>
    <?php
    }
    ?>
  </section>


  <?php require_once __DIR__ . './public/common/footer.php'; ?>

</body>







