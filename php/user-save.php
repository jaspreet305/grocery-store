<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_GET["email"])) {
    $email = $_GET["email"];
    $user = [];
    if (($handle = fopen("database/users.csv", "r")) !== FALSE) {
        while (($row = fgetcsv($handle)) !== FALSE) {
            if ($row[0] == $email) {
                $user = $row;
            }
        }
        fclose($handle);
    } else {
        $error = "Something wrong occurred. Cannot continue!";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="../../assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/favicon/favicon-16x16.png">

    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="../../css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@100;300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/45836f3eb4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/uikit@3.6.15/dist/css/uikit.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


    <title>Edit/save Users</title>

</head>

<body>
<nav class="uk-navbar-container backstore-nav">
    <div class="uk-navbar-left">

        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="../index.php"><img src="../../assets/images/logo.png"
                                                               style="height: 85px;"></a></li>

            <li class="uk-active">
                <a href="product-list.php">Products</a>
            </li>

            <li class="uk-active">
                <a href="user-list.php">Users</a>
            </li>
            <li class="uk-active">
                <a href="order-list.php">Orders</a>
            </li>
        </ul>

    </div>
</nav>


<div class="d-flex justify-content-center align-items-center signup-container">
    <form class="sign-form text-center" method="POST" action="user-write.php">

        <h1 class="mb-5">User edit</h1>
        <label class="label">First Name</label>
        <div class="form-group">
            <input name="firstName" id="firstName" type="text" class="form-control" placeholder="First name"
                   value="<?php echo isset($user[2]) ? ($user[2]) : '' ?>"
            >
        </div>
        <label class="label">Last Name</label>
        <div class="form-group">
            <input name="lastName" id="lastName" type="text" class="form-control" placeholder="Last name"
                   value="<?php echo isset($user[3]) ? ($user[3]) : '' ?>">
        </div>
        <label class="label">Address</label>
        <div class="form-group">
            <input name="address" id="address" type="text" class="form-control" placeholder="Address"
                   value="<?php echo isset($user[4]) ? ($user[4]) : '' ?>">
        </div>

        <div class="form-row">
            <div class="form-group col-md-4"><input type="text" name="city" id="city"
                                                    class="form-control form-control-lg" placeholder="City"
                                                    value="<?php echo isset($user[5]) ? ($user[5]) : '' ?>">
            </div>

            <div class="form-group col-md-4"><input type="text" name="zip" id="zip" class="form-control form-control-lg"
                                                    pattern="[a-zA-Z]\d[a-zA-Z] ?\d[a-zA-Z]\d" placeholder="Postal code"
                                                    value="<?php echo isset($user[6]) ? ($user[6]) : '' ?>"
                                                    maxlength="7">
            </div>

            <div class="form-group col-md-4">
                <select id="province" name="province" class="form-control ">
                    <option selected><?php echo isset($user[7]) ? ($user[7]) : '' ?></option>
                    <option>Quebec</option>
                    <option>Alberta</option>
                    <option>British Columbia</option>
                    <option>Manitoba</option>
                    <option>New Brunswick</option>
                    <option>Ontario</option>
                </select>
            </div>
        </div>
        <label class="label">Phone Number</label>
        <div class="form-group">
            <input name="phone" id="phone" type="tel" class="form-control form-control-lg" placeholder="Phone"
                   pattern="[0-9]{3}-? ?[0-9]{3}-? ?[0-9]{4}" value="<?php echo isset($user[8]) ? ($user[8]) : '' ?>" required>
        </div>
        <label class="label">Email</label>
        <div class="form-group">
            <input name="email" id="email" type="email" class="form-control form-control-lg" placeholder="Email"
                   value="<?php echo isset($user[0]) ? ($user[0]) : '' ?>"
                   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
        </div>
        <label class="label">Password</label>
        <div class="form-group">
            <input name="password" id="password" type="password" class="form-control form-control-lg"
                   placeholder="Password" value="<?php echo isset($user[1]) ? ($user[1]) : '' ?>"
                   required>
        </div>


        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" onclick="">Save changes</button>

        </div>
    </form>
</div>


<script>
    // $("#edit-form").submit(function(e) {
    //     e.preventDefault();
    // });

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>

<script src="https://kit.fontawesome.com/45836f3eb4.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


</body>

</html>