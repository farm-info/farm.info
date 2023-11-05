<?php
$title = 'Checkout';
include "../../includes/top.php";

if (!($loggedIn && !$loggedInAsSeller)) {
    header("Location: ../account/login.php");
    exit();
}

// sql
$productIDs = $_POST['productID'];
$questionMarks = join(',', array_fill(0, count($productIDs), '?'));
$query =
    "SELECT productID, product_name, product_price FROM item
    WHERE productID IN ($questionMarks)";
$statement = $con->prepare($query);
$statement->execute($productIDs);
$result = $statement->get_result();

// add everything into one array
$checkout_items = [];
while ($row = mysqli_fetch_array($result)) {
    $item = $row;
    $item['quantity'] = $_POST['quantity'][$row['productID']];
    $checkout_items[] = $item;
}


$_SESSION['checkout_items'] = $checkout_items;
$total = 0;
?>


<main>
    <h1 style="margin-left: 2%; margin-right: 2%;">Checkout</h1>
    <form method="post" action="place_order.php">
        <div class="two-column-layout">
            <section>
                <h2>Customer details</h2>
                <form method="post" action="#">
                    <label>Name</label><br>
                    <input type="text" name="customer-name" required><br><br>
                    <label>Email Address</label><br>
                    <input type="text" name="email-address" required><br><br>
                    <label>Country</label><br>
                    <input type="text" name="country" required><br><br>
                    <label>State</label><br>
                    <input type="text" name="state" required><br><br>
                    <label>City or town</label><br>
                    <input type="text" name="city" required><br><br>
                    <label>Address</label><br>
                    <input type="text" name="address" required><br><br>
            </section>

            <section>
                <h2>Invoice</h2>
                <table style=''>
                    <thead>
                        <tr>
                            <th style='text-align: left;'>Product</th>
                            <th style='text-align: left;'>Quantity</th>
                            <th style='text-align: right;'>Price</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($checkout_items as $item) { ?>
                            <tr>
                                <td style='text-align: left;'>
                                    <?= $item['product_name'] ?>
                                </td>
                                <td style='text-align: left;'>
                                    <?= $item['quantity'] ?>
                                </td>
                                <td style='text-align: right;'>RM
                                    <?= number_format($item['product_price'], 2); ?>
                                    <?php $total += $item['product_price'] * $item['quantity'] ?>
                                </td>
                            </tr>
                        <?php } ?>

                        <tr>
                            <td style='text-align: left;'>
                                <b>Total</b>
                            </td>
                            <td style='text-align: left;'></td>
                            <td style='text-align: right;'>
                                <b>RM
                                    <?= number_format($total, 2); ?>
                                </b>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </section>

            <section>
                <h2>Payment</h2>
                <label>Payment method</label><br>
                <select id="payment-method" name="Payment Method" required onchange="updatePaymentMethod()">
                    <option value="E-wallet">E-wallet</option>
                    <option value="Credit/Debit Card">Credit/Debit Card</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                </select><br>

                <input type="text" name="e-wallet" id="e-wallet" style="display:block" placeholder="E Wallet">
                <input type="text" name="credit-card" id="credit-card" style="display:none" placeholder="Credit Card">
                <input type="text" name="bank-number" id="bank-number" style="display:none" placeholder="Bank Number">
                <br>

                <script>
                    function updatePaymentMethod() {
                        var paymentMethod = document.getElementById("payment-method").value;

                        if (paymentMethod == 'E-wallet') {
                            document.getElementById('e-wallet').style.display = 'block';
                            document.getElementById('credit-card').style.display = 'none';
                            document.getElementById('bank-number').style.display = 'none';
                        }
                        if (paymentMethod == 'Credit/Debit Card') {
                            document.getElementById('credit-card').style.display = 'block';
                            document.getElementById('e-wallet').style.display = 'none';
                            document.getElementById('bank-number').style.display = 'none';
                        }

                        if (paymentMethod == 'Bank Transfer') {
                            document.getElementById('bank-number').style.display = 'block';
                            document.getElementById('credit-card').style.display = 'none';
                            document.getElementById('e-wallet').style.display = 'none';
                        }
                    }
                </script>

                <label>Voucher or giftcard (if available)</label><br>
                <input type="text" name="voucher"><br><br>
                <label>Discount code (if available)</label><br>
                <input type="text" name="discount-code"><br><br>

                <input type="hidden" name="purchase-type" value="<?= $_POST['purchase-type'] ?? '' ?>">
                <button type="submit">Place Order Now</button>
            </section>
        </div>
    </form>
</main>
