<?php

if(!isset($_SESSION)) {
    session_start();
}

$id = $_GET["id"];
$product = [];
if (($handle = fopen("../../backstore/database/products.csv", "r")) !== FALSE) {
    while (($row = fgetcsv($handle)) !== FALSE) {
        if($row[0] == $id){
            $product = $row;
        }
    }
    fclose($handle);
} else {
    $error = "Something wrong occurred. Cannot continue!";
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="../../../assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../../assets/favicon/favicon-16x16.png">

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@100;300&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../../../css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/uikit@3.6.15/dist/css/uikit.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!--        <link rel="stylesheet" type="text/css"  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../../../js/productsJQ.js"></script>



    <title>
        <?php
        echo $product[1];
        ?>
    </title>

</head>

<body class="background">

<?php include('../../header.php') ?>

<div class="container">
    <div class="row">
        <div class="col-md-5 ">
            <br>

            <img class="product-image" src="../../../assets/images/articles/<?php echo $product[5] ?>" alt="<?php echo $product[1] ?>">

        </div>

        <div class="col-md-7 marg">
            <br>

            <h4 class="pro-d-title product-title" id="title"><?php echo $product[1]?></h4>

            <div class="margin">
                <button type="button" class="btn btn-info moreInfoColor" data-toggle="collapse" data-target="#demo">More info</button>
                <div id="demo" class="collapse">
                    <?php echo $product[7] ?>
                </div>
            </div>

            <?php
            if($product[2] == $product[3]){
                echo "<p class='product-price'>
                            $<span id='productPrice'>
                                $product[2]
                            </span>
                            $product[4]
                            </p>";
            }
            else{
                echo "<p class='productPrice'><span class='oldPrice'>$product[3] $product[4]</span><span class='deal'>&nbsp&nbsp&nbsp<span id='productPrice'>$product[2]</span> $product[4]</span></p>";
            }
            ?>
            <div class="product_meta">
                <span class="posted_in"> <strong>Availability:</strong> <a class="inStock" href="#">In Stock</a></span>
            </div>
            <label>Quantity: </label>
            <label>
                <i class="fas plus-icon fa-plus align-self-center mr-2 plus" name="plus"></i>
                <input type="hidden" value="5.99" name="unitary">
                <input class="text-dark text-bold border-thicc p-2 rounded-3 number-selector" id="input" value="1" type="number" disabled>
                <i class="fas minus-icon fa-minus align-self-center ml-2 minus" name="minus"></i>
            </label>
            <button type="button" class="btn btn-outline-success add" >Add to cart</button>
            <p id="change"></p>
            <p>
        </div>
    </div>
    <p id="id" style="display:none;"><?php echo $product[0]?></p>

    <?php
        if(isset($_SESSION["logged"] ) && $_SESSION["logged"] == 1){ ?>

         <p id="logged" style="display:none;"><?php echo "true" ?></p>
    <?php
        }
        else{ ?>
        <p id="logged" style="display:none;"><?php echo "false" ?></p>
   <?php } ?>


</div>

<?php include('recommended.php') ?>

<?php include('../../footer.php') ?>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
</body>
</html>