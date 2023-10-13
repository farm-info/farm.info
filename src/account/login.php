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
        include("database/conn.php");
        $sql = "SELECT * FROM customer WHERE customer_email='$_POST[customer_email]' AND customer_password='$_POST[customer_password]'";

        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);
        $rowcount = mysqli_num_rows($result);
        //hello tryail
        if ($rowcount == 1) { //if there is a record match
            session_start();
            $_SESSION['customerID'] = $row['customerID']; //assign a session so all the login will be based on account that currently login
            header("location:index.php");
        } else {
            echo "<script>alert('Email or Password not correct!');</script>";
        }
    }
    ?>
</body>

</html>
