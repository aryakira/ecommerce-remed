<?php
session_start();
include '../includes/db.php';  // Naik satu level untuk mencapai folder includes

// Menampilkan daftar produk
$query = "SELECT * FROM products";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Site</title>
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- link CSS -->
</head>
<body>
    <header>
        <div class="logo">
            <h1>My E-Shop</h1>
        </div>
        <nav>
            <ul>
                <li><a href="../pages/index.php">Home</a></li>
                <li><a href="../pages/product.php">Products</a></li>
                <li><a href="../pages/profile.php">Profile</a></li>
                <li><a href="../pages/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="product-gallery">
            <!-- Product items will go here -->
             <a href="product.php"><img src="../assets/images/dr-martens.jpg" alt="" width="600"></a> </a></br>
             <a href="product.php"><img src="../assets/images/conver.jpg" alt="" width="600"></a>
        </section>
    </main>
</body>
</html>

<?php include '../includes/footer.php';  // Naik satu level untuk mencapai folder includes ?>