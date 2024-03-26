<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include '_dbconnect.php';
    $user_email = $_POST['email'];
    $user_pass = $_POST['password'];
    $sql = "SELECT * FROM users WHERE user_email='$user_email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($user_pass, $row['user_pass'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['user_email'] = $user_email;
            header("Location: /FORUM/index.php");
            exit();
        }
    }
    header("Location: /FORUM/index.php?login=error");
}
?>