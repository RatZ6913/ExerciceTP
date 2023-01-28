<?php
require_once __DIR__ . './core/database/showUsersStartWithM.php';
require_once __DIR__ . './public/common/header.php';


?>


<title><?= "Exercice 5"; ?></title>


<body>


  <!-- EXERCICE 4  : -->
  <section id="">
    <h1>Les utilisateurs dont le nom ou prénom commence par 'M' sont : </h1>
    <?php
    foreach ($getUsersStartWithM as $key) {
    ?>
      <h3><?= $key['lastName'] . " " .$key['firstName'] ?></h3>
    <?php
    }
    ?>

  </section>
</body>