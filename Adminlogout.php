<?php
session_start();

session_unset();
header('location: Adminlogin.php');
?>