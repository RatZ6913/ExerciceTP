<?php
require_once __DIR__ . './core/database/showAllShowsDB.php';
require_once __DIR__ . './public/common/header.php';


?>
<title><?= "Exercice 2"?></title>
<body>
  
 
 <!-- EXERCICE 2 : : -->
  <section id="">
    <?php
    foreach ($howAllShowsType as $key) {
    ?>
      <h3>Types de concert : <?= $key['type']; ?></h3>
    <?php
    }
    ?>
  </section>
</body>
