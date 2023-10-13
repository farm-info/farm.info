<!DOCTYPE html>
<html>

<head>
    <link href="style.css" rel="stylesheet">
    <style>
        input[type=text],
        input[type=email],
        input[type=tel],
        input[type=date],
        textarea,
        select {
            width: 100%;
            padding: 15px;
            margin-top: 5px;
            margin-bottom: 22px;
            display: inline-block;
            font-size: 15pt;
        }

        #wrapper {
            width: 900px;
            margin: 0 auto;
        }

        button {
            background-color: #CCCCCC;
            border: none;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            width: 40%
        }

        input[type=text]:focus:valid {
            background-color: green;
        }

        input[type=text]:focus:invalid {
            background-color: red;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <h1>My Address Book</h1>
        <h2>Edit Contact</h2>
        <?php
        include("../database/conn.php");
        $id = intval($_GET['id']);
        $sql = "SELECT * FROM contacts WHERE id=$id";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <form method="post" action="update.php">
                <input type="hidden" name="sellerID" value="<?php echo $row['sellerID']; ?>">
                <label>Name</label><br>
                <input type="text" name="seller_name" required value="<?php echo $row['contact_name']; ?>"><br><br>

                <label>Phone Number</label><br>
                <input type="tel" name="seller_phonenumber" required value="<?php echo $row['contact_phone']; ?>"><br><br>

                <label>Home Address</label><br>
                <textarea name="seller_address" required><?php echo $row['contact_address'] ?></textarea><br><br>

                <button>Submit</button>
                <button type="reset">Reset</button>

            </form>
            <?php
        }
        ?>
    </div>
</body>

</html>
