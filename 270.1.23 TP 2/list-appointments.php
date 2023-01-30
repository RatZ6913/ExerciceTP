<?php

require_once __DIR__ . './core/database/parameters/parameters.php';

// Je récupère le numéro de l'id, envoyé par le <a> : list-patients.php
$getListAppointments->execute();
$showAllAppointments = $getListAppointments->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $appointmentsId = $_POST['id'];
  $deleteAppointments->execute();
}
?>

<head>
  <?php require_once __DIR__ . './public/common/head.php'; ?>
  <title>Liste des rendez-vous</title>
</head>

<body>
  <?php require_once __DIR__ . './public/common/header.php'; ?>
  <a href="./add-date.php">Ajouter un rendez-vous</a>
  <section id="box-listPatients">
    <h1>Listes des rendez-vous</h1>
    <?php
    foreach ($showAllAppointments as $key) {
      $appointmentsId = $key['id_app'];
    ?>
      <div class="listOfpatients">
        <p> Date / Heure : <span class='infosBDD'><?= $key['dateHour']; ?></span></p>
        <p> Nom : <span class='infosBDD'><?= $key['firstName']; ?></span></p>
        <p> Prénom : <span class='infosBDD'><?= $key['lastName']; ?></span></p>
        <a href="./appointments.php?<?= $key['id']; ?>">Plus de détails</a>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <!-- // Ici je mets un input invisible pour pouvoir récupérer le $_POST de l'id  -->
          <input type="hidden" name="id" value="<?= $key['id_app']; ?>">
          <input type="submit" name="submit" value="Supprimer">
        </form>
      </div>
    <?php
    }

    ?>
  </section>

  <?php require_once __DIR__ . './public/common/footer.php'; ?>

</body>