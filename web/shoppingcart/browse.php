<!DOCTYPE html>
<html lang="en-us">

<head>
    <link rel="stylesheet" type="text/css" href="fife_store.css">
    <meta charset="UTF-8">
    <title>Browse Items</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
</head>

<body background="images/triangles.jpg">
    <header>
        <?php include ("navbar_gen.php"); ?>
    </header>


    <div class="title">STuff to bUy</div>
    <?php
        $products = array("Soap"=>5.60, "Pet Lemur"=>76.99, "Piano"=>499.04, "Bottled Water"=>0.89);

        foreach($products as $p => $p_val) {
            echo("<div class='bodyBox' style='display: inline'><div class='product'><div>" . $p . "</div><div>" . $p_val . "</div><button>Add to cart</button></div></div>");
        }
    ?>



    <footer>
        Website created by Tori Fife. 10/2019.
    </footer>
</body>

</html>