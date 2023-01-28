<?php
require_once __DIR__ . './core/database/showUsersNoCards.php';
require_once __DIR__ . './public/common/header.php';


?>


<title><?= "Exercice 4"; ?></title>


<body>


  <!-- EXERCICE 4  : -->
  <section id="">
    <?php
    foreach ($getUsersNoCards as $key) {
    ?>
      <h3><?= $key['lastName'], $key['firstName'] ?></h3>
    <?php
    }
    ?>
    <p>Tous ces utilisateurs n'ont pas de cartes !</p>


  </section>
</body>