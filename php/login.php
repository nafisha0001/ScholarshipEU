<?php
    include 'connection.php';
    $umail_error = $pass_error = "";

    if (isset($_POST['Log In'])) {
        $umail = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "SELECT user_mail, user_pass FROM student WHERE user_mail = $umail";
        $stmt = mysqli_stmt_init($conn);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $umail);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $db_email, $db_password);
            mysqli_stmt_fetch($stmt);

            if ($umail == $db_email) {
                if ($pass == $db_password) {
                    header("location: front.php");
                    exit();
                } else {
                    $pass_error = "Invalid Password.";
                }
            } else {
                $umail_error = "Invalid Username.";
            }
            mysqli_stmt_close($stmt);
        } else {
            die(mysqli_error($conn));
        }
    }
    mysqli_close($conn);
?>