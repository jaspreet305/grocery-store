<?php
//Start session if not started
if(!isset($_SESSION)) {
    session_start();
}

//If user is not logged in, redirect to login page
if (!isset($_SESSION['logged'])){
    header("Location: ../register/signin.php");
}

//Initialise variables
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$cart_len = count($cart);
$elements = [];
if (($handle = fopen("../backstore/database/products.csv", "r")) !== FALSE) {
    //Add all product ids in the cart to the elements variable
    $found = FALSE;
    while (($row = fgetcsv($handle)) !== FALSE) {
        foreach ($cart as $id=>$count) {
            if($row[0] == $id){
                $row["count"] = $count;
                array_push($elements, $row);
            }
        }

    }
    fclose($handle);

} else {
    $error = "Something wrong occurred. Cannot continue!";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content='maximum-scale=1.0, initial-scale=1.0, width=device-width' name='viewport'>
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css"  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />

    <link rel="stylesheet" type="text/css"  href="https://cdn.jsdelivr.net/npm/uikit@3.6.15/dist/css/uikit.min.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@100;300&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/54a1f2ad80.js" crossorigin="anonymous"></script>
    <title>Checkout</title>



</head>
    <body id="index" class="main-body cart-body">
   <?php include ('../header.php')?>

    <i class="fa fa-accessible-icon"></i>
        <div class="m-5">
            <div class="uk-card white-80 uk-card-default uk-card-body rounded-5 varela">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="row ml-0 mb-3 continue-shopping">
                            <a href="../index.php"><i class="fas fa-arrow-left align-self-center text-secondary mr-3"></i></a>
                            <h6 class="uk-card-title m-0 text-5 text-secondary varela"> <a class="uk-card-title m-0 text-5 text-secondary varela" href="../aisles/allProducts.php">Continue Shopping</a></h6>
                        </div>
                        <div class="line-break"></div>
                        <h3 class="uk-card-title varela mb-0 font-weight-bold">Shopping Cart</h3>
                        <p class="mt-1">You have <span id="number-of-items"><?php echo $cart_len ?> <?php echo $cart_len===1 ? "item" : "items" ?></span> in your cart</p>

                        <div>
                            <div class="row ml-0 mr-0">
                                <!-- ITEM -->
                                <?php foreach($elements as $value): ?>

                                <div class="uk-card full-width uk-card-default uk-card-body rounded-5 varela p-4 mb-4">
                                    <div class="row ml-0 mr-0">
                                        <img class="cart-img" src="../../assets/images/articles/<?php echo $value[5];?>" alt="<?php echo $value[1];?>"/>
                                        <div class="col-md-4 align-self-center">
                                            <span class="text-dark text-bold"><?php echo $value[1];?></span>
                                            <span class="row ml-0 mr-0 text-secondary"><?php echo $value[7];?></span>
                                        </div>
                                        <div class=" align-self-center align-right">
                                            <div class="d-inline-block mr-5">
                                                <i class="fas plus-icon fa-plus align-self-center mr-2" name="plus" onclick="changeCount(this)"></i>
                                                <input type="hidden" value="<?php echo $value[2];?>" name="unitary">

                                                <input class="text-dark text-bold border-thicc p-2 rounded-3 number-selector" value="<?php echo $value["count"];?>" type="number" disabled>
                                                <i class="fas minus-icon fa-minus align-self-center ml-2" name="minus" onclick="changeCount(this)"></i>
                                            </div>
                                            <input type="hidden" value="<?php echo $value[0];?>" name="id">
                                            <span class="text-dark text-bold mr-5 text-5 element-price" name="price">$<?php echo $value[2]*$value["count"];?></span>
                                            <i class="far fa-trash-alt align-self-center icon-trash" onclick="removeElement(this)"></i>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class='credit-info'>
                            <div class='credit-info-content'>
                                <table class='half-input-table mb-4'>
                                    <tr><td>Select a Payment Method: </td><td><div class='dropdown width-75 align-right' id='card-dropdown'><div class='dropdown-btn' id='current-card'>Visa</div>
                                        <div class='dropdown-select'>
                                            <ul class="card-ul">
                                                <li>Master Card</li>
                                                <li>American Express</li>
                                            </ul></div>
                                    </div>
                                    </td></tr>
                                </table>
                                <img src='https://dl.dropboxusercontent.com/s/ubamyu6mzov5c80/visa_logo%20%281%29.png' height='80' class='credit-card-image' id='credit-card-image'></img>

                                <label for="card-number">Card Number</label>
                                <input id="card-number"  type="number" onkeypress="return (event.charCode !==8 && event.charCode ===0 || (event.charCode >= 48 && event.charCode <= 57))" class='input-field'/>


                                <label for="card-holder">Card Holder</label>
                                <input id="card-holder" class='input-field'/>
                                <table class='half-input-table '>
                                    <tr>
                                        <td>
                                            <label for="expires">Expires</label>
                                            <input id="expires" type="text" class='input-field' placeholder="MM/YY"/>
                                        </td>
                                        <td>
                                            <label for="cvc">CVC</label>
                                            <input id="cvc" type="number" onkeypress="return (event.charCode !==8 && event.charCode ===0 || (event.charCode >= 48 && event.charCode <= 57))" class='input-field'/>
                                        </td>
                                    </tr>
                                </table>
                                <div class="line-break mt-3"></div>
                                <div class="mb-100">
                                    <div class="row mt-3 ml-3 mr-3">
                                        <div class="col-md-6 text-5">
                                            Subtotal :
                                        </div>
                                        <div id="subtotal" class="col-md-6 text-5 text-align-right">
                                            $17.97
                                        </div>
                                    </div>
                                    <div class="row mt-2 ml-3 mr-3">
                                        <div class="col-md-6 text-5">
                                            Taxes :
                                        </div>
                                        <div id="taxes" class="col-md-6 text-5 text-align-right">
                                            $2.70
                                        </div>
                                    </div>
                                    <div class="row mt-2 ml-3 mr-3">
                                        <div class="col-md-6 text-5">
                                            Total :
                                        </div>
                                        <div id="total" class="col-md-6 text-5 text-align-right">
                                            $20.67
                                        </div>
                                    </div>
                                </div>
                                <button class='pay-btn' onclick="checkCheckout()">Checkout</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php include ('../footer.php')?>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
    <script src="../../js/cart.js"></script>
    </body>
</html>