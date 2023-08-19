<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Add Products</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>


    <link rel='stylesheet' type='text/css' media='screen' href='css/productuploadcss.css'>



    
</head>
<body>


    <div class="container">

        <div class="addproductstitle">
            <p>Add Products</p>
        </div>

        <form id="form" class="form" action="includes/productupload-inc.php" method="post" name="addproduct" enctype="multipart/form-data">

            <div class="form-control">
                <label for="title" class="title">Product Name</label>
                <input type="text" name="productName" placeholder="Product name" id="name" />
            </div>

            <div class="form-control">
                <label for="title" class="title">Description</label>
                <textarea id="address" rows="5" max-rows="10" name="description" placeholder="Description of the product"></textarea>

            </div>


            <div class="form-control">
                <label for="title" class="title">Price</label>
                <input type="number" name="price" placeholder="$999" id="postal" />
            </div>

            <div class="form-control">
                <label for="title" class="title">Specification</label>
                <textarea id="specification" rows="5" max-rows="10" name="specification" placeholder="Specifications of the product"></textarea>
            </div>

            <div class="addimages">


                <div class="form-control add-images">
                    <label for="title" class="title">Add first image</label>
                    <div class="productimage productimageone">
                    <input type="file" accept="image/png, image/jpeg, image/jpg" name="image1" id="addimage">
                    </div>
                </div>

                <div class="form-control add-images">
                    <label for="title" class="title">Add second image</label>
                    <div class="productimage productimagetwo">
                    <input type="file" accept="image/png, image/jpeg, image/jpg" name="image2" id="addimage">
                    </div>
                </div>

                <div class="form-control add-images">
                    <label for="title" class="title">Add third image</label>
                    <div class="productimage productimagethree">
                    <input type="file" accept="image/png, image/jpeg, image/jpg" name="image3" id="addimage">
                    </div>
                </div>

                <div class="form-control add-images">
                    <label for="title" class="title">Add fourth image</label>
                    <div class="productimage productimagefour">
                    <input type="file" accept="image/png, image/jpeg, image/jpg" name="image4" id="addimage">
                    </div>
                </div>

                
            </div>

            <div class="submitbuttons">
                <button class="clearall" type="reset">Clear All</button>

                <button type="submit" name="submit" id="submit" class="submitbutton">Add item</button>
            </div>
        </form>



    </div>

    
    <?php 

    if (isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput"){
            echo "<p class='errors'>Fill in all fields</p>";

        }
        
        elseif($_GET["error"] == "stmtfailed"){
            echo "<p class='errors'>Something went wrong!</p>";

        }

        elseif($_GET["error"] == "none"){
            echo "<p class='errors'>file uploaded successfully</p>";

        }
    }


    ?>

</body>
</html>