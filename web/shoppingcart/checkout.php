<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
    <link rel="stylesheet" type="text/css" href="fife_store.css">
    <meta charset="UTF-8">
    <title>Checkout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body background="images/triangles.jpg">
    <header>
        Checkout
        <div></div>
    </header>

    <?php
        // define variables and set to empty values
        $addr1Err = $cityErr = $stateErr = $ZipErr = $nameErr = "";
        $name = $addr1 = $addr2 = $city = $state = $zip = "";
        $good = true;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nameErr = "Name is required";
                $_SESSION[name] = "";
                $good = false;
            } else {
                $_SESSION[name] = test_input($_POST["name"]);
            }

            if (empty($_POST["addr1"])) {
                $addr1Err = "Address Line is required";
                $_SESSION[addr1] = "";
                $good=false;
            } else {
                $_SESSION[addr1] = test_input($_POST["addr1"]);
            }

            if (empty($_POST["addr2"])) {
                $addr2 = "";
                $_SESSION[addr2] = "";
              } else {
                $_SESSION[addr2] = test_input($_POST["addr2"]);
              }

            if (empty($_POST["city"])) {
                $cityErr = "City is required";
                $_SESSION[city] = "";
                $good = false;
            } else {
                $_SESSION[city] = test_input($_POST["city"]);
            }

            if (empty($_POST["state"])) {
                $stateErr = "State is required";
                $_SESSION[state] = "";
                $good = false;
            } else {
                $_SESSION[state] = test_input($_POST["state"]);
            }

            if (empty($_POST["zip"])) {
                $ZipErr = "Zip Code is required";
                $_SESSION[zip] = "";
                $good = false;
            } else {
                $_SESSION[zip] = test_input($_POST["zip"]);
            }

            if ($good == true) {
                header("Location: confirmation.php/");
            }
        }
      
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
    <div class="bodyBox" style="text-align: left; padding: 20px">
        <h2>Add Address Information</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Name: <br><input type="text" name="name" value="<?php echo $_SESSION[name];?>"><span class="error">* <?php echo $nameErr;?></span><br>
            Address Line 1<br><input type="text" name="addr1" value="<?php echo $_SESSION[addr1];?>"><span class="error">* <?php echo $addr1Err;?></span><br>
            Address Line 2<br><input type="text" name="addr2" value="<?php echo $_SESSION[addr2];?>"><br>
            City:<br><input type="text" name="city" value="<?php echo $_SESSION[city];?>"><span class="error">* <?php echo $cityErr;?></span><br>   
            State:<br><input type="text" name="state" value="<?php echo $_SESSION[state];?>"><span class="error">* <?php echo $stateErr;?></span><br>
            Zip:<br><input type="text" name="zip" value="<?php echo $_SESSION[zip];?>"><span class="error">* <?php echo $ZipErr;?></span><br>
            <button type="submit" name="submit">Place Order</button>
        </form>
        <a href="cart.php"><button>Return to Cart</button></a>
    </div>

    <footer>
        Website created by Tori Fife. 10/2019.
    </footer>
</body>

</html>