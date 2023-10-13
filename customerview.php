<?php
session_start();
if(!isset($_SESSION['user_id'])){
    echo "<script>alert('Please Login!');window.location.href='login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Contacts</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <a href="default.php">Add New Contact</a> | <a href="logout.php">Logout</a><br><br>
    <form method="post">
    Search: <input type="text" name="search_key"> <button name="search">Search</button>
    </form>
    <br>
    <?php
        include("conn.php");
        $search_key ="";

        if (isset($_POST['search']))
        {
            $search_key = $_POST["search_key"];
        }

        $sql = "SELECT * FROM customer WHERE contact_name LIKE '%$search_key%' AND customerID=$_SESSION[customerID]";
        $result = mysqli_query($con,$sql);
    ?>
    <table id="customer">
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email Address</th>
            <th>Home Address</th>
            <th>Gender</th>
            <th>Relationship</th>
            <th>Date of Birth</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
            while ($row = mysqli_fetch_array($result))
            {
                echo '<tr>';
                echo '<td>'.$row['customer_name'].'</td>';
                echo '<td>'.$row['customer_username'].'</td>';
                echo '<td>'.$row['customer_email'].'</td>';
                echo '<td>'.$row['customer_phonenumber'].'</td>';
                echo '<td>'.$row['customer_password'].'</td>';
                echo '<td>'.$row['customer_address'].'</td>';
                echo '<td><a href="customeredit.php?id='.$row['id'].'">Edit</td>';
                echo '<td><a onclick="return confirm(\'Confirm to delete the record?\')" href="delete.php?id='.$row['id'].'">Delete</a></td>';
                echo '</tr>';
            }
        ?>
    </table>
</body>
</html>