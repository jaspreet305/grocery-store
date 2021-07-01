<?php
if(!isset($_SESSION)) {
    session_start();
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
    <link href="https://fonts.googleapis.com/css2?family=Londrina+Solid:wght@100;300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>

    <title>Sign Up</title>
</head>

<body class="sign-body">
<?php include ('../header.php')?>

<div class="d-flex justify-content-center align-items-center signup-container">
    <form class="sign-form text-center" id="myForm" onsubmit="return register()" action="write.php" method="POST">
        <div class="user-img">
            <img src="../../assets/images/face.png">
        </div>
        <h1 class="mb-5">Sign Up</h1>
        <div class="errorSign">
        <small> <?php echo isset($email) ? "Account already exists for email: $email": ' '?> </small>
        </div>
        <div class="form-group">
            <input name="firstName" id="firstName" type="text" class="form-control" placeholder="First name" value="<?php echo isset($firstName) ? ($firstName) : '' ?>" required
                   autofocus>
        </div>
        <div class="form-group">
            <input name="lastName" id="lastName" type="text" class="form-control" placeholder="Last name" value="<?php echo isset($lastName) ? ($lastName) : '' ?>" required>
        </div>
        <div class="form-group">
            <input name="address" id="address" type="text" class="form-control" placeholder="Address" value="<?php echo isset($address) ? ($address) : '' ?>" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4"><input type="text" name="city" id="city"
                                                    class="form-control form-control-lg" placeholder="City" value="<?php echo isset($city) ? ($city) : '' ?>" required>
            </div>
            <div class="form-group col-md-4"><input type="text" name="zip" id="zip" class="form-control form-control-lg"
                                                    pattern="[a-zA-Z]\d[a-zA-Z] ?\d[a-zA-Z]\d" placeholder="Postal code"
                                                    maxlength="7" value="<?php echo isset($zip) ? ($zip) : '' ?>" required>
            </div>
            <div class="form-group col-md-4">
                <select id="province" name="province" class="form-control value="<?php echo isset($province) ? ($province) : '' ?>" required>
                    <option selected>Quebec</option>
                    <option>Alberta</option>
                    <option>British Columbia</option>
                    <option>Manitoba</option>
                    <option>New Brunswick</option>
                    <option>Ontario</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <input name="phone" id="phone" type="tel" class="form-control form-control-lg" placeholder="Phone"
                   pattern="[0-9]{3}-? ?[0-9]{3}-? ?[0-9]{4}" value="<?php echo isset($phone) ? ($phone) : '' ?>" required>
            <div class="error">
                <small>Error message</small>
            </div>
        </div>
        <div class="form-group">
            <input name="email" id="emailUp" type="email" class="form-control form-control-lg" placeholder="Email"
                   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
        </div>
        <div class="form-group">
            <input name="confirmEmail" id="confirmEmailUp" type="email" class="form-control form-control-lg"
                   placeholder="Confirm email" required>
            <div class="error">
                <i class="fas fa-exclamation-circle" id="emailFas"></i>
                <small id="errorConfirmEmail">Email doesn't match</small>
            </div>
        </div>
        <div class="form-group">
            <input name="password" id="passwordUp" type="password" class="form-control form-control-lg"
                   placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
        </div>
        <div class="form-group">
            <input name="confirmPassword" id="confirmPasswordUp" type="password" class="form-control form-control-lg"
                   placeholder="Confirm password" required>
            <div class="error">
                <i class="fas fa-exclamation-circle" id="passwordFas"></i>
                <small id="errorConfirmPassword">Password doesn't match</small>
            </div>
        </div>
<!--        <div class="forgot-link form-group d-flex justify-content-between align-items-center">-->
<!--            <div class="form-check">-->
<!--                <input name="remember" id="rememberPassword" type="checkbox" class="form-check-input" id="remember">-->
<!--                <label class="form-check-label">Remember Password</label>-->
<!--            </div>-->
<!--        </div>-->
        <div class="d-grid gap-2">
            <button name="submit" class="btn btn-primary col-4" type="submit">Submit</button>
            <button name="reset" class="btn col-3 btn-secondary" type="reset">Reset</button>
        </div>
    </form>
</div>

<?php include ('../footer.php')?>

<script src="../../js/register.js"></script>
</body>

</html>