<?php
if(!isset($_SESSION)) {
    session_start();
}

// Open the users file
if (($handle = fopen("../backstore/database/users.csv", "r")) !== FALSE) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $found = FALSE;
    // check if the user exists
    while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if ($row[0] === $email && $row[1] === $password) {
            $found = TRUE;
            break;
        }
    }
    fclose($handle);
    // accept the user
    if ($found) {
        $welcome = "Welcome $row[2] to Tropical Flavors!";
        $logged = TRUE;
        $_SESSION['logged'] = $logged;
        $_SESSION['welcome'] = $welcome;
        $_SESSION['name'] = $row[2];
        $_SESSION['full_name'] = $row[2] . " " . $row[3];
        header("Location: ../index.php");
        exit();
    }
    // accept the admin or not
    if($email == 'admin' && $password == 'admin'){
        $welcome = "Welcome Admin to Tropical Flavors!";
        $logged = TRUE;
        $_SESSION['admin'] = True;
        $_SESSION['logged'] = $logged;
        $_SESSION['welcome'] = $welcome;
        $_SESSION['name'] = "Admin";
        $_SESSION['full_name'] = "Admin";
        header("Location: ../backstore/user-list.php");
        exit();
    }
        else {
        $message = "Invalid email and/or password.";
        include('signin.php');
    }
} else {
    $message = "Something wrong occurred. Cannot continue!";
    include('signin.php');
}
