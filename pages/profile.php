<?php
session_start();
include '../includes/db.php';  // Naik satu level untuk mencapai folder includes

// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = '$user_id'";
$result = $conn->query($query);
$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Basic Body Styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    color: #333;
    line-height: 1.6;
}

        /* Header Styles */
header {
    background-color: #FF6A13; /* Shopee-style orange */
    padding: 20px 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

header .logo h1 {
    font-size: 28px;
    color: white;
    margin-left: 20px;
    font-weight: bold;
}

header nav ul {
    display: flex;
    list-style: none;
}

header nav ul li {
    margin-right: 20px;
}

header nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    font-weight: 500;
}

header nav ul li a:hover {
    color: #f1f1f1;
}

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin: 10px 0;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Footer Styles */
footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 20px;
    margin-top: 50px;
}

footer p {
    font-size: 14px;
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
                <li><a href="../pages/product.php">Products</a></li>
                <li><a href="../pages/profile.php">Profile</a></li>
                <li><a href="../pages/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h2>Your Profile</h2>
        <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
        <a href="edit_profile.php">Edit Profile</a>
    </div>

</body>
</html>

<?php include '../includes/footer.php';  // Naik satu level untuk mencapai folder includes ?>