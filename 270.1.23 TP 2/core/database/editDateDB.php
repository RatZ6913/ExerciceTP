<?php

require_once __DIR__ . './parameters/parameters.php';

const EMPTY_INPUT = "Champ vide...";
const ERROR_LENGHT = "Pas assez de caractères...";
const INVALID_INPUT = "Champ invalide...";

// Je déclare les valeurs associatives en valeurs vide, pour éviter des erreurs
$errors = [
  'lastName' => '',
  'firstName' => '',
  'email' => '',
  'date' => '',
  'hour' => ''
];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $input = filter_input_array(INPUT_POST, [
    'lastName' => FILTER_SANITIZE_SPECIAL_CHARS,
    'firstName' => FILTER_SANITIZE_SPECIAL_CHARS,
    'email' => FILTER_SANITIZE_EMAIL,
    'date' => FILTER_SANITIZE_NUMBER_INT,
    'hour' => FILTER_SANITIZE_SPECIAL_CHARS
  ]);

  $lastName = $input['lastName'] ?? '';
  $firstName = $input['firstName'] ?? '';
  $email = $input['email'] ?? '';
  $date = $input['date'] ??  '';
  $hour = $input['hour'] ?? '';

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

  if (empty($email)) {
    $errors['email'] = EMPTY_INPUT;
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = INVALID_INPUT;
  }

  if (empty($date)) {
    $errors['date'] = EMPTY_INPUT;
  }

  if (empty($hour)) {
    $errors['hour'] = EMPTY_INPUT;
  }

  if (empty(array_filter($errors, function ($e) {
    return $e !== '';
  }))) {
    
  }
}

