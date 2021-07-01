<?php
if(!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content='maximum-scale=1.0, initial-scale=1.0, width=device-width' name='viewport'>
    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/favicon/favicon-16x16.png">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@100;300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/45836f3eb4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/uikit@3.6.15/dist/css/uikit.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Contact</title>
</head>
<body class="contactus">
<?php include('../header.php') ?>

<div class="d-flex justify-content-center align-items-center contactus-container">
    <form method='post' action="check-contact.php" id="contact-form" class="sign-form text-center" >

        <h1 class="mb-5">Contact Us</h1>
        <div id="form-contact-body">
            <input name="user" class="form-control" type="text" placeholder="Your Name" style="margin-bottom: 3%" required>
            <input name="item" class="form-control" type="text" placeholder="Item" style="margin-bottom: 3%" required>
            <input pattern="[0-9]{5}[A-Za-z]{2}" name='orderNum' id="order-number" class="form-control" type="text" placeholder="Order #" style="margin-bottom: 3%" required>
            <div class="form-group" style="margin-bottom: 3%">
                <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Please provide us with more details so we may assist you." required></textarea>
            </div>
            <button name="submit" id="submitIn" class="btn btn-primary col-6" type="submit">Submit</button>
        </div>


    </form>
</div>

<!--<script>-->
<!---->
<!--    // checks if the order enter corresponds to an order in the backstore.-->
<!--    function checkOrderMatch(){-->
<!---->
<!--        var numbersArray = JSON.parse(localStorage.getItem('orders-array'));-->
<!--        console.log(numbersArray)-->
<!---->
<!--        // grabs order entered.-->
<!--        orderInput = $("#order-number").val();-->
<!---->
<!--        //checks if order is empty.-->
<!--        if(orderInput == "")-->
<!--            return;-->
<!---->
<!--        //  checks if order entered corresponds to the format.-->
<!--        if (!(/[0-9]{5}[A-Za-z]{2}/g.test(orderInput))){-->
<!--            alert("Order format is incorrect, please try again.")-->
<!--            return;-->
<!--        }-->
<!---->
<!---->
<!--        // checks if a match is found and responds accordingly.-->
<!--        for (i=0; i<numbersArray.length; i++) {-->
<!--            if (orderInput != numbersArray[i].orderNum) {-->
<!--                alert("Unknown order. Please check your order number and try again.")-->
<!--                break;-->
<!--            } else if (orderInput == numbersArray[i].orderNum) {-->
<!---->
<!--                $("#form-contact-body").text("Thank you for contacting us. Our team will be in touch as soon as possible!")-->
<!--                break;-->
<!--            }-->
<!--        }-->
<!---->
<!--    }-->
<!--</script>-->



<?php include('../footer.php') ?>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="../../js/backstore.js"></script>
</body>
</html>