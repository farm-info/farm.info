<?php
$title = 'Checkout';
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
    <h1 style="margin: 2%;">Checkout</h1>
    <div class="two-column-layout">
        <section>
            <h2>Customer details</h2>
            <form method="post" action="#">
                <label>Name</label><br>
                <input type="text" name="customer name" required><br><br>
                <label>Email Address</label><br>
                <input type="text" name="Email Address" required><br><br>
                <label>Country</label><br>
                <input type="text" name="Country" required><br><br>
                <label>State</label><br>
                <input type="text" name="state" required><br><br>
                <label>City or town</label><br>
                <input type="text" name="City or Town" required><br><br>
                <label>Address</label><br>
                <input type="text" name="Address" requried><br><br>
        </section>

        <section>
            <h2>Payment</h2>
            <form method="post" action="#">
                <label>Select payment method</label><br>
                <select id="payment-method" name="Payment Method" required onchange="updatePaymentMethod()">
                    <option value="E-wallet">E-wallet</option>
                    <option value="Credit/Debit Card">Credit/Debit Card</option>
                    <option value="Bank Transfer">Bank Transfer</option>

                </select><br>
                <input type="text" name="e-wallet" id="e-wallet" style="display:none" placeholder="E Wallet">
                <input type="text" name="credit-card" id="credit-card" style="display:none" placeholder="CC">
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

                <label>Enter a voucher or giftcard if available</label><br>
                <input type="text" name="Voucher or giftcard"><br><br>
                <label>Enter a discount code if available</label><br>
                <input type="text" name="Discount Code"><br><br>

                <button><a href="../product/delete.php">Place Order?</a></button>
            </form>
        </section>
    </div>
</main>
