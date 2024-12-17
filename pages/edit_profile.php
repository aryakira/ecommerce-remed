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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    
    $query = "UPDATE users SET username = '$username', email = '$email' WHERE id = '$user_id'";
    if ($conn->query($query) === TRUE) {
        echo "Profile updated successfully!";
        header("Location: profile.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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

        form input[type="text"],
        form input[type="email"],
        form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        form button:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #4CAF50;
            text-decoration: none;
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
        <h2>Edit Profile</h2>
        <form method="POST" action="">
            <input type="text" name="username" value="<?php echo $user['username']; ?>" required>
            <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
            <button type="submit">Save Changes</button>
        </form>
        <a href="profile.php">Back to Profile</a>
    </div>

</body>
</html>

<?php include '../includes/footer.php';  // Naik satu level untuk mencapai folder includes ?>