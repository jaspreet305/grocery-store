<?php
if (!isset($_SESSION)) {
    session_start();
}
$orders = fopen("database/orders.csv", "a+"); // opens file

if ($orders == false) {
    echo "error opening the file!";
    exit();
}

// grabs each value from form
$buyerName = filter_input(INPUT_POST, 'name');
$orderNum = filter_input(INPUT_POST, 'orderNum');
$total = filter_input(INPUT_POST, 'total');
$status = filter_input(INPUT_POST, 'status');
$cart = filter_input(INPUT_POST, 'cart');


$found = FALSE; // if a match is found, this becomes true and instead of adding a new item, it edits.
$line = 0;
while (($row = fgetcsv($orders, 1000, ",")) !== FALSE) {
    if ($row[1] === $orderNum) { // if the order number already exists it goes in this loop.

        $string = file_get_contents('database/orders.csv'); // gets from file
        $data = explode("\n", $string);
        $updatedValue = $buyerName . "," . $orderNum . "," . $total . "," . $status . "," . "\"" . $cart . "\""; //overwrite previous
        $data[$line] = $updatedValue; //overwrite previous
        file_put_contents('database/orders.csv', implode("\n", $data));
        $found = TRUE;
        include('sendEmail.php'); // sends email after editing
        break;
    }
    $line++;
}
if ($found == FALSE) {
    fwrite($orders, $buyerName . "," . $orderNum . "," . $total . "," . $status . "," . "\"" . $cart . "\"" . "\n");

}
fclose($orders);
include('order-list.php');











