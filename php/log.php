<?php

session_start();

$con = mysqli_connect("localhost", "root", "", "scholarship");
if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected";
print_r($_POST);
mysqli_close($con);
?>