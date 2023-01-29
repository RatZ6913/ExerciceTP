<?php

require_once __DIR__ . './core/database/parameters/parameters.php';

$listOfPatients->execute();
$showAllPatients = $listOfPatients->fetchAll();


if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $delPatientId = $_POST['delPatientId'] ?? '';
  if (!empty($delPatientId)) {
    $deleteThisPatients->execute();
    echo "<p style='color:green'>Patient a bien été supprimé(e). </p>";
    echo "<a href=\"./list-patients.php\"> Liste des patients </a>";
    die();
  }

  if (!empty($_POST)) {
    foreach ($showAllPatients as $key) {
      $searchLastname = $key['firstname'];
      $searchFirstName = $key['lastname'];

      if ($searchLastname == $_POST['search'] || $searchFirstName == $_POST['search']) {
        echo $searchFirstName, $searchLastname;
      }
    }
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
      <input type="search" name="search" placeholder="Rechercher..." value="">
      <input type="submit" name="search" value="Valider">
    </form>

    <h1>Liste des patients</h1>
    <?php
    foreach ($showAllPatients as $key) {
    ?>
      <div class="listOfpatients">
        <p> Nom : <?= $key['firstname']; ?></p>
        <p> Prénom : <?= $key['lastname']; ?></p>
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