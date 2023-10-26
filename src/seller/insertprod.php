<!DOCTYPE html>
<html lang="en">

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
        <h1>Add Product here</h1>
        <form method="post" action="addprod.php" enctype="multipart/form-data">

            <label>product ID</label><br>
            <input type="text" name="productID" required><br><br>

            <label>Product Name</label><br>
            <input type="text" name="product_name" required><br><br>

            <label>Category</label><br>
            <input type="tel" name="product_category" required><br><br>

            <label>Description</label><br>
            <input type="text" name="product_description" required><br><br>

            <label>Images</label><br>
            <input type="file" name="imageData" id="imageData" multiple required><br><br>

            <label>Image alt text</label><br>
            <input type="text" name="image_alt_text" id="imageData" multiple required><br><br>

            <label>Price (RM)</label><br>
            <input type="text" name="product_price" required><br><br>

            <label>Quantity in Stock</label><br>
            <input type="text" name="stock_quantity" required><br><br>

            <button>Submit</button>
            <button type="reset">Reset</button>
        </form>
</body>

</html>
