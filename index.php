<html>
<head>
    <title>Online Marketplace</title>
    <style>
        #logo {
            width: 100px; 
            height: 100px;
        }

        #product1 {
            width: 500px;
            height: 500px;
        }
        
    </style>
</head>
<body>
    <header>
        <img src="logo.png" alt="Marketplace Logo" id="logo">
    </header>
    
    <section id="product-list">
        <!-- Display product images, descriptions, and seller info here -->
        <!-- Example product element, you can add more like this -->
        <div class="product">
            <img src="product1.jpg" alt="Product 1">
            <div class="product-info">
                <h2>Product 1</h2>
                <p>Description of Product 1.</p>
                <p>Seller: SellerName</p>
            </div>

            <img src="product2.jpg" alt="Product 2">
            <div class="product-info">
                <h2>Product 2</h2>
                <p>Description of Product 2.</p>
                <p>Seller: SellerName</p>
            </div>

            <img src="product3.jpg" alt="Product 3">
            <div class="product-info">
                <h2>Product 3</h2>
                <p>Description of Product 3.</p>
                <p>Seller: SellerName</p>
            </div>
        </div>
    </section>
    
    <button onclick="goToCart()">Go to Cart</button>
    <button onclick="showLogin()">Login</button>
    <button onclick="showRegister()">Register</button>
    
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
