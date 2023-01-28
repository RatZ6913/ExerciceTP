<?php

require_once __DIR__ . '../../database.php';



// Insérer un nouveau patient : add-patients.php
$insertNewPatient = $pdo->prepare("INSERT INTO patients (lastname, firstname, birthdate, phone, mail)
VALUES (:lastName, :firstName, :birthDate, :phone, :email)");

$insertNewPatient->bindParam('lastName', $lastName);
$insertNewPatient->bindParam('firstName', $firstName);
$insertNewPatient->bindParam('birthDate', $birthDate);
$insertNewPatient->bindParam('phone', $phone);
$insertNewPatient->bindParam('email', $email);
// J'éxécute dans addPatientDB.php, si tout le formulaire est bon


// Voir la liste de tous les patients  : list-patients.php
$listOfPatients = $pdo->prepare("SELECT id, lastName, firstName, birthdate, phone, mail FROM patients");
// J'éxécute dans list-patients.php



// Voir les infos de ce patient sélectionner : profil-patients.php
$profilOfThisPatient = $pdo->prepare("SELECT id, lastName, firstName, birthdate, phone, mail FROM patients WHERE id = :id");
$profilOfThisPatient->bindParam('id', $patientId);
// J'éxécute dans profil-patients.php



// Ajouter un Rendez-vous pour un patient
// Je commmence à récupérer l'id du Patient 
$getIdOfPatient = $pdo->prepare("SELECT id FROM patients WHERE  lastName = :lastName AND firstName = :firstName AND mail = :email");

$getIdOfPatient->bindParam('lastName', $lastName);
$getIdOfPatient->bindParam('firstName', $firstName);
$getIdOfPatient->bindParam('email', $email);

// Pour ensuite comparé les informations si elles correspondent
$insertPatientDate = $pdo->prepare("INSERT INTO appointments (dateHour, idPatients)
SELECT CONCAT(:date, ' ', :hour), :id FROM patients WHERE id = :id AND lastName = :lastName AND firstName = :firstName AND mail = :email");

$insertPatientDate->bindParam('id', $id);
$insertPatientDate->bindParam('date', $date);
$insertPatientDate->bindParam('hour', $hour);
$insertPatientDate->bindParam('lastName', $lastName);
$insertPatientDate->bindParam('firstName', $firstName);
$insertPatientDate->bindParam('email', $email);
// J'éxécute les deux reqûetes dans addDateDB.php, si tout le formulaire est bon





// Les stocker dans une classe plus tard, quand plus de maitrise




