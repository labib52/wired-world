<?php

session_start();

class Product {
    public $id;
    public $name;
    public $price;

    public function __construct($id, $name, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }
}

class Cart {
    public static function getItems() {
        return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    }

    public static function addItem($product) {
        $_SESSION['cart'][] = $product;
    }
}

// Handle adding product to cart
if (isset($_GET['id']) && isset($_GET['name']) && isset($_GET['price'])) {
    $product = new Product($_GET['id'], $_GET['name'], $_GET['price']);
    Cart::addItem($product);
    header('Location: shopping.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Shopping Cart</title>
</head>
<body>
    <h1>Professional Shopping Cart</h1>

    <?php
    // Check if the cart is empty
    $cartItems = Cart::getItems();
    if (empty($cartItems)) {
        echo '<p>Your cart is empty.</p>';
    } else {
        echo '<h2>Cart Items</h2>';
        echo '<ul>';
        foreach ($cartItems as $item) {
            echo '<li>' . $item->name . ' - $' . $item->price . '</li>';
        }
        echo '</ul>';
    }
    ?>

    <h2>Available Products</h2>
    <ul>
        <li><a href="shopping.php?id=1&name=Product+1&price=10">Product 1 - $10</a></li>
        <li><a href="shopping.php?id=2&name=Product+2&price=20">Product 2 - $20</a></li>
        <li><a href="shopping.php?id=3&name=Product+3&price=30">Product 3 - $30</a></li>
    </ul>
</body>
</html>
