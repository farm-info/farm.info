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

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .top-right {
            position: absolute;
            top: 0;
            right: 0;
        }

        body {
            background-image: url('thefield.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1> Checkout </h1>
    <h2> Input customer details </h2>
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

        <div class="top-right">
            <h1> Item details </h1>
            <form method="post" action="#">
                <label>Quantity of product</label><br>
                <input type="number" name="quantity of product" required><br><br>

                <h1> Payment </h1>
                <form method="post" action="#">
                    <label>Select payment method</label><br>
                    <select id="pm" name="Payment Method" required onchange="paymentMethod()">
                        <option value="E-wallet">E-wallet</option>
                        <option value="Credit/Debit Card">Credit/Debit Card</option>
                        <option value="Bank Transfer">Bank Transfer</option>

                    </select><br>
                    <input type="text" name="ew" id="ew" style="display:none" placeholder="E Wallet">
                    <input type="text" name="cc" id="cc" style="display:none" placeholder="CC">
                    <input type="text" name="bt" id="bt" style="display:none" placeholder="Bank Number">
                    <br>
                    <script>
                        function paymentMethod() {
                            var x = document.getElementById("pm").value;

                            if (x == 'E-wallet') {
                                document.getElementById('ew').style.display = 'block';
                                document.getElementById('cc').style.display = 'none';
                                document.getElementById('bt').style.display = 'none';
                            }
                            if (x == 'Credit/Debit Card') {
                                document.getElementById('cc').style.display = 'block';
                                document.getElementById('ew').style.display = 'none';
                                document.getElementById('bt').style.display = 'none';
                            }

                            if (x == 'Bank Transfer') {
                                document.getElementById('bt').style.display = 'block';
                                document.getElementById('cc').style.display = 'none';
                                document.getElementById('ew').style.display = 'none';
                            }
                        }
                    </script>

                    <label>Enter a voucher or giftcard if available</label><br>
                    <input type="text" name="Voucher or giftcard"><br><br>
                    <label>Enter a discount code if available</label><br>
                    <input type="text" name="Discount Code"><br><br>


                    <button><a href="../index">Place Order?</a></button>
                </form>
        </div>
</body>

</html>
