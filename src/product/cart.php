<?php
$title = 'Cart';
include "../../template/top.php";

$query =
    "SELECT * FROM cart
    LEFT JOIN item ON cart.productID = cart.productID
    LEFT JOIN seller ON item.sellerID = seller.sellerID
    WHERE cart.customerID = " . $_SESSION['customerID'];

if ($loggedIn) {
    $result = mysqli_query($con, $query);
}
?>


<script>
    var currentPage = window.location.pathname.split('/').pop();
    var linkToCurrentPage = document.querySelector(`[href="${currentPage}"]`);
    linkToCurrentPage.setAttribute("class", "active");
</script>


<main>
    <h1>Cart</h1>

    <form action="/checkout.php" method="post">
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
                            <td><input type="checkbox" name="select-item" id="select_item_1"
                                    onchange="updateSelectAllCheckbox()"></td>
                            <td><img src="../../images/img_nature.jpg" alt="Nature"></td>

                            <?php
                            echo "<td>";
                            echo $row['product_name'];
                            echo "</td>";

                            echo "<td>RM";
                            echo number_format($row['product_price'], 2);
                            echo "</td>";

                            echo "<td>";
                            echo $row['seller_name'];
                            echo "</td>";

                            echo "<td>";
                            echo $row['quantity'];
                            echo "</td>";

                            echo "<td>RM";
                            echo number_format($row['product_price'] * $row['quantity'], 2);
                            echo "</td>";
                            ?>

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
                    // to the poor soul who had to read this, i am sorry. i should be banned from using a computer.
                    let priceString = table.rows[i].cells[6].innerHTML;
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

    <?php include "../../template/bottom.php"; ?>

