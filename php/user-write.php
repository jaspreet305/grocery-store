<?php

//Open file
$users = fopen("database/users.csv", "a+");

//If file is not found, return error
if ($users == false) {
    echo "error opening the file!";
    exit();
}

//Get all necessary variables from post
$firstName = filter_input(INPUT_POST, 'firstName');
$lastName = filter_input(INPUT_POST, 'lastName');
$address = filter_input(INPUT_POST, 'address');
$city = filter_input(INPUT_POST, 'city');
$province = filter_input(INPUT_POST, 'province');
$zip = filter_input(INPUT_POST, 'zip');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$phone = filter_input(INPUT_POST, 'phone');



$found = FALSE;
$line = 0;
//Find the line to update by the user email
while (($row = fgetcsv($users, 1000, ",")) !== FALSE) {
    if ($row[0] === $email) {

        $string = file_get_contents('database/users.csv');
        $data = explode("\n", $string);
        $updatedValue = $email . "," . $password . "," . $firstName . "," . $lastName. "," .$address. "," .$city. "," .$zip. "," .$province. "," .$phone;
        $data[$line] = $updatedValue;
        file_put_contents('database/users.csv', implode("\n", $data));
        $found = TRUE;
        break;
    }
    $line++;
}
//If the line is not found, update the file by adding a new user
if ($found == FALSE) {
    fwrite($users, $email . "," . $password . "," . $firstName . "," . $lastName. "," .$address. "," .$city. "," .$zip. "," .$province. "," .$phone . "\n");

}

//Close the file
fclose($users);
include ('user-list.php');


