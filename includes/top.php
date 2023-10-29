<?php
include dirname(__FILE__) . "/session.php";
include dirname(__FILE__) . "/../includes/conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $title ?> | Farm.info
    </title>
    <!-- yeah this only works on my computer unless you also setup your server the same way. sorry. -->
    <link rel="stylesheet" href="/farm.info/src/style.css">
</head>

<body>
    <nav>
        <ul>
            <li>
                <!-- you might be asking "why are the links so ugly?" -->
                <!-- well most of the group members put their project in the wamp server folder -->
                <!-- they're already so incompetent, so asking them to configure an extra thing would probably kill them -->
                <a href="/farm.info/src/index.php" class="homepage-link">
                    <img src="/farm.info/images/logo.png" alt="Marketplace Logo" id="logo">
                    <span>Farm.info</span>
                </a>
            </li>
            <li><a href="/farm.info/src/about.php">About us</a></li>

            <spacer></spacer>

            <?php if ($loggedInAsSeller) { ?>
                <li><a href="/farm.info/src/seller/insertprod.php">Add Product</a></li>
                <li><a href="/farm.info/src/seller/sellerindex.php">Edit product</a></li>
                <li><a href="/farm.info/src/account/logout.php">Log out</a></li>
            <?php } else if ($loggedIn) { ?>
                    <li><a href="/farm.info/src/product/cart.php">Cart</a></li>
                    <li><a href="/farm.info/src/account/logout.php">Log out</a></li>
            <?php } else { ?>
                    <li><a href="/farm.info/src/account/login.php">Login</a></li>
                    <li><a href="/farm.info/src/account/register.php">Register</a></li>
                    <li><a href="/farm.info/src/seller/login.php">Seller?</a></li>
            <?php } ?>

        </ul>
    </nav>
    </header>

    <!-- assigns .active class to the link of current page -->
    <!-- doing it in php would have been better but i couldn't find an elegant way -->
    <script>
        var currentPage = window.location.pathname;
        // alternate version that only uses the last part of the path
        // for example: /farm.info/src/index.php -> index.php
        //var currentPage = window.location.pathname.split('/').pop();
        var linkToCurrentPage = document.querySelector(`[href="${currentPage}"]`);
        linkToCurrentPage.classList.add("class", "active");
    </script>

    <main>
