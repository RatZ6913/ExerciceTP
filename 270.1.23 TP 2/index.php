<?php

require_once __DIR__ . './core/database/database.php';

?>

<head>
  <?php require_once __DIR__ . './public/common/head.php'; ?>
  <title>Hôpital Saint-Gilles</title>
</head>

<body>
  <?php require_once __DIR__ . './public/common/header.php'; ?>

  <section class="container">
    <h1>L’Hôpital Saint Gilles</h1>
    <a href="./add-patients.php">Ajouter un patient</a>
    <a href="./add-date.php">Ajouter un rendez-vous</a>
  </section>

  <section id="mainPage">
    <span id="looneyTunes"></span>
    <h2>Euh, quoi de neuf, docteur ?</h2>
    <div id="bugs-Bunny">
    </div>
  </section>

  <?php require_once __DIR__ . './public/common/footer.php'; ?>
</body>

</html>