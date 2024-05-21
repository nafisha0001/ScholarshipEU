<?php 



// session_start();

// $con = mysqli_connect("localhost", "root", "", "scholarship");
// if (mysqli_connect_error()) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// // Print the $_POST array for debugging
// // print_r($_REQUEST);

//  if (isset($_POST['name'], $_POST['registration_no'], $_POST['course'], $_POST['status'])) {
//     $name = $_POST['name'];
//     $registration_no = $_POST['registration_no'];
//     $course = $_POST['course'];
//     $status = $_POST['status'];

//     $sql = "INSERT INTO studentstatus (name, registration_no, course, status) VALUES (?, ?, ?, ?)";

//     $stmt = mysqli_stmt_init($con);
//     if (!mysqli_stmt_prepare($stmt, $sql)) {
//         die(mysqli_error($con));
//     }

//     mysqli_stmt_bind_param($stmt, "ssss", $name, $registration_no, $course, $status);
//     mysqli_stmt_execute($stmt);

//     mysqli_stmt_close($stmt);
//  }

// mysqli_close($con);
    // $name = $_POST['name'];
    // $registration_no = $_POST['registrationNo'];
    // $course = $_POST['course'];
    // $status = $_POST['status'];
    // $sql = "INSERT INTO studentstatus  VALUES ('$name', 
    //         '$registrtation_no','$course','$status')";
    // if(mysqli_query($con, $sql)){
    //     echo "<h3>data stored in a database successfully."
    //         . " Please browse your localhost php my admin"
    //         . " to view the updated data</h3>"; 

    //     echo nl2br("\n$name\n $registration_no\n "
    //         . "$course\n $status");
    // } else{
    //     echo "ERROR: Hush! Sorry $sql. "
    //         . mysqli_error($conn);
    // }

    // mysqli_close($con);



// Database connection information
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "scholarship";

// Create connection
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$name = $_POST["name"];
$registration_no= $_POST["registrationNo"];
$course= $_POST["course"];
$status = $_POST["status"];

// Insert data into database
$sql = "INSERT INTO status (name, registrationNo, course, status) VALUES ('$name','$registration_no','$course', '$status')";

if (mysqli_query($conn, $sql)) {
    echo "Student data saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);

?>