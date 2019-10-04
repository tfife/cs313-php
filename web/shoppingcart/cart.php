<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
    <link rel="stylesheet" type="text/css" href="fife_store.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>View Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
</head>

<body>
    <?php
        if ($_SESSION[items]) {
            $items = $_SESSION[items];
            $prices = $_SESSION[prices];
            $quantities = $_SESSION[quantities];
        }
        else {
            $items = [];
            $prices = [];
            $quantities = [];
        }
    ?>
    <header>        
        <div class="title">
            View Cart
            <a href="browse.php" style="font-size: 12px; color: white; float: right">Click Here to return to Browse</a>
        </div>
    </header>
    <?php
        echo ("<div class='cart_item'><div>Item</div><div>Quantity</div><div>Individual Price</div><div>Combined Price</div></div>");
        for($i = 0; $i < sizeof($items); $i++) {
            $totalPrice = ($prices[i] * $quantities[i]);
            echo("<div class='cart_item'><div>" . $items[$i] . "</div><div>" . $quantities[$i] . "</div><div>$" . $prices[$i] . "</div><div>" . $totalPrice . "</div></div>");
        }
    ?>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>

    <footer>
        Website created by Tori Fife. 10/2019.
    </footer>
</body>

</html>