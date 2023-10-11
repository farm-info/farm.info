<!DOCTYPE html>
<html>
<head>
    <title>Farm.info</title>
    <style>
        #logo {
            width: 100px; 
            height: 100px;
        }

        #logo-container {
            display: flex;
            align-items: center;
        }
        
        #product1 {
            width: 150px;
            height: 150px;
        }

        #product2 {
            width: 150px;
            height: 150px;
        }

        #product3 {
            width: 150px;
            height: 150px;
        }

        #product4 {
            width: 150px;
            height: 150px;
        }

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

        #logo-text {
            font-size: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        

    </style>
</head>
<body>
    <?php
    for ($x=0;$x<0;$x++)
    {
    ?>
    <div class="box">

    </div>
    <?php
    }
    ?>


    <header>
        <div id="logo-container">
            <img src="logo.png" alt="Marketplace Logo" id="logo">
            <span id="logo-text">Farm.Info</span>
        </div>
    </header>

    <div id="button_cont1">
        <button onclick="goToCart()">Go to Cart</button>
        <button onclick="showLogin()">Login</button>
        <button onclick="showRegister()">Register</button>
    </div>
    
    <section id="product-list">
        
        
    </section>
    
    <button onclick="aboutus()">About Us</button>

    <script>
        function goToCart() {
            // Redirect to the cart page
            window.location.href = "cart.html";
        }

        function showLogin() {
            // Code to display the login form or navigate to the login page
            // For demonstration purposes, we'll show an alert here.
            alert("Display the login form or navigate to the login page.");
        }

        function showRegister() {
            // Code to display the registration form or navigate to the registration page
            // For demonstration purposes, we'll show an alert here.
            alert("Display the registration form or navigate to the registration page.");
        }

        function aboutus() {
            // Redirect to the cart page
            window.location.href = "about.html";
        }
        // JavaScript to handle clicking on product images and descriptions
        var products = document.querySelectorAll(".product");

        products.forEach(function(product) {
            product.addEventListener("click", function() {
                // Handle the click on a product, for example, navigate to the product details page.
                // For demonstration purposes, we'll show an alert here.
                alert("Product clicked. Redirect to product details page.");
            });
        });
    </script>
</body>
</html>
