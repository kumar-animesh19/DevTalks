<?php
$showError = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '_dbconnect.php';
    $user_email = $_POST['semail'];
    $password = $_POST['spassword'];
    $cpassword = $_POST['scpassword'];

    //check whether this email exists
    $existSql = "SELECT * FROM users WHERE user_email='$user_email'";
    $result = mysqli_query($conn, $existSql);
    if (mysqli_num_rows($result) > 0) {
        $showError = "Email already in use!";
    } else {
        if ($password == $cpassword) {
            $hashpass = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (`user_email`,`user_pass`) VALUES ('$user_email', '$hashpass')";
            $result = mysqli_query($conn, $sql);
            if($result){
                header("Location: /FORUM/index.php?signupsuccess=true");
                exit();
            }
        } else {
            $showError = "Password does not match!";
        }
    }
    header("Location: /FORUM/index.php?signupsuccess=false&error=$showError");
}
?>