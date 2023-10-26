<?php
$title = 'Index';
include "../../includes/top.php"; ?>

<head>
    <link href="../style.css" rel="stylesheet">
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
        <h1>Farm.info</h1>
        <h2>Edit Product</h2>
        <?php
        include "../../includes/conn.php";
        $id = intval($_GET['id']);
        $sql = "SELECT * FROM item WHERE productID=$productID";
        $result = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <form method="post" action="update.php">
                <input type="hidden" name="sellerID" value="<?php echo $row['sellerID']; ?>">

                <label>Product Name</label><br>
                <input type="text" name="product_name" required value="<?php echo $row['product_name']; ?>"><br><br>

                <label>Category</label><br>
                <input type="tel" name="product_category" required value="<?php echo $row['product_category']; ?>"><br><br>

                <label>Description</label><br>
                <input type="tel" name="product_description" required value="<?php echo $row['product_description']; ?>"><br><br>


                <label>Price</label><br>
                <input type="tel" name="product_price" required value="<?php echo $row['product_price']; ?>"><br><br>

                <label>Stock Quantity</label><br>
                <input type="tel" name="stock_quantity" required value="<?php echo $row['stock_quantity']; ?>"><br><br>

                <button>Submit</button>
                <button type="reset">Reset</button>

            </form>
            <?php
        }
        ?>
    </div>
</body>

</html>
