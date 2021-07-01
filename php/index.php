<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content='maximum-scale=1.0, initial-scale=1.0, width=device-width' name='viewport'>
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@100;300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/45836f3eb4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/uikit@3.6.15/dist/css/uikit.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Tropical Flavors</title>
</head>


<body>


<?php
        include('header.php')
        ?>

<div class="jumbotron jumbotron-homepage jumbotron-fluid">
    <div class="container">
        <h1 class="display-4 text"
            style="margin-left: 100px; margin-right:100px; color: white"><?php echo isset($_SESSION['welcome']) ? ($_SESSION['welcome']) : 'Welcome to Tropical Flavors' ?></h1>
        <p class="lead" style="color: white">Acquired tastes from around the world!</p>
    </div>
</div>

<h1 class="title" style="padding-top: 4%">Shop by Category</h1>


<div class="container">
    <div class="row row-cols-xs-2 row-cols-md-3 row-col-lg-2">
        <a href="aisles/fruitsVeg.php">
            <div class="col">
                <div class="uk-card-hover uk-card-default uk-card-body card" style="width: 18rem;">
                    <img src="../assets/images/fruits-veggies.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-text">Fruits & Vegetables</h5>
                    </div>
                </div>
            </div>
        </a>
        <a href="aisles/dairyAndEggs.php">
            <div class="col">
                <div class="uk-card-hover  uk-card-default uk-card-body card" style="width: 18rem;">
                    <img src="../assets/images/dairy.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-text">Dairy & Eggs</h5>
                    </div>
                </div>
            </div>
        </a>
        <a href="aisles/meatPoultry.php">
            <div class="col">
                <div class="uk-card-hover  uk-card-default uk-card-body card" style="width: 18rem;">
                    <img src="../assets/images/meat.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-text">Meat & Poultry</h5>
                    </div>
                </div>
            </div>
        </a>
        <a href="aisles/snacks.php">
            <div class="col">
                <div class="uk-card-hover  uk-card-default uk-card-body card" style="width: 18rem;">
                    <img src="../assets/images/snacks.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-text">Snacks</h5>
                    </div>
                </div>
            </div>
        </a>
        <a href="aisles/breadAndBakery.php">
            <div class="col">
                <div class="uk-card-hover  uk-card-default uk-card-body card" style="width: 18rem;">
                    <img src="../assets/images/bakery.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-text">Bread & Bakery</h5>
                    </div>
                </div>
            </div>
        </a>
        <a href="aisles/beverages.php">
            <div class="col">
                <div class="uk-card-hover uk-card-default uk-card-body card" style="width: 18rem;">
                    <img src="../assets/images/beverages.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-text">Beverages</h5>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<hr class="divider">


<div class="faq">
    <h1 class="title">FAQ</h1>

    <h3 class="text">Do you do catering?</h3>
    <h5 class="text">Yes! Just give us a call and we'll have your order ready in no time!</h5>

    <h3 class="text">How long will it take for my order to arrive?</h3>
    <h5 class="text">Due to limited supply and high demand, orders have been delayed. However, we are trying our best to
        get your order to you on time!</h5>

    <h3 class="text">Do I need an account to place an order?</h3>
    <h5 class="text link">Yes, an account is required to order from Tropical Flavours. If you haven't created one, click
        <a class="link" target="_blank" href="register/signInLogout.php"> here </a> to sign up.</h5>

</div>

<?php
include('footer.php')
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
<script src="homepage.js"></script>
</body>
</html>
