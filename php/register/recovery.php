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
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@100;300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>

    <title>Recovery</title>
</head>

<body class="sign-body text">
<?php include ('../header.php')?>

<div class="d-flex justify-content-center align-items-center recovery-container">
    <form class="sign-form text-center" id="recovery-form" method="post" action="sendEmail.php">
        <h1 class="mb-5">Recovery</h1>
        <div id="recoveryForm">
            <div class="form-group">
                <input name="emailRecovery" id="emailRecovery" type="email" class="form-control form-control-lg"
                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email"
                       required autofocus>
            </div>
            <button name="submit" id="submitRecovery" class="btn btn-primary col-6" type="submit">Send Email
            </button>
            <div class="messageReset">
                <small>We'll send you instructions to get your password back</small>
            </div>
        </div>
    </form>
</div>

<?php include ('../footer.php')?>

</body>

</html>