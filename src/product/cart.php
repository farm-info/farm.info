<?php
$title = 'Cart';
include "../../includes/top.php";

if ($loggedIn) {
    $query =
        "SELECT * FROM cart
        LEFT JOIN item ON cart.productID = cart.productID
        LEFT JOIN seller ON item.sellerID = seller.sellerID
        WHERE cart.customerID = ?";

    $statement = $con->prepare($query);
    $statement->bind_param("s", $_SESSION['customerID']);
    $statement->execute();
    $result = $statement->get_result();
}
?>

<main>
    <h1>Cart</h1>

    <form action="checkout.php" method="post">
        <table id="cart-table" onchange="calculateSum()">
            <thead>
                <tr>
                    <th><input type="checkbox" name="select-all" id="select-all" onchange="selectAllItems()"> </th>
                    <th colspan="2">Product info</th>
                    <th>Price</th>
                    <th>Seller</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!$loggedIn) { ?>
                    <tr>
                        <td colspan="7">You're not logged in</td>
                    </tr>

                <?php } elseif (mysqli_num_rows($result) == 0) { ?>
                    <tr>
                        <td colspan="7">Your cart is empty</td>
                    </tr>

                <?php } else { ?>
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>

                            <td><input type="checkbox" name="<?= $row['productID'] ?>" onchange="updateSelectAllCheckbox()">
                            </td>

                            <td><img src="../../images/img_nature.jpg" alt="Nature"></td>

                            <td>
                                <?= $row['product_name']; ?>
                            </td>

                            <td>
                                RM
                                <?= number_format($row['product_price'], 2); ?>
                            </td>

                            <td>
                                <?= $row['seller_name']; ?>
                            </td>

                            <td>
                                <?= $row['quantity']; ?>
                            </td>

                            <td>
                                RM
                                <?= number_format($row['product_price'] * $row['quantity'], 2); ?>
                            </td>

                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>

        <section class="checkout">
            <span id="total-price">Total from 0 item(s): RM0.00</span>
            <?php if ($loggedIn) { ?>
                <button type="submit">Checkout</button>
            <?php } ?>
        </section>

    </form>

    <script>
        function calculateSum() {
            var table = document.getElementById("cart-table");
            var totalPriceElement = document.getElementById("total-price");
            var priceSum = 0;
            var quantitySum = 0;

            for (var i = 1; i < table.rows.length; i++) {
                let checked = table.rows[i].cells[0].children[0].checked;

                if (checked) {
                    // to the poor souls who had to read this, i am sorry. i should be banned from using a computer.
                    // i know bad code is probably an every occurance to you people but it still hurts me to write this.
                    let priceString = table.rows[i].cells[6].innerHTML;
                    priceString = priceString.trim()
                    priceString = priceString.substring(2);
                    priceString = priceString.replace(".", "");
                    priceSum += parseInt(priceString, 10);

                    let quantity = table.rows[i].cells[5].innerHTML;
                    quantitySum += parseInt(quantity);
                }
            }

            totalPriceElement.innerHTML = `Total from ${quantitySum} item(s): RM${(priceSum / 100).toFixed(2)}`;
        }

        function updateSelectAllCheckbox() {
            var table = document.getElementById("cart-table");
            var selectAllCheckbox = document.getElementById("select-all");
            let checkedCount = 0;

            for (var i = 1; i < table.rows.length; i++) {
                if (table.rows[i].cells[0].children[0].checked) {
                    checkedCount++;
                }
            }

            if (checkedCount == 0) {
                selectAllCheckbox.indeterminate = false;
                selectAllCheckbox.checked = false;
            } else if (checkedCount == table.rows.length - 1) {
                selectAllCheckbox.indeterminate = false;
                selectAllCheckbox.checked = true;
            } else {
                selectAllCheckbox.indeterminate = true;
            }
        }

        function selectAllItems() {
            var table = document.getElementById("cart-table");
            if (table.rows[0].cells[0].children[0].checked) {
                for (var i = 1; i < table.rows.length; i++) {
                    table.rows[i].cells[0].children[0].checked = true;
                }
            } else {
                for (var i = 1; i < table.rows.length; i++) {
                    table.rows[i].cells[0].children[0].checked = false;
                }
            }
        }
    </script>
</main>

<?php include "../../includes/bottom.php"; ?>

