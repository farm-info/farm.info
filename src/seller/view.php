<?php
session_start();
if (!isset($_SESSION['user_id'])) {
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
    <a href="register.php">Add New Contact</a> | <a href="logout.php">Logout</a><br><br>
    <form method="post">
        Search: <input type="text" name="search_key"> <button name="search">Search</button>
    </form>
    <br>
    <?php
    include("../database/conn.php");
    $search_key = "";

    if (isset($_POST['search'])) {
        $search_key = $_POST["search_key"];
    }

    $sql = "SELECT * FROM contacts WHERE contact_name LIKE '%$search_key%' AND user_id=$_SESSION[user_id]";
    $result = mysqli_query($con, $sql);
    ?>
    <table id="seller">
        <tr>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Home Address</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>';
            echo '<td>' . $row['seller_name'] . '</td>';
            echo '<td>' . $row['seller_phonenumber'] . '</td>';
            echo '<td>' . $row['seller_address'] . '</td>';
            echo '<td><a href="seller_edit.php?id=' . $row['sellerID'] . '">Edit</td>';
            echo '<td><a onclick="return confirm(\'Confirm to delete the record?\')" href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
            echo '</tr>';
        }
        ?>
    </table>
</body>

</html>
