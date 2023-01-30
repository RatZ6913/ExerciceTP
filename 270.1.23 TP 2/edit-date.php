<?php

require_once __DIR__ . './core/database/parameters/parameters.php';

$idPatientApp = $_POST['id'] ?? '';
// 1 ère requêtes, pour récuperer infos de l'ID actuel. Pour les mettre dans les value. Évite de tout ré-écrire, pour l'user

$getInfosOfAppointment->execute();
$infoOfThisAppointment = $getInfosOfAppointment->fetch();
$idAppUpdate = $infoOfThisAppointment['id'] ?? '';

$lastName = $infoOfThisAppointment['lastname'] ?? '';
$firstName = $infoOfThisAppointment['firstname'] ?? '';
$email = $infoOfThisAppointment['mail'] ?? '';
$date = $infoOfThisAppointment['date'] ?? '';
$hour = $infoOfThisAppointment['hour'] ?? '';

if (isset($_POST['editDate'])) {
  $dateUpdate = $_POST['date'];
  $hourUpdate = $_POST['hour'];
  $idAppUpdate = $_POST['idAppUpdate'];

  $applyUpdateAppointment->execute();

  if ($applyUpdateAppointment->execute() == true) {
    echo "<p style='color:green'>Rendez-vous a bien été modifié !</p>";
    echo "<a href='./list-appointments.php'> Liste des rendez-vous </a>";
    die();
  }
}

?>

<head>
  <?php require_once __DIR__ . './public/common/head.php'; ?>
  <title>Modifer un rendez-vous</title>
</head>

<body>
  <?php require_once __DIR__ . './public/common/header.php'; ?>

  <section id="box-editDate">
    <h1>Modifer un rendez-vous</h1>

    <div class="content">
      <p>Nom : <span class="infosBdd"><?= $lastName; ?></span></p>
      <p>Prénom : <span class="infosBdd"><?= $firstName; ?></span></p>
      <p>Email : <span class="infosBdd"><?= $email; ?></span></p>
    </div>

    <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
      <div class="content editDate">
        <label for="date">Date : </label>
        <input type="date" name="date" id="date" value="<?= $date ?? ''; ?>">
        <p class=" errorsMsg"><?= $errors['date'] ?? ''; ?></p>
      </div>
      <div class="content editDate">
        <label for="hour">Heure : </label>
        <input type="time" name="hour" id="hour" value="<?= $hour ?? ''; ?>">
        <p class="errorsMsg"><?= $errors['hour'] ?? ''; ?></p>
      </div>
      <div class="content">
        <input type="hidden" name="idAppUpdate" value="<?= $idAppUpdate; ?>">
        <input type="submit" value="Valider" name="editDate">
      </div>
    </form>
  </section>

  <?php require_once __DIR__ . './public/common/footer.php'; ?>

</body>