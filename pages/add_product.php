<?php
session_start();
include '../includes/db.php'; // Menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Upload file gambar
    $target_dir = "../assets/images/";
    $image = basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $image;

    // Pastikan file diupload ke folder tujuan
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Masukkan data produk ke database
        $query = "INSERT INTO products (name, description, price, image) VALUES ('$name', '$description', '$price', '$image')";
        
        if ($conn->query($query)) {
            // Jika berhasil, arahkan ke halaman products.php
            header("Location: product.php");
            exit(); // Menghentikan eksekusi kode setelah redirect
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Failed to upload image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h2>Add Product</h2>
    <form method="POST" action="add_product.php" enctype="multipart/form-data">
        <label for="name">Product Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="price">Price:</label><br>
        <input type="number" id="price" name="price" step="0.01" required><br><br>

        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>

        <button type="submit">Add Product</button>
    </form>
</body>
</html>

<?php include '../includes/footer.php'; ?>
