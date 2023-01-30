<?php

require_once __DIR__ . './core/database/parameters/parameters.php';

$limit = 5;

if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
$start = ($page - 1) * $limit;

$patientsPerPages->execute();
$total = $patientsPerPages->fetchColumn();
$pages = ceil($total / $limit);

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

  <section id="box-listPatients">
    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      <input type="search" name="searchPatient" placeholder="Rechercher...">
      <input type="submit" name="search" value="Valider">
    </form>

    <?php
    $count = 0;
    foreach ($validPatient as $patients) {
      $count += 1;
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
    $page = 0;
    foreach ($showAllPatients as $key) {
    ?>
      <div class="listOfpatients">
        <p> Prénom : <span class="infosBDD"><?= $key['firstname']; ?></span></p>
        <p> Nom : <span class="infosBDD"><?= $key['lastname']; ?></span></p>
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
  <div id="pages">
    <?php
    for ($i = 1; $i <= $pages; $i++) {
      echo '<a href="?page=' . $i . '">' . $i . '</a> ';
    }
    ?>
  </div>
  <?php require_once __DIR__ . './public/common/footer.php'; ?>

</body>