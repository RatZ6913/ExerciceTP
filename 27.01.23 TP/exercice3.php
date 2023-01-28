<?php
require_once __DIR__ . './core/database/showTwentyClientsDB.php';
require_once __DIR__ . './public/common/header.php';


?>


<title><?= "Exercice 3"; ?></title>


<body>


  <!-- EXERCICE 2 : : -->
  <section id="">
    <?php
    foreach ($getTwentyClientsDB as $key) {
    ?>
      <h2>Nom : <?= $key['lastName']; ?> Prénom : <?= $key['firstName']; ?> ID : <?= $key['id']; ?> </h2>
    <?php
    }
    ?>

  </section>
</body>