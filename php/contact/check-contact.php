<?php

if (!isset($_SESSION)) {
    session_start();
}

    $orderList = fopen('../backstore/database/orders.csv', 'r');
    $productsList = fopen('../backstore/database/products.csv', 'r');


    $_SESSION['isFound'] = false;
    $_SESSION['orderFound'] = false;

    // takes from form
    $user = filter_input(INPUT_POST, 'user');
    $orderNumber = filter_input(INPUT_POST, 'orderNum');
    $item = filter_input(INPUT_POST, 'item');
    $message = filter_input(INPUT_POST, 'message');

    $_SESSION['inquiryName'] = $user;
    $items = array();
    $itemsDict = array();

    // item dictionary to determine what items a user ordered
    while (($rowProducts = fgetcsv($productsList, 1000, ",")) !== FALSE){
        $itemNumber = $rowProducts[0];
        $itemName = $rowProducts[1];
        $itemsDict[$itemNumber] = $itemName;
    }



    while (($rowOrders = fgetcsv($orderList, 1000, ",")) !== FALSE) {
           $rowOrders++;
        $items = array();

        // grabs products and puts them in array
        $toTrim = $rowOrders[4];
        $productString = substr($toTrim, 1, -1);
        $allProductsArray = explode(",", $productString);

        // writes it out on contanct
        foreach ($allProductsArray as $product) {
            $itemAndQuantity = explode(":", $product);
            $food = $itemAndQuantity[0];
            $quantity = $itemAndQuantity[1];

            if(array_key_exists($food, $itemsDict)){
                array_push($items, $quantity . " x " . $itemsDict[$food]);
            }
        }


        // writes down contact message in another file
        if($rowOrders[0] == $user && $rowOrders[1] == $orderNumber) {
            $_SESSION['isFound'] = true;
            $_SESSION['orderFound'] = true;
            $contact = fopen('../backstore/database/contact.csv', 'a+');
            $string = $user . "," . $orderNumber . "," . $item . "," . $message . "\n";
            fwrite($contact, $string);
            fclose($contact);
            break;

        } else if ($rowOrders[0] == $user) {
            $_SESSION['isFound'] = true;
            break;

        } else if ($rowOrders[1] == $orderNumber) {
            $_SESSION['orderFound'] = true;
            break;

        }

    }

    $_SESSION['orders'] = $items;



   include('contact-result.php');




session_unset();


fclose($orderList);
