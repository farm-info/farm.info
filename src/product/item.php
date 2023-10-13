<?php $title = 'Item';
include("template/top.php");
?>

<main class="two-column-layout">
    <section>
        <div class="image-container">
            <img id="expandedImg" style="width:100%" src="images/img_nature.jpg">
            <div id="imgtext">Nature</div>
        </div>

        <div class="image-row">
            <img src="images/img_nature.jpg" alt="Nature" onclick="changeImage(this);">
            <img src="images/img_snow.jpg" alt="Snow" onclick="changeImage(this);">
            <img src="images/img_mountains.jpg" alt="Mountains" onclick="changeImage(this);">
            <img src="images/img_lights.jpg" alt="Lights" onclick="changeImage(this);">
        </div>
    </section>

    <script>
        function changeImage(imgs) {
            var expandImg = document.getElementById("expandedImg");
            var imgText = document.getElementById("imgtext");
            expandImg.src = imgs.src;
            imgText.innerHTML = imgs.alt;
            expandImg.parentElement.style.display = "block";
        }
    </script>

    <section>
        <h1>Product name</h1>
        <div class="price">RM49.90</div>
        <div>Sold by: Seller name</div>
        <div class="product-stats"> 10 sold • 4.2 / 5 rating • 110 views</div>
        <br>

        <i>Product category</i>
        <p>Product description. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pharetra scelerisque
            velit, non iaculis dolor fermentum ac. Mauris vulputate, orci vel cursus dapibus, elit velit blandit
            ex, aclacinia metus.</p>
        <br>

        <button>Buy now</button>
        <button>Add to cart</button>
    </section>


    <?php include("template/bottom.php"); ?>

