<?php
$title = 'Login as Seller';
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

<body>
    
    <h3>Login as Seller</h3>

    <form method="post">
        Email:<br>
        <input type="email" name="seller_email"><br><br>

        Password:<br>
        <input type="password" name="SellPassword"><br><br>

        <button name="loginBtn">Login as Seller</button>
    </form>

    <?php
    if (isset($_POST['loginBtn'])) {
        // Modify the include statement to use an absolute path
        include "../../includes/conn.php";
        $sql = "SELECT * FROM seller WHERE seller_email='$_POST[seller_email]' AND SellPassword='$_POST[SellPassword]'";

        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $rowcount = mysqli_num_rows($result);

        if ($rowcount == 1) {
            session_start();
            $_SESSION['sellerID'] = $row['sellerID'];
            // Use an absolute URL to redirect to index.php
            header("Location: ../index.php");
            exit();
        } else {
            echo "<script>alert('Email or Password not correct!');</script>";
        }
    }
    ?>

    <a href="../seller/register.php">Dont have an account? Register.</a>
    <br>or<br>
    <a href="../account/login.php">Go back to customer!!</a>

    <?php include "../../includes/bottom.php" ?>

