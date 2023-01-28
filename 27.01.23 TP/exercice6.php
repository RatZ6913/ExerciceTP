<?php
require_once __DIR__ . './core/database/showArtistsAndShows.php';
require_once __DIR__ . './public/common/header.php';


?>


<title><?= "Exercice 6"; ?></title>


<body>


  <!-- EXERCICE 4  : -->
  <section id="">
    <h1>Listes des spectacles : </h1>
    <?php
    foreach ($getArtistsAndShows as $key) {
    ?>
      <h3><?= $key['title'] . " " . $key['performer'] . " " . $key['date'] . " " . $key['startTime'] ?></h3>
    <?php
    }
    ?>

  </section>
</body>