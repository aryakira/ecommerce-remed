<?php
session_start();
include '../includes/db.php';  // Naik satu level untuk mencapai folder includes
include '../includes/header.php';  // Sama halnya dengan header.php


// Cek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$query = "SELECT o.id, o.total, oi.product_id, oi.quantity, p.name, p.price FROM orders o
          JOIN order_items oi ON o.id = oi.order_id
          JOIN products p ON oi.product_id = p.id
          WHERE o.user_id = '$user_id' AND o.status = 'pending'";
$result = $conn->query($query);

?>

<h2>Your Order</h2>

<?php if ($result->num_rows > 0): ?>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            while ($order_item = $result->fetch_assoc()) {
                $subtotal = $order_item['quantity'] * $order_item['price'];
                $total += $subtotal;
            ?>
                <tr>
                    <td><?php echo $order_item['name']; ?></td>
                    <td><?php echo $order_item['quantity']; ?></td>
                    <td>$<?php echo $order_item['price']; ?></td>
                    <td>$<?php echo $subtotal; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h3>Total: $<?php echo $total; ?></h3>

    <form method="POST" action="process_checkout.php">
        <button type="submit">Checkout</button>
    </form>
<?php else: ?>
    <p>You have no pending orders.</p>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>
