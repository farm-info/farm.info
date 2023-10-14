<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
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
        include("../../database/conn.php");
        $sql = "SELECT * FROM seller WHERE seller_email='$_POST[seller_email]' AND seller_password='$_POST[seller_password]'";

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
    
    <a href="../seller/selllogin.php">already have an account? Login.</a>
</body>

</html>
