<?php
//Start session if not started
if(!isset($_SESSION)) {
    session_start();
}

//Check if action and id were set in the request
if (isset($_POST['action']) && isset($_POST['id'])) {
    //Initialise variables
    $action = $_POST['action'];
    $id = $_POST['id'];
    $value = $_POST['value'] ?? 1;
    $cart = $_SESSION['cart'] ?? [];
    //Switch to the action needed on the cart: remove element, add element, edit element, lower count of an element
    switch ($action){
        case 'remove':
            unset($cart[$id]);
            break;
        case 'add':
            $cart[$id] = (isset($cart[$id])) ? $cart[$id]+1 : 1;
            break;
        case 'set':
            $cart[$id] = $value ;
            break;
        case 'minus':
            $cart[$id] = (isset($cart[$id])) ? $cart[$id]-1 : 1;
            if($cart[$id]< 1){
                unset($cart[$id]);
            }
            break;
    }
    $_SESSION['cart'] = $cart;
    //echo the cart back
    print_r($cart);
}

echo "error";