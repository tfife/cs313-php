<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
    <link rel="stylesheet" type="text/css" href="fife_store.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <title>Browse Items</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
</head>

<body>
    <?php
        echo "<script>";
        if ($_SESSION[items]) {
            echo("var items = ['" . implode("', '",$_SESSION[items]) . "']; var prices = ["
             . implode(", ",$_SESSION[prices]) . "]; var quantities = [" . implode(", ",$_SESSION[quantities]) . "];");
        }
        else {
            echo("var items = []; var prices = []; var quantities = [];");
        }
        echo "</script>";
    ?>
    <header>
        <div class="title">
            STuff to bUy
            <a href="cart.php"><img onclick="viewCart()" src="cart_icon.png" style="height: 40px; width: auto; float: right" alt="cart"></a>
            <div style= "color: white; font-size: 20px">(<?php echo(0); ?>)</div>
        </div>
    </header>

    <div class="bodyBox">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Item</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
        <?php
            $products = array("Soap"=>5.60, "Pet Lemur"=>76.99, "Piano"=>499.04, "Bottled Water"=>0.89);

            foreach($products as $p => $p_val) {
                echo("<tr><th scope='row'>" . $p . " </th><td>$" . $p_val 
                . " </td><td><button onclick='addCart(\"$p\", $p_val)'> Add to cart</button></td></tr>");
            }
        ?>
        </tbody>
        </table>
    </div>


    <footer>
        Website created by Tori Fife. 10/2019.
    </footer>
</body>

<script>

    function addCart(item, price) {
        var isdone = false;
        for (i = 0; i < items.length; i++) {
            if (item == items[i]) {
                quantities[i] += 1;
                isdone = true;
            }
        }
        if (isdone == false) {
            items.push(item);
            prices.push(price);
            quantities.push(1);
        }

        var cart = {};
        cart.items = items;
        cart.prices = prices;
        cart.quantities = quantities;

        $.ajax({
            url: "add_item.php",
            data: cart,
            type: 'post'
        });
    }
</script>

</html>