<?php

if(!isset($_SESSION)) {
    session_start();
}

$products = [];
if (($handle = fopen("../backstore/database/products.csv", "r")) !== FALSE) {
    while (($row = fgetcsv($handle)) !== FALSE) {
        if($row[2]!==$row[3]){
            array_push($products, $row);
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
    <meta content='maximum-scale=1.0, initial-scale=1.0, width=device-width' name='viewport'>
    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/favicon/favicon-16x16.png">

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="icon" type="image/png" href="/assets/images/Favicon/favicon-16x16.png"/>

    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@100;300&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/uikit@3.6.15/dist/css/uikit.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!--    <link rel="stylesheet" type="text/css"  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../js/aisles.js"></script>

    <meta charset="UTF-8">
    <title>Dairy and Eggs</title>
</head>
<body>
<div class="background">
    <nav class="navbar navbar-light bg-light homepage-header ">
        <a class="navbar-brand" href="../index.php">
            <img src="../../assets/images/logo.png" style="height: 85px;">
        </a>

        <nav>
            <a class="navbar-brand text" href="../register/signin.php">
                <i class="fas fa-user"></i> <span class="icon-label">Sign In </span> </a>
            <a class="navbar-brand text" href="../cart/cart.php">
                <i class="fas fa-shopping-cart"></i> <span class="icon-label">Cart </span> </a>
        </nav>
    </nav>

    <nav class="navbar sticky-top navbar-custom navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
                <div class="navbar-nav ">

                    <a class="nav-link " href="../index.php">Home</a>
                    <a class="nav-link " href="weeklyDeals.php">Hot Deals</a>
                    <a class="nav-link " href="allProducts.php">All Products</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Aisles </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="fruitsVeg.php">Fruits and Vegetables</a>
                            <a class="dropdown-item" href="dairyAndEggs.php">Dairy & Eggs</a>
                            <a class="dropdown-item" href="meatPoultry.php">Meat and Poultry</a>
                            <a class="dropdown-item" href="snacks.php">Snacks</a>
                            <a class="dropdown-item" href="breadAndBakery.php">Bread and Bakery</a>
                            <a class="dropdown-item" href="beverages.php">Beverages</a>
                        </div>
                    </li>

                </div>
            </div>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid weeklyDealsBg">
        <div class="container whiteBorder">
            <h1 class="display-4 centerWhite">Weekly Deals</h1>
        </div>
    </div>

    <div class="all">
        <div class="filter text">
            <p>
                <b><span class="font-word">Filter</span></b>
            </p>
            <p class="filterCategory">
                <a class="filter-option" href="allProducts.php">Show all</a>
            </p>
            <p class="filterCategory">
                <a class="filter-option current" href="weeklyDeals.php">Hot deal</a>
            </p>
            <p class="filterCategory">
                <a class="filter-option" href="fruitsVeg.php">Fruits and Vegetables</a>
            </p>
            <p class="filterCategory">
                <a class="filter-option" href="dairyAndEggs.php">Dairy and Eggs</a>
            </p>
            <p class="filterCategory">
                <a class="filter-option" href="meatPoultry.php">Meat and Poultry</a>
            </p>
            <p class="filterCategory">
                <a class="filter-option" href="breadAndBakery.php">Bread and Bakery</a>
            </p>
            <p class="filterCategory">
                <a class="filter-option" href="beverages.php">Beverages</a>
            </p>
            <p class="filterCategory">
                <a class="filter-option" href="snacks.php">Snacks</a>
            </p>
        </div>

        <div class="container mt-5 mb-5">
            <div class="row">

                <?php
                foreach($products as $product):
                    ?>

                    <div class="col col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                        <div class="product card-aisle rounded uk-card-default card product">
                            <a class="productLink" href="Products/product.php?id=<?php echo $product[0] ?>">
                                <img class="productImage" alt="<?php echo $product[1] ?>" src="../../assets/images/articles/<?php echo $product[5] ?>">
                            </a>
                            <div class="card-body productDetails">
                                <p class="productName"><?php echo $product[1] ?></p>
                                <?php
                                if($product[2]==$product[3]){
                                    echo "<p class='productPrice'> \$$product[2] </p>";
                                }
                                else{
                                    echo "<p class='productPrice'><span class='oldPrice'>\$$product[3] $product[4]</span><span class='deal'> \$$product[2] $product[4]</span></p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>

<?php include("../footer.php"); ?></body>
</html>