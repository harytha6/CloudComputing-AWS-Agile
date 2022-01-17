<?php

$hostname = "abc-database.cd6bhxjeqpoi.us-east-2.rds.amazonaws.com";
$username = "admin";
$password = "12345678mM";
$database = "abcdb";

$conn = mysqli_connect($hostname, $username, $password, $database) or die("Database connection failed");

// $base_url = "https://code.akhfasoft.net/login-register-youtube/";
// $my_email = "code@akhfasoft.net";

?>