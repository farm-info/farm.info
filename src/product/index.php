<?php
$title = 'Item';
include "../../includes/top.php";

$productID = $_GET['id'];

$query =
    "SELECT item.*, seller.seller_name, product_images.imageID
    FROM item
    LEFT JOIN seller ON item.sellerID = seller.sellerID
    LEFT JOIN product_images ON item.productID = product_images.productID
    WHERE item.productID = ?";
$statement = $con->prepare($query);
$statement->bind_param("s", $productID);
$statement->execute();
$result = $statement->get_result();
$row = mysqli_fetch_array($result);

$query =
    "SELECT imageID, image_alt_text
    FROM product_images
    WHERE productID = ?";
$statement = $con->prepare($query);
$statement->bind_param("s", $productID);
$statement->execute();
$image_result = $statement->get_result();

if (is_null($row)) {
    echo "Product not found. Contact us if you think this is an error.";

} else { ?>
    <main class="two-column-layout">

        <?php if (mysqli_num_rows($image_result) == 0) {
            $images[] = "0";
            $alt_texts[] = "No images avaliable for this product.";
        } else {
            while ($image_row = mysqli_fetch_array($image_result)) {
                $images[] = $image_row["imageID"];
                $alt_texts[] = $image_row["image_alt_text"];
            }
        } ?>

        <section>
            <div class="image-container">
                <img id="expandedImg" style="width:100%" src="get_product_image.php?id=<?= $images[0] ?>"
                    alt="<?= $alt_texts[0] ?>">
                <div id="imgtext">
                    <?= $alt_texts[0] ?>
                </div>
            </div>

            <div class="image-row">
                <?php foreach ($images as $key => $image) { ?>
                    <img src="get_product_image.php?id=<?= $image ?>" alt="<?= $alt_texts[$key] ?>" onclick="changeImage(this);"
                        loading="lazy">
                <?php } ?>
            </div>
        </section>

        <script>
            function changeImage(imgs) {
                var expandedImg = document.getElementById("expandedImg");
                var imgText = document.getElementById("imgtext");
                expandedImg.src = imgs.src;
                imgText.innerHTML = imgs.alt;
            }
        </script>

        <section>
            <h1>
                <?= $row["product_name"] ?>
            </h1>
            <div class="price">RM
                <?= $row["product_price"] ?>
            </div>
            <div>Sold by:
                <?= $row["seller_name"] ?>
            </div>
            <div class="product-stats">
                <?= $row["product_sold"] ?> sold •
                <?= $row["product_rating"] ?>/5 rating •
                <?= $row["product_views"] ?> views
            </div>
            <br>

            <i>
                <?= $row["product_category"] ?>
            </i>
            <p>
                <?= $row["product_description"] ?>
            </p>
            <br>

            <?php if ($loggedIn) {
                $customerID = $_SESSION['customerID']; ?>
                <form action="add_to_cart.php" method="post" style="white-space: nowrap; display: inline-block;">
                    <input type="number" name="quantity" id="quantity" min="1" max="100">
                    <br>
                    <input type="hidden" name="customerID" value="<?= $customerID ?>">
                    <input type="hidden" name="productID" value="<?= $productID ?>">

                    <input type="submit" name="buy_now" value="Buy now">
                    <input type="submit" name="add_to_cart" value="Add to cart">
                </form>

            <?php } else { ?>
                <button onclick="window.location.href = '../account/login.php';">Log in to buy now</button>
            <?php } ?>

        </section>
    <?php } ?>


    <?php include "../../includes/bottom.php"; ?>

