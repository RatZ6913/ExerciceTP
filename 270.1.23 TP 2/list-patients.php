<?php

require_once __DIR__ . './core/database/parameters/parameters.php';

$listOfPatients->execute();
$showAllPatients = $listOfPatients->fetchAll();

$validPatient = $searchPatient->fetchAll() ?? '';

if ($_SERVER['REQUEST_METHOD'] === "POST") {

  $delPatientId = $_POST['delPatientId'] ?? '';
  if (!empty($delPatientId)) {
    $deleteThisPatients->execute();
    echo "<p style='color:green'>Patient a bien été supprimé(e). </p>";
    echo "<a href=\"./list-patients.php\"> Liste des patients </a>";
    die();
  }

  if (!empty($_POST['search'])) {
    $searchLastname = $_POST['searchPatient'];
    $searchFirstName = $_POST['searchPatient'];

    $searchPatient->execute();
    $validPatient = $searchPatient->fetchAll();
  }
}


?>

<head>
  <?php require_once __DIR__ . './public/common/head.php'; ?>
  <title>Liste des patients</title>
</head>

<body>
  <?php require_once __DIR__ . './public/common/header.php'; ?>
  <a href="./add-patients.php">Ajouter un patient</a>

  <section class="listPatients">
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      <input type="search" name="searchPatient" placeholder="Rechercher...">
      <input type="submit" name="search" value="Valider">
    </form>

    <?php
    $count = 0;
    foreach ($validPatient as $patients) {
      $count+= 1;
    ?>
      <p>Résultat trouvé <?= $count; ?> : </p>
      <div class="listOfpatients">
        <p> Nom :<?= $patients['lastname']; ?></p>
        <p> Prénom :<?= $patients['firstname']; ?></p>
        <a href="./profil-patients.php?<?= $patients['id']; ?>">Infos de <?= $patients['firstname']; ?></a>
      </div>
    <?php
    }
    ?>

    <h1>Liste des patients</h1>
    <?php
    foreach ($showAllPatients as $key) {
    ?>
      <div class="listOfpatients">
        <p> Prénom : <?= $key['firstname']; ?></p>
        <p> Nom : <?= $key['lastname']; ?></p>
        <!-- // J'envoie l'id du patient pour le récupérer dans : profil-patients.php. Et pouvoir le comparer -->
        <a href="./profil-patients.php?<?= $key['id']; ?>">Infos de <?= $key['firstname']; ?></a>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
          <input type="hidden" name="delPatientId" value="<?= $key['id']; ?>">
          <input type="submit" name="submit" value="Supprimer">
        </form>
      </div>
    <?php
    }
    ?>
  </section>

  <?php require_once __DIR__ . './public/common/footer.php'; ?>

</body>