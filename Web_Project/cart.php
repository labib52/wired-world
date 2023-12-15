<?php
session_start();

// Include the database connection
include_once "includes/dbh.inc.php";

// Handle adding items to the cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];

    // Retrieve product details from the database
    $sql = "SELECT * FROM products WHERE ID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $product_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Initialize cart if not exists
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Add product details to the cart
        $_SESSION['cart'][] = array(
            'ID' => $product_id,
            'title' => $row['title'],
            'description' => $row['description'],
            'price' => $row['price'],
            'prod_image' => $row['prod_image'],
            'category' => $row['category']
        );
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reda's Eatery - Cart</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" href="./Css/cart.css" />
    <!-- Add your additional stylesheets here -->
</head>

<body>

    <header>
        <h1>Reda's Eatery - My Cart</h1>
    </header>

    <main>

        <?php if (empty($_SESSION['cart'])) : ?>
            <div class="empty-cart-message">Your cart is empty.</div>
        <?php else : ?>
            <table>
                <?php foreach ($_SESSION['cart'] as $key => $item) : ?>
                    <div class="product">
                        <img src="<?= $item['prod_image']; ?>" alt="<?= $item['title']; ?>">
                        <div class="design">
                            <h5><?= $item['title']; ?></h5>
                            <h6><?= $item['description']; ?></h6>
                            <h6><?= $item['price']; ?></h6>
                            <form method="post" action="remove_item.php">
                                <input type="hidden" name="item_index" value="<?= $key; ?>">
                                <button type="submit" class="btn" name="remove_from_cart">Remove <i class="fa fa-remove"></i></button>
                            </form>
                            <form method="post" action="wishlist.php">
                                <input type="hidden" name="product_id" value="<?= $item['ID']; ?>">
                                <button type="submit" class="btn" name="move_to_wishlist">Move to Wishlist <i class="fa fa-heart"></i></button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </table>
            <div class="checkout-btn">
                <button><a href="checkout.php">Checkout</a></button>
            </div>
        <?php endif; ?>

    </main>

</body>

</html>
