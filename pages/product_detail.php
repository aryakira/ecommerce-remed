<?php 
session_start();
include '../includes/db.php';

// Ambil ID produk dari URL
if (!isset($_GET['id'])) {
    echo "Invalid product ID!";
    exit;
}

$product_id = intval($_GET['id']);
$query = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

if (!$product) {
    echo "Product not found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Product Details</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    color: #333;
    line-height: 1.6;
}

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .product-details {
            display: flex;
            max-width: 800px;
            gap: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        .product-details img {
            width: 300px;
            height: auto;
            border-radius: 8px;
        }

        .details {
            flex: 1;
        }

        .details h2 {
            margin: 0;
            font-size: 28px;
            color: #333;
        }

        .details p {
            font-size: 16px;
            color: #555;
        }

        .details strong {
            display: block;
            margin: 10px 0;
            font-size: 18px;
            color: #ff6f61;
        }

        button {
            background-color: #ff6f61;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #e64c42;
        }

        h1 {
            color: #f4f4f9;
        }
    </style>
</head>
<body>
    <header>
        <h1 style="text-align: center; padding: 20px 0;" class="">Product Details</h1>
    </header>
    <div class="container">
        <div class="product-details">
            <img src="../assets/images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
            <div class="details">
                <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
                <strong>Price: $<?php echo number_format($product['price'], 2); ?></strong>
                <form method="POST" action="index.php">
                    <input type="number" name="quantity" value="1" min="1" style="width: 50px; margin-bottom: 10px;">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <button type="submit">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
