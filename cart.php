<?php
session_start();

$servername= "localhost";
$username= "root";
$password= "";
$db_name= "kids";

$conn= new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$cart_items= [];
$total_price= 0;
$cart_count= 0;

$sql= "SELECT name, price, quantity, image FROM items";
$result= $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row= $result->fetch_assoc()){
        $cart_items[]= $row;
        $total_price+= $row['price'] * $row['quantity'];
        $cart_count+= $row['quantity'];
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <nav>
        <label class="logo">Tiny Trendz</label>
        <ul>
            <li class="active"><a href="index.html">Home</a></li>
            <li class="active"><a href="shop.php">Shop Now</a></li>
        </ul>
        <div class="icon">
            <a href="cart.php" style="position: relative;">
                <i class="fa fa-shopping-cart" style="font-size: 35px;"></i>
            </a>
            <?php if ($cart_count > 0) : ?>
                <span class="cart-count"><?php echo $cart_count; ?></span>
            <?php endif; ?>
        </div>
    </nav>

    <h1>Your Cart</h1>

    <?php if (empty($cart_items)) : ?>
        <p>Your cart is empty.</p>
    <?php else : ?>
        <table>
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart_items as $item):?>
                    <tr>
                        <td><img src="<?php echo $item['image']; ?>" alt="Product Image" style="width: 100px;"></td>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['price']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td><?php echo $item['price'] * $item['quantity'];?></td>
                        <td>
                            <form action="remove.php" method="POST" style="display: inline;">
                                <input type="hidden" name="product_name" value="<?php echo $item['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $item['price']; ?>">
                                <button type="submit" class="btn btn-remove">Remove</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4">Total Price</td>
                    <td><?php echo $total_price; ?></td>
                </tr>
            </tbody>
        </table>
       <a href="order.html"class="btn_order">Confirm Order</button>
            </div>
      
    <?php endif; ?>
</body>
</html>

