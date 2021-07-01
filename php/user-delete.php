<?php

//GET name variable from url
$userEmail = $_GET['email'];

//Open users database file
$users = fopen("database/users.csv", "a+");

if ($users == false) {
    echo "error opening the file!";
    exit();
}

$found = FALSE;
$line = 0;
$string = file_get_contents("database/users.csv");
$data = explode("\n", $string);
//Find the user and remove it from the data variable
while (($row = fgetcsv($users, 1000, ",")) !== FALSE) {
    if ($row[0] === $userEmail) {
        unset($data[$line]);
        break;
    }
    $line++;
}

//Add the new data back to the file
file_put_contents('database/users.csv', implode("\n", $data));
fclose($users);


include ('user-list.php');