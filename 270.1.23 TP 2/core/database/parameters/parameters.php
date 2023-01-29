<?php

require_once __DIR__ . '../../database.php';


// _____________________ PARTIE : add-patients.php  __________________________ //
// insérer un nouveau patient : add-patients.php
$insertNewPatient = $pdo->prepare("INSERT INTO patients (lastname, firstname, birthdate, phone, mail)
VALUES (:lastName, :firstName, :birthDate, :phone, :email)");

$insertNewPatient->bindParam('lastName', $lastName);
$insertNewPatient->bindParam('firstName', $firstName);
$insertNewPatient->bindParam('birthDate', $birthDate);
$insertNewPatient->bindParam('phone', $phone);
$insertNewPatient->bindParam('email', $email);
// j'éxécute dans addpatientdb.php, si tout le formulaire est bon



// _____________________ PARTIE : list-patients.php  __________________________ //
// voir la liste de tous les patients  : list-patients.php
$listOfPatients = $pdo->prepare("SELECT * FROM patients");
// j'éxécute dans list-patients.php

// Rechercher un patient : list-pastient.php
$searchPatient = $pdo->prepare("SELECT idlastname, firstname FROM patients WHERE lastname = :lastName OR firstname = :firstName");
$searchPatient->bindParam('lastName', $searchLastname);
$searchPatient->bindParam('firstName', $searchFirstName);
// J'éxécute dans list-patients.php

// supprimer un patient : list-patients.php
$deleteThisPatients = $pdo->prepare("DELETE FROM patients WHERE id = :delPatientId");
$deleteThisPatients->bindParam('delPatientId', $delPatientId);
// j'éxécute dans list-patients.php



// _____________________ PARTIE : profil-patients.php  __________________________ //
// voir les infos de ce patient sélectionner : profil-patients.php
$profilOfThisPatient = $pdo->prepare("SELECT id, lastName, firstName, birthdate, phone, mail FROM patients WHERE id = :id");
$profilOfThisPatient->bindParam('id', $patientId);
// j'éxécute dans profil-patients.php

// Voir les rendez-vous de ce patient sélectionner : profil-patients.php
$dateOfThisPatient = $pdo->prepare("SELECT dateHour FROM appointments WHERE idPatients = :id;");
$dateOfThisPatient->bindParam('id', $patientId);
// j'éxécute dans profil-patients.php



// _____________________ PARTIE : addDateDB.php  __________________________ //
// AJOUTER UN RENDEZ-VOUS POUR UN PATIENT (2 Requêtes) : addDateDB.php
// je commmence à récupérer l'id du patient : addDateDB.php
$getIdOfPatient = $pdo->prepare("SELECT id FROM patients WHERE  lastname = :lastName AND firstname = :firstName AND mail = :email");

$getIdOfPatient->bindParam('lastName', $lastName);
$getIdOfPatient->bindParam('firstName', $firstName);
$getIdOfPatient->bindParam('email', $email);

// pour ensuite comparé les informations si elles correspondent
$insertPatientDate = $pdo->prepare("INSERT INTO appointments (dateHour, idPatients)
SELECT CONCAT(:date, ' ', :hour), id FROM patients WHERE id = :id AND lastName = :lastName AND firstName = :firstName AND mail = :email");

$insertPatientDate->bindParam('id', $id);
$insertPatientDate->bindParam('date', $date);
$insertPatientDate->bindParam('hour', $hour);
$insertPatientDate->bindParam('lastName', $lastName);
$insertPatientDate->bindParam('firstName', $firstName);
$insertPatientDate->bindParam('email', $email);
// j'éxécute les deux reqûetes dans adddatedb.php, si tout le formulaire est bon



// _____________________ PARTIE : list-appointments.php  __________________________ //
// afficher tous les rdv avec le patient correspondant dans : list-appointments.php
$getListAppointments = $pdo->prepare("SELECT t1.id AS id_app, t1.dateHour, t2.id, t2.firstName, t2.lastName FROM appointments t1 INNER JOIN patients t2 ON t1.idPatients = t2.id");
// J'ÉXÉCUTE DANS LIST-APPOINTMENTS.PHP

// afficher tous les rdv avec le patient correspondant dans : list-appointments.php
$getInfosAppointments = $pdo->prepare("SELECT t1.dateHour, t2.* FROM appointments t1 INNER JOIN patients t2 ON t1.idPatients = t2.id AND t2.id = :id");
$getInfosAppointments->bindParam('id', $getId);
// j'éxécute dans list-appointments.php

// SUPPRIMER UN RENDEZ-VOUS DEPUIS : list-appointments.php 
$deleteAppointments = $pdo->prepare("DELETE FROM appointments WHERE id = :id");
$deleteAppointments->bindParam('id', $appointmentsId);
// j'éxécute dans list-appointments.php











// Les stocker dans une classe plus tard, quand plus de maitrise