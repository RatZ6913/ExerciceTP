<?php

require_once __DIR__ . './parameters/parameters.php';

const EMPTY_INPUT = "Champ vide...";
const ERROR_LENGHT = "Pas assez de caractères...";
const INVALID_INPUT = "Champ invalide...";

// Je déclare les valeurs associatives en valeurs vide, pour éviter des erreurs
$errors = [
  'lastName' => '',
  'firstName' => '',
  'birthDate' => '',
  'phone' => '',
  'email' => ''
];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $input = filter_input_array(INPUT_POST, [
    'lastName' => FILTER_SANITIZE_SPECIAL_CHARS,
    'firstName' => FILTER_SANITIZE_SPECIAL_CHARS,
    'birthDate' => FILTER_SANITIZE_NUMBER_INT,
    'phone' => FILTER_SANITIZE_NUMBER_INT,
    'email' => FILTER_SANITIZE_EMAIL
  ]);

  // Si NULL alors je les remplaces par des valeurs vides
  $lastName = $input['lastName'] ?? '';
  $firstName = $input['firstName'] ?? '';
  $birthDate = $input['birthDate'] ??  '';
  $phone = $input['phone'] ?? '';
  $email = $input['email'] ?? '';

  if (empty($lastName)) {
    $errors['lastName'] = EMPTY_INPUT;
  } else if (strlen($lastName) <= 2) {
    $errors['lastName'] = ERROR_LENGHT;
  }

  if (empty($firstName)) {
    $errors['firstName'] = EMPTY_INPUT;
  } else if (strlen($firstName) <= 2) {
    $errors['firstName'] = ERROR_LENGHT;
  }

  if (empty($birthDate)) {
    $errors['birthDate'] = EMPTY_INPUT;
  }

  if (empty($phone)) {
    $errors['phone'] = EMPTY_INPUT;
  } else if (!filter_var($phone, FILTER_VALIDATE_INT)) {
    $errors['phone'] = INVALID_INPUT;
  }

  if (empty($email)) {
    $errors['email'] = EMPTY_INPUT;
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = INVALID_INPUT;
  }

  if (empty(array_filter($errors, function ($e) {
    // Si différent de '', affiche les erreurs. Si tout est vide, alors le form est validé
    return $e !== '';
  }))) {

    if ($insertNewPatient->execute() == true) {
      $insertNewPatient->execute();
      $lastName = $firstName = $phone = $email = '';

      return $patientAdded = "Ce patient a bien été ajouté";
      header('location: ./add-patients.php');
    } else {
      echo "<a href='./list-patients.php'> Liste des patients </a>";
      die();
    }
  }
}
