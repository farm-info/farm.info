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

        .box {
            width: 300px;
            height: 200px;
            margin: 10px;
            background-color: blue;
            float: left;
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
        
    <div>
        <div class="product1">
            <a href="https://shopee.com.my/Premium-Seeds-50-150-Biji-Benih-Cabbage-kobis-F1-jenis-besar-dan-tahan-cuaca-panas-benih-dari-Jepun-i.112981817.8640434694?sp_atk=ae025150-9ae8-4896-a622-1f1f4527e92a&xptdk=ae025150-9ae8-4896-a622-1f1f4527e92a" target="_blank">
                <img src="product1.jpeg" alt="Product 1" id="product1" class="product-image">
                <h2 id="decproduct">King Cabbage F1GUTJI </h2>
                <p id="decproduct2">This is cabage from malaysia</p>
                <p id="decproduct2">very nice
                
                </p>
            </a>
        </div>
    </div>

        <div class="product2">
            <a href= "https://shopee.com.my/Benih-Lobak-Merah-100pcs-Carrot-Seed-%E7%BA%A2%E8%90%9D%E5%8D%9C%E8%8F%9C%E7%B1%BD-i.24498515.6763749393?sp_atk=198e1d56-ff62-4e77-8860-51724bca5878&xptdk=198e1d56-ff62-4e77-8860-51724bca5878" target="_blank">
                <img src="product2.jpeg" alt="Product 2" id="product2">
                <span id="decproduct">Benih Lobak 100 Batang</span>
            </a>
        </div>

        <div class="product3">
            <a href="https://shopee.com.my/Benih-Lobak-Putih-Local(cepat-besar)-20pcs-Radish-%E6%9C%AC%E5%9C%B0%E7%99%BD%E8%90%9D%E5%8D%9C%E7%B1%BD-i.24498515.19070812425?sp_atk=e0988f87-36d8-47b5-aaa1-3dfaf5211325&xptdk=e0988f87-36d8-47b5-aaa1-3dfaf5211325" target="_blank">
                <img src="product3.jpeg" alt="Product 3" id="product3">
                <span id="decproduct">Benih Lobak Putih Local</span>
            </a>
        </div>

        <div class="product2">
            <a href="https://shopee.com.my/Benih-Sayur-Broccoli-20pcs-%E8%A5%BF%E5%85%B0%E8%8A%B1%E7%A7%8D%E5%AD%90-i.24498515.7263456715?sp_atk=08508b90-ec86-464d-a213-2deb763ef595&xptdk=08508b90-ec86-464d-a213-2deb763ef595" target="_blank">
                <img src="product4.jpeg" alt="Product 4" id="product4">
                <span id="decproduct">Benih Sayur Broccoli</span>
            </a>
        </div>
        
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
