<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../styles/store_style.css">
</head>
<body>
<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . "/controller/store_controller.php";

$products = getAllProducts();
include "../view/header.php";
?>
<div class="head-line">
    <h2>Products</h2>
</div>
<div class="product-list">
    <div class="row">
        <?php foreach ($products as $key => $product): ?>
            <div class="column">
                <div class="card">
                    <img src="<?php echo $product['imgUrl'] ?>" alt="Product Photo" height="200"/>
                    <h4><?php echo $product['productName'] ?></h4>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<footer>
    <?php include "../view/footer.php" ?>
</footer>
</body>
</html>
