<!DOCTYPE html>
<html lang="en">
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
        <h1>Register as customer</h1>
        <form method="post" action="customerinsert.php">

            <label>CustomerID</label><br>
            <input type="text" name="customerID" required><br><br>

            <label>Name</label><br>
            <input type="text" name="customer_name" required><br><br>

            <label>Username</label><br>
            <input type="tel" name="customer_username" required><br><br>

            <label>email</label><br>
            <input type="text" name="customer_email" required><br><br>

            <label>phonenumber</label><br>
            <input type="text" name="customer_phonenumber" required><br><br>

            <label>password</label><br>
            <input type="text" name="customer_password" required><br><br>

            <label>Address</label><br>
            <input type="text" name="customer_address" required><br><br>

            <button>Submit</button>
            <button type="reset">Reset</button>

            <a href="sellerregister.php">Register as Seller!!</a>
</body>
</html>