<?php

require_once __DIR__ . '../../database.php';



// INSÉRER UN NOUVEAU PATIENT : ADD-PATIENTS.PHP
$insertNewPatient = $pdo->prepare("INSERT INTO patients (lastname, firstname, birthdate, phone, mail)
VALUES (:lastName, :firstName, :birthDate, :phone, :email)");

$insertNewPatient->bindParam('lastName', $lastName);
$insertNewPatient->bindParam('firstName', $firstName);
$insertNewPatient->bindParam('birthDate', $birthDate);
$insertNewPatient->bindParam('phone', $phone);
$insertNewPatient->bindParam('email', $email);
// J'ÉXÉCUTE DANS ADDPATIENTDB.PHP, SI TOUT LE FORMULAIRE EST BON


// VOIR LA LISTE DE TOUS LES PATIENTS  : LIST-PATIENTS.PHP
$listOfPatients = $pdo->prepare("SELECT id, lastName, firstName, birthdate, phone, mail FROM patients");
// J'ÉXÉCUTE DANS LIST-PATIENTS.PHP



// VOIR LES INFOS DE CE PATIENT SÉLECTIONNER : PROFIL-PATIENTS.PHP
$profilOfThisPatient = $pdo->prepare("SELECT id, lastName, firstName, birthdate, phone, mail FROM patients WHERE id = :id");
$profilOfThisPatient->bindParam('id', $patientId);
// J'ÉXÉCUTE DANS PROFIL-PATIENTS.PHP



// Voir les rendez-vous de ce patient sélectionner : profil-patients.php
$dateOfThisPatient = $pdo->prepare("SELECT dateHour FROM appointments WHERE idPatients = :id;");
$dateOfThisPatient->bindParam('id', $patientId);
// J'ÉXÉCUTE DANS PROFIL-PATIENTS.PHP



// AJOUTER UN RENDEZ-VOUS POUR UN PATIENT (2 Requêtes)
// JE COMMMENCE À RÉCUPÉRER L'ID DU PATIENT 
$getIdOfPatient = $pdo->prepare("SELECT id FROM patients WHERE  lastName = :lastName AND firstName = :firstName AND mail = :email");

$getIdOfPatient->bindParam('lastName', $lastName);
$getIdOfPatient->bindParam('firstName', $firstName);
$getIdOfPatient->bindParam('email', $email);

// POUR ENSUITE COMPARÉ LES INFORMATIONS SI ELLES CORRESPONDENT
$insertPatientDate = $pdo->prepare("INSERT INTO appointments (dateHour, idPatients)
SELECT CONCAT(:date, ' ', :hour), :id FROM patients WHERE id = :id AND lastName = :lastName AND firstName = :firstName AND mail = :email");

$insertPatientDate->bindParam('id', $id);
$insertPatientDate->bindParam('date', $date);
$insertPatientDate->bindParam('hour', $hour);
$insertPatientDate->bindParam('lastName', $lastName);
$insertPatientDate->bindParam('firstName', $firstName);
$insertPatientDate->bindParam('email', $email);
// J'ÉXÉCUTE LES DEUX REQÛETES DANS ADDDATEDB.PHP, SI TOUT LE FORMULAIRE EST BON




// AFFICHER TOUS LES RDV AVEC LE PATIENT CORRESPONDANT DANS : list-appointments.php
$getListAppointments = $pdo->prepare("SELECT t1.id AS id_app, t1.dateHour, t2.id, t2.firstName, t2.lastName FROM appointments t1 INNER JOIN patients t2 ON t1.idPatients = t2.id");
// J'ÉXÉCUTE DANS LIST-APPOINTMENTS.PHP

// AFFICHER TOUS LES RDV AVEC LE PATIENT CORRESPONDANT DANS : list-appointments.php
$getInfosAppointments = $pdo->prepare("SELECT t1.dateHour, t2.* FROM appointments t1 INNER JOIN patients t2 ON t1.idPatients = t2.id AND t2.id = :id");
$getInfosAppointments->bindParam('id', $getId);
// J'ÉXÉCUTE DANS LIST-APPOINTMENTS.PHP

// SUPPRIMER UN RENDEZ-VOUS DEPUIS : list-appointments.php 
$deleteAppointments = $pdo->prepare("DELETE FROM appointments WHERE id = :id");
$deleteAppointments->bindParam('id', $appointmentsId);
// J'ÉXÉCUTE DANS LIST-APPOINTMENTS.PHP






// Les stocker dans une classe plus tard, quand plus de maitrise




