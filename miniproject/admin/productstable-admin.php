<?php

require_once('../includes/dbh-inc.php');
require_once('includes/functions-admin-inc.php');

$result = display_product_table();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products table</title>
    <link rel="stylesheet" href="css/productstablecss.css">
    <script src="https://kit.fontawesome.com/89589cc083.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="css/sidebarcss.css">
</head>
<body>

    <div class="addproducts">
        <a href="productupload-admin.php" class="addproductstext">
            <div class="addproductsbutton">Add Products</div>
        </a>
    </div>
    <div class="title">
        <p>Products</p>
    </div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>SI No</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Specification</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                    while ($row = mysqli_fetch_assoc($result))
                    {

                ?>
                    <td><?php echo $row['pid'];?></td>
                    <td><?php echo $row['pName'];?></td>
                    <td><?php echo $row['pPrice'];?></td>
                    <td><?php echo $row['pDescription'];?></td>
                    <td><?php echo $row['pSpecification'];?></td>
                    <td><a href="includes/deleteproduct-inc.php id=<?php echo $row['pid']; ?>" class="button btndelete">Delete</a></td>
                </tr>

                <?php
                    }
                ?>

            </tbody>
        </table>
    </div>
</body>
</html>