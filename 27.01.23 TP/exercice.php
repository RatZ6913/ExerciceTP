<?php

require_once __DIR__ . './core/database/showAllUsersDB.php';
require_once __DIR__ . './public/common/header.php';

?>


<title><?= "Exercice 1"; ?></title>

<body>
  <!-- EXERCICICE  1 :  -->
  <section id="">
    <h1>Voici la liste de tous les clients : </h1>

    <?php
    foreach ($showAllUsers as $key) {
    ?>
      <h3>Nom : <?= $key['lastName'] ?></h3>
      <h3>Prénom : <?= $key['firstName'] ?></h3>
      <h3>Date de Naissance : <?= $key['birthDate']; ?></h3>
    <?php
    }
    ?>
  </section>





</body>

</html>