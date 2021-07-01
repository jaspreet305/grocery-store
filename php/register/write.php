<?php

// Get the value posted secured with filter
$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$address = filter_input(INPUT_POST, 'address');
$city = filter_input(INPUT_POST, 'city');
$zip = filter_input(INPUT_POST, 'zip');
$province = filter_input(INPUT_POST, 'province');
$phone = filter_input(INPUT_POST, 'phone');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

// open the user file
$file = fopen("../backstore/database/users.csv", "a+");

// check if the email is in the database
$found = FALSE;
while (($row = fgetcsv($file, 1000, ",")) !== FALSE) {
    if ($row[0] === $email) {
        $found = TRUE;
        break;
    }
}

// if not can create a new user
if ($found == FALSE) {
    fwrite($file,$email . "," . $password . "," . $firstName . "," . $lastName. "," . $address. "," . $city. "," . $zip. "," . $province. "," . $phone . "\n");
    fclose($file);
    include('success.php');
}

// if the email exists, don't create
else {
    fclose($file);
    include ('signup.php');
}

