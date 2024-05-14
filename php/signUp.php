<?php

session_start();

$con = mysqli_connect("localhost", "root", "", "scholarship");
if (mysqli_connect_error()) {
    die("Connection failed: " . mysqli_connect_error());
}

if(strlen($_POST["password"])<8){
    die("Password must be at least 8 characters");
}

if(!preg_match("/[a-z]/i", $_POST["password"])){
    die("Password must contain at least one letter");
}

if(!preg_match("/[0-9]/", $_POST["password"])){
    die("Password must contain at least one number");
}

$password= password_hash($_POST["password"] , PASSWORD_DEFAULT);

$name = $_POST["name"];
$email = $_POST["email"];

// Check if user already has an account with this email
$check_sql = "SELECT * FROM student WHERE email = ?";
$check_stmt = mysqli_stmt_init($con);
if (!mysqli_stmt_prepare($check_stmt, $check_sql)) {
    die("Error preparing statement: " . mysqli_error($con));
}

mysqli_stmt_bind_param($check_stmt, "s", $email);
mysqli_stmt_execute($check_stmt);
$result = mysqli_stmt_get_result($check_stmt);

if(mysqli_num_rows($result) > 0){
    die("You already have an account with this email address");
}

$sql= "INSERT INTO student (fname, email, password) VALUES (?, ?, ?)";

$stmt = mysqli_stmt_init($con);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($con));
}

mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);

if(mysqli_stmt_execute($stmt)){
    echo '<script>window.location.href = "../pages/home.html";</script>';
    exit;
}else{
    echo "Error creating account: " . mysqli_error($con);
}

mysqli_stmt_close($stmt);
mysqli_close($con);

?>
