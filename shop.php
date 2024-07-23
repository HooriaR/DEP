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

$cart_count= 0;

$sql= "SELECT SUM(quantity) AS total_quantity FROM items";
$result= $conn->query($sql);
if ($result->num_rows>0) {
    $row= $result->fetch_assoc();
    $cart_count= $row['total_quantity'];
}
?>
  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Website</title>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      * {
        padding: 0;
        margin: 0;
        text-decoration: none;
        list-style: none;
        box-sizing: border-box;
      }

      body {
        background-color: pink;
      }

      nav {
        background: palevioletred;
        height: 80px;
        width: 100%;
        border-radius: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
      }

      .logo {
        color: white;
        font-size: 35px;
        font-weight: bold;
      }

      nav ul {
        display: flex;
        margin: 0;
        padding: 0;
      }

      nav ul li {
        display: inline-block;
        line-height: 80px;
        margin: 0 5px;
      }

      nav ul li a {
        position: relative;
        color: white;
        font-size: 17px;
        border-radius: 3px;
        text-transform: uppercase;
        padding: 7px 13px;
      }

      nav ul li a:before {
        position: absolute;
        content: "";
        left: 0;
        bottom: 0;
        height: 3px;
        width: 100%;
        background: lavender;
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.4s;
      }

      nav ul li a:hover:before {
        transform: scaleX(1);
        transform-origin: left;
      }

      li a:hover {
        background-color: hotpink;
      }

      .icon {
        display: flex;
        align-items: center;
      }

      .icon a {
        color: white;
        text-decoration: none;
      }

      .icon i {
        color: white;
      }

      .btn {
        background-color: palevioletred;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s;
        display: inline-block;
        text-align: center;
      }

      .btn:hover {
        background-color: deeppink;
      }

      .card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 25px;
        transition: transform 0.3s;
        text-align: center;
      }

      .card:hover {
        transform: scale(1.05);
      }

      .card img {
        width: 100%;
      }

      .card .body {
        padding: 13px;
      }

      .title {
        font-size: 20px;
        margin-top: 10px;
        color: rgb(165, 29, 97);
        text-align: center;
      }

      .text {
        font-size: 20px;
        margin: 10px 0;
        text-align: center;
      }

      .suits {
        text-align: center;
        color: black;
        font-size: 50px;
        text-decoration: underline;
        margin-top: 20px;
      }

      .container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
      }
      .cart-count {
            position: absolute;
            top: 10px;
            right: 10px;
            background: red;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
        }
    </style>
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
                <i class="fa fa-shopping-cart" style="font-size: 35px;"></i> </a>
                <?php if ($cart_count > 0) : ?>
            <span class="cart-count"><?php echo $cart_count; ?></span>
        <?php endif; ?>
        </div>
    </nav>
   
    <h1 class="suits">Suits</h1>

    <div class="container">
    <form action="add.php" method="POST" >
      <div class="card" style="width: 18rem">
        <img src="kids10.jpeg" class="card-img" alt="Black shirt paired with lining trouser">
        <div class="body">
          <p class="text">White shirt paired with black trouser.</p>
          <h5 class="title">PKR 2500</h5><br>
          <button type=submit class="btn" name="Add_to_Cart">Add to Cart</button>
          <input type="hidden" name="Name" value="White shirt paired with black trouser">
          <input type="hidden" name="PKR" value="2500">
          <input type="hidden" name="Image" value="kids10.jpeg">
       </div>
      </div>
      </form>
      <form action="add.php" method="POST">
      <div class="card" style="width: 18rem">
        <img src="kids11.jpg" class="card-img">
        <div class="body">
          <p class="text">Black shirt paired with lining trouser.</p>
          <h5 class="title">PKR 3000</h5><br>
          <button type=submit class="btn" name="Add_to_Cart">Add to Cart</button>
          <input type="hidden" name="id" value="2">
          <input type="hidden" name="Name" value="White shirt paired with lining trouser">
          <input type="hidden" name="PKR" value="3000">
          <input type="hidden" name="Image" value="kids11.jpg">
        </div>
      </div>
    </form>
    <form action="add.php" method="POST" >
      <div class="card" style="width: 18rem">
        <img src="red6.jpg" class="card-img">
        <div class="body">
          <p class="text">White shirt paired with sky trouser.</p>
          <h5 class="title">PKR 2800</h5><br>
          <button type=submit class="btn" name="Add_to_Cart">Add to Cart</button>
          <input type="hidden" name="id" value="3">
          <input type="hidden" name="Name" value="White shirt paired with sky trouser">
          <input type="hidden" name="PKR" value="2800">
          <input type="hidden" name="Image" value="red6.jpg">
        </div>
      </div>
    </form>
    </div>
  </body>
</html>

