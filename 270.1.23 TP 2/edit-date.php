<?php

require_once __DIR__ . './core/database/editDateDB.php'; // Vérif Formulaire
require_once __DIR__ . './core/database/parameters/parameters.php';



?>

<head>
  <?php require_once __DIR__ . './public/common/head.php'; ?>
  <title>Modifer un rendez-vous</title>
</head>

<body>
  <?php require_once __DIR__ . './public/common/header.php'; ?>

  <section class="listPatients">
    <h1>Modifer un rendez-vous</h1>

    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      <div>
        <label for="lastName">Nom : </label>
        <input type="text" name="lastName" id="lastName">
        <p class="errorsMsg"><?= $errors['lastName']; ?></p>
      </div>
      <div>
        <label for="firstName">Prénom : </label>
        <input type="text" name="firstName" id="firstName">
        <p class="errorsMsg"><?= $errors['firstName']; ?></p>
      </div>
      <div>
        <label for="email">Email : </label>
        <input type="text" name="email" id="email">
        <p class="errorsMsg"><?= $errors['email']; ?></p>
      </div>
      <div>
        <label for="date">Date : </label>
        <input type="date" name="date" id="date">
        <p class="errorsMsg"><?= $errors['date']; ?></p>
      </div>
      <div>
        <label for="hour">Heure : </label>
        <input type="time" name="hour" id="hour">
        <p class="errorsMsg"><?= $errors['hour']; ?></p>
      </div>
      <input type="submit" value="Modifer">
    </form>
    <p class="success"><?= $dateAdded ?? '' ?></p>
  </section>

  <?php require_once __DIR__ . './public/common/footer.php'; ?>
  
</body>





