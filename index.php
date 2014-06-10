<?php
include_once('phpEmailValidator.php');

$email = $_GET['q'];
$phpEmailValidator = new phpEmailValidator\phpEmailValidator;
$valid = $phpEmailValidator->validate($email);

$result = array(
    'address' => $email,
    'is_valid' => $valid,
    'reason' => $phpEmailValidator->getError()
);

header('Content-Type: application/json');
echo json_encode($result);
