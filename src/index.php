<?php
$title = 'Index';
include "../includes/top.php"; ?>


<head>
    <style>
        #button_cont1 {
            text-align: right;
            padding: 10px;
            font-size: 50px;
        }

        #button_cont1 button {
            margin-left: 10px;
        }

        #decproduct {
            font-size: 50px;
            margin-top: auto;
        }

        #decproduct2 {
            font-size: 10px;
            margin-top: auto;
        }
    </style>
</head>


<body>
    <?php
    $sql = "SELECT item.*, product_images.imageID, product_images.image_alt_text
            FROM item
            LEFT JOIN product_images ON item.productID = product_images.productID";
    $result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_array($result)) {
        echo '<div id="box">';
        echo '<h3> <a href="product?id=' . $row["productID"] . '">' . $row["product_name"] . '</a></h3>';
        echo '<img src="product/get_product_image.php?id=' . $row["imageID"] . '" alt="' . $row["image_alt_text"] . '" loading="lazy" style="width: 100%">';
        echo '<div class="contact_details">ProductID: ' . $row["productID"] . '</div>';
        echo '<div class="contact_details">SellerID: <a href="mailto:' . $row["sellerID"] . '">' . $row["sellerID"] . '</a></div>';
        echo '<div class="contact_details">Category: ' . $row["product_category"] . '</div>';
        echo '<div class="contact_details">Description: ' . $row["product_description"] . '</div>';
        echo '<div class="contact_details">Price: RM' . $row["product_price"] . '</div>';
        echo '<div class="contact_details">Amount Left: ' . $row["stock_quantity"] . '</div>';
        echo '<div class="contact_details">Ratings: ' . $row["product_rating"] . '</div>';
        echo '<div class="contact_details">Views: ' . $row["product_views"] . '</div>';
        echo '<br>';

        if ($loggedInAsSeller) {
            echo '<button onclick="window.location.href = \'account/login.php\';">Log in as customer</button>';
        } else if ($loggedIn) { ?>
                <!-- you know what? fuck consistency. i can't work with echos -->
                <form action="add_to_cart.php" method="post" style="white-space: nowrap; display: inline-block;">
                    <input type="hidden" name="quantity" id="quantity" value="1">
                    <input type="hidden" name="customerID" value="<?= $_SESSION['customerID'] ?>">
                    <input type="hidden" name="productID" value="<?= $row["productID"] ?>">

                    <input type="submit" name="buy_now" formaction="../src/product/checkout.php" value="Buy now">
                    <input type="submit" name="add_to_cart" formaction="../src/product/add_to_cart.php" value="Add to cart">
                </form>
        <?php } else {
            echo '<button onclick="window.location.href = \'account/login.php\';">Log in to buy now</button>';
        }
        echo '</div>';
    }
    ?>





    <script>
        function logout() {
            window.location.href = "account/logout.php";
        }

        function goToCart() {
            window.location.href = "product/cart.php";
        }

        function sell() {
            window.location.href = "seller/login.php";
        }

        function showLogin() {

            window.location.href = "account/login.php";
        }

        function showRegister() {

            window.location.href = "account/register.php";
        }

        function aboutus() {
            // Redirect to the cart page
            window.location.href = "about.php";
        }
        // JavaScript to handle clicking on product images and descriptions
        var products = document.querySelectorAll(".product");

        products.forEach(function (product) {
            product.addEventListener("click", function () {
                
                alert("Product clicked. Redirect to product details page.");
            });
        });
    </script>


    <?php include("../includes/bottom.php"); ?>

