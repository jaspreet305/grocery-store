<?php
//Start Session if not started
if(!isset($_SESSION)) {
    session_start();
}
//Initialize necessary variables
$cart = $_SESSION['cart'] ?? [];
$name = $_SESSION['full_name'] ?? 'tester';
$total = $_POST['total'] ?? 0;
$id = generateId();

//Open the file and save the new order at the end
$file = fopen("../backstore/database/orders.csv", 'a+');
$output = implode(',', array_map(
    function ($v, $k) { return sprintf("%s:%s", $k, $v); },
    $cart,
    array_keys($cart)
));
fwrite($file, $name . "," . $id ."," .round($total, 2)."$,Placed,\"[". $output. "]\"\n");
fclose($file);

//Unset the Cart variable to reset the cart and return the ID to ajax
unset($_SESSION['cart']);
echo $id;


//Function that generate a random ID based on the Pattern of ORDER_ID
function generateId()
{
    $temp_id = mt_rand(10000, 99999);;
    for($i = 0; $i<2; $i++){
        $temp_id .= chr(rand(65,90));
    }
    return $temp_id;
}