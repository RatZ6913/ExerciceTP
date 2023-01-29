<?php

require_once __DIR__ . './core/database/addPatientDB.php';
require_once __DIR__ . './core/database/parameters/parameters.php';

?>

<head>
  <?php require_once __DIR__ . './public/common/head.php'; ?>
  <title>Ajouter un patient</title>
</head>

<body>
  <?php require_once __DIR__ . './public/common/header.php'; ?>

  <section id="box-addPatients">
    <h1>Ajouter un patient</h1>
    <div class="content">
      <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div>
          <label for="lastName">Nom :</label>
          <input type="text" name="lastName" id="lastName" value="<?= $lastName ?? '' ?>" placeholder="2 caractères minimum...">
          <p class="errorsMsg"><?= $errors['lastName']; ?></p>
        </div>
        <div>
          <label for="firstName">Prénom :</label>
          <input type="text" name="firstName" id="firstName" value="<?= $firstName ?? '' ?>" placeholder="2 caractères minimum...">
          <p class="errorsMsg"><?= $errors['firstName']; ?></p>
        </div>
        <div>
          <label for="birthDate">Date de naissance :</label>
          <input type="date" name="birthDate" id="birthDate" value="<?= $birthDate ?? '' ?>">
          <p class="errorsMsg"><?= $errors['birthDate']; ?></p>
        </div>
        <div>
          <label for="phone">Téléphone :</label>
          <input type="phone" name="phone" id="phone" value="<?= $phone ?? '' ?>" placeholder="+33...">
          <p class="errorsMsg"><?= $errors['phone']; ?></p>
        </div>
        <div>
          <label for="email">Mail :</label>
          <input type="text" name="email" id="email" value="<?= $email ?? '' ?>" placeholder="Rentrez un mail valide...">
          <p class="errorsMsg"><?= $errors['email']; ?></p>
        </div>
        <input type="submit" value="Ajouter">
      </form>
      <p class="success"><?= $patientAdded = $patientAdded ?? ''; ?></p>
    </div>
  </section>
  <?php require_once __DIR__ . './public/common/footer.php'; ?>
</body>