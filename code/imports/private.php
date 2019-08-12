<?php

session_start();

if (!isset($_SESSION['email'])) {
    // if not already logged in, redirect
    header("Location: ../login.php");
    die();
}