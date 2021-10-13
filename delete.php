<?php

include 'conn.php';

$user_email = $_GET['user_email'];
$sqlDelete = "DELETE FROM user WHERE user_email='$user_email'";
mysqli_query($conn, $sqlDelete);

header("location: dashboard.php");
