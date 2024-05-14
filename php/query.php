<?php

session_start();

$con = mysqli_connect("localhost", "root", "", "scholarship");
if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST["name"];
$email = $_POST["email"];
$contactNumber = $_POST["contactNumber"];
$Query = $_POST["Query"];

$sql= "INSERT INTO Query (name, email, contactNumber, Query) VALUES (?, ?, ?,?)";

$stmt = mysqli_stmt_init($con);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($con));
}

mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $contactNumber,$Query);
mysqli_stmt_execute($stmt);

mysqli_stmt_close($stmt);
mysqli_close($con);
echo '<script>alert("We will reach you soon");</script>';
echo '<script>window.location.href = "../pages/contactUs.html";</script>';

?>