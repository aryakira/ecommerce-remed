<?php 
session_start();
include '../includes/db.php';

// Ambil semua produk dari database
$query = "SELECT * FROM products";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        /* Tambahkan style CSS untuk produk menyamping */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin: 20px 0;
        }

        .products-container {
            display: flex;
            flex-wrap: nowrap; /* Jangan pindah ke baris baru */
            overflow-x: auto; /* Scroll horizontal jika banyak produk */
            gap: 20px;
            padding: 20px;
        }

        .product-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            width: 200px;
            text-align: center;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            flex: 0 0 auto; /* Ukuran item tetap */
        }

        .product-item:hover {
            transform: translateY(-10px);
        }

        .product-item img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .product-item h3 {
            font-size: 16px;
            margin: 10px 0;
        }

        .product-item p {
            margin: 5px 0;
            color: #555;
        }

        .product-item a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            background-color: #333;
            color: #fff;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s;
        }

        .product-item a:hover {
            background-color: #e64c42;
        }

        header {
            background-color: #FF6A13;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <h1>My E-Shop</h1>
        </div>
        <nav>
            <ul>
                <li><a href="../pages/index.php">Home</a></li>
                <li><a href="../pages/add_product.php">Add Product</a></li>
                <li><a href="../pages/profile.php">Profile</a></li>
                <li><a href="../pages/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <h2>Our Products</h2>
    <div class="products-container">
        <?php while ($product = $result->fetch_assoc()): ?>
            <div class="product-item">
                <img src="../assets/images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                <p><strong>Price: $<?php echo number_format($product['price'], 2); ?></strong></p>
                <a href="product_detail.php?id=<?php echo $product['id']; ?>">View Details</a>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>

<?php include '../includes/footer.php'; ?>