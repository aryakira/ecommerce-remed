<?php
include '../includes/db.php';  // Naik satu level untuk mencapai folder includes

$query = "SELECT * FROM products";
$result = $conn->query($query);
?>
<head>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<div class="product-list">
    <?php while ($product = $result->fetch_assoc()): ?>
        <div class="product-item">
            <img src="assets/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
            <h3><?php echo $product['name']; ?></h3>
            <p><?php echo $product['description']; ?></p>
            <p>$<?php echo $product['price']; ?></p>
            <a href="product_details.php?id=<?php echo $product['id']; ?>">View Details</a>
        </div>
    <?php endwhile; ?>
</div>
