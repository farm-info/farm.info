<?php
// Establish a database connection (replace with your credentials)
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch product data
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Generate HTML for product list
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="product">';
        echo '<img src="' . $row["image_url"] . '" alt="' . $row["name"] . '">';
        echo '<div class="product-info">';
        echo '<h2>' . $row["name"] . '</h2>';
        echo '<p>' . $row["description"] . '</p>';
        echo '<p>Seller: ' . $row["seller"] . '</p>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "No products found.";
}

// Close the database connection
$conn->close();
?>
