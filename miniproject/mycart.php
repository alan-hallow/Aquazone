<?php

include "includes/mycart-inc.php";


?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel='stylesheet' type='text/css' media='screen' href='css/mycartcss.css'>
<title>My Cart</title>

</head>
<body>

<?php
include "header.php";
?>
<div class="headingcart">
  <h1>Your Cart</h1>

</div>


<?php
    if (empty($cart_items)) {
        echo '<p class="cartempty">Your cart is empty, Please add some products.</p>';
    } else {
        foreach ($cart_items as $cart_item) {
            $productData = $cart_item['productData'];
            echo '<div class="container">';
            echo '<div class="cart-item">';
            echo '<img src="images/' . $productData['image_one'] . '" alt="' . $productData['pName'] . '">';
            echo '<div class="cart-item-details">';
            echo '<div class="cart-item-title">' . $productData['pName'] . '</div>';
            echo '<div class="cart-item-price">$' . $productData['pPrice'] . '</div>';
            echo '<div class="cart-item-quantity">Quantity: ' . $cart_item['quantity'] . '</div>';
            ?>
            <a href="includes/deletefromcart-inc.php?id=<?php echo $cart_item['cartID']; ?>" class="button btndelete" onclick="return confirm('Are you sure you want to delete this item from your cart?')">Remove Item</a>
            <?php
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
?>



  

</div>
<?php

include "footer.php";
?>
<!-- 
<script src="js/mycartjs.js"></script> -->
</body>
</html>
