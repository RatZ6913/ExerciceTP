<?php

require_once __DIR__ . './core/database/parameters/parameters.php';

// Je récupère l'id correspondant'
if (!empty($_SERVER["QUERY_STRING"])) {
  $getId = $_SERVER["QUERY_STRING"];
}

$getInfosAppointments->execute();
$showInfosAppointments = $getInfosAppointments->fetch();


if (empty($showInfosAppointments)) {
  // Message pour informer l'user que aucun patient a été sélectionner
  echo "<p style=color:red> Veuillez sélectionner un patient !</p>";
  echo '<a href="./list-appointments.php">Liste des rendez-vous</a>';
  // Et si le patient n'existe pas je coupe le script
  die();
}

?>

<head>
  <?php require_once __DIR__ . './public/common/head.php'; ?>
  <title>Informations du rendez-vous</title>
</head>

<body>
  <?php require_once __DIR__ . './public/common/header.php'; ?>
  <a href="./add-date.php">Ajouter un rendez-vous</a>
  <section class="listPatients">
    <h1>Informations du rendez-vous</h1>
    <div class="listOfpatients">
      <p>Nom : <?= $showInfosAppointments['firstname']; ?> </p>
      <p>Prénom : <?= $showInfosAppointments['lastname']; ?></p>
      <p>Date/Heure du rendez-vous : <?= $showInfosAppointments['dateHour']; ?></p>
      <p>Date de naissance : <?= $showInfosAppointments['birthdate']; ?></p>
      <p>Téléphone : <?= $showInfosAppointments['phone']; ?></p>
      <p>Email : <?= $showInfosAppointments['mail']; ?></p>

      <form action="./edit-date.php" method="POST">
        <input type="submit" value="Modifier">
      </form>
    </div>
  </section>


  <?php require_once __DIR__ . './public/common/footer.php'; ?>

</body>