<?php

// Set/unset the session and it's variables
session_start();
unset($_SESSION['logged']);
unset($_SESSION['welcome']);
unset($_SESSION['admin']);
unset($_SESSION['name']);
unset($_SESSION['full_name']);
unset($_SESSION['cart']);
header("Location: signup.php");