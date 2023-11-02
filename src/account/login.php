<?php
$title = 'Login';
include "../../includes/top.php";
?>

<head>
    <style>
        body {
            background-image: url('../../images/farmback.jpg');
            background-size: cover;
            background-repeat: no-repeat;

        }
    </style>
</head>

<h3>Login</h3>

<form method="post">
    Email:<br>
    <input type="email" name="customer_email"><br><br>

    Password:<br>
    <input type="password" name="customer_password"><br><br>

    <button name="loginBtn">Login</button>
</form>

<?php
if (isset($_POST['loginBtn'])) {
    // Modify the include statement to use an absolute path
    include "../../includes/conn.php";
    $sql = "SELECT * FROM customer WHERE customer_email='$_POST[customer_email]' AND customer_password='$_POST[customer_password]'";

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $rowcount = mysqli_num_rows($result);

    if ($rowcount == 1) {
        session_start();
        $_SESSION['customerID'] = $row['customerID'];
        header("Location: ../index.php");
        exit();
    } else {
        echo "<script>alert('Email or Password not correct!');</script>";
    }
} ?>

<a href="../account/register.php">Dont have an account? Register Here.</a>
<br>or</br>
<a href="../seller/login.php">Login as seller.</a>

<?php include "../../includes/bottom.php" ?>

