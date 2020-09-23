<?php

session_start();


  if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = array();
  }

  $CartID = $_GET['id'];
  $CartQuantity = $_GET['quantity'];

  if (isset($_GET['id'])) {
    if (empty($_SESSION['cart'])) {
      array_push($_SESSION['cart'], array($CartID, $CartQuantity));
    }
    else {
      $newCart = true;

      for ($i = 0; $i < count($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i][0] == $CartID) {
          $_SESSION['cart'][$i][1]++;
          $newCart = false;
        }
      }
      if ($newCart) {
        array_push($_SESSION['cart'], array($CartID, $CartQuantity));
      }
    }
  }



?>


<html lang="en" dir="ltr">



  <head>




    <title>Shopping Cart</title>




    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="cartStyleSheet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>




  </head>



  <body>


    <?php

    //SERVER CONNECT

        $servername = "localhost:3306";
        $username = "*********";
        $password = "*********";
        $dbname = "cafe2_blogInformation";


        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //Array
        $productIDs = array();
        $titles = array();
        $prices = array();

        $sql = "SELECT * FROM productSpecifics ORDER BY productID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {

            $productIDs[] = $row["productID"];
            $titles[] = $row["title"];
            $prices[] = $row["price"];

          }
        }



        $conn->close();

        include '../../include/header/header.html';

    ?>




    <div class="container">

          <div class="row">

            <div class="col-lg-2">

            </div>

            <div id="formWrapper" class="col-lg-8">

              <div class="row">

                <img id="logo" src="../../img/chelseaJayLogoNoCircle.png" alt="Logo">

              </div>

              <div  id="desc" class="row">

                <h3>Shopping Cart</h3>

              </div>

              <?php

                if (! empty($_SESSION['cart'])) {

                  $_SESSION['total'] = 0;  

                  $key = array();

                  for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                    $key[$i] = array_search($_SESSION['cart'][$i][0], $productIDs);
                  }



                  for ($i = 0; $i < count($key); $i++) {

                    if ($key[$i] != $key[count($key) - 1]) {
                      $borderStyle = "border-bottom: 1px solid black;";
                    } else {
                      $borderStyle = "border-bottom: 0px; margin-bottom: 30px;";
                    }

                    $_SESSION['total'] = $_SESSION['total'] + $prices[$key[$i]];
              ?>

                          <div class="shoppingCartContainer row" style="<?php echo $borderStyle; ?>">

                            <div class="col-3">
                            </div>

                            <div class="col-md-4">
                              <p><?php echo $titles[$key[$i]]; ?></p>
                            </div>

                            <div class="col-md-1">
                              <p>x<?php echo $_SESSION['cart'][$i][1]; ?></p>
                            </div>

                            <div class="col-md-1">
                              <p>$<?php echo $prices[$key[$i]]; ?></p>
                            </div>

                            <div class="col-3">
                            </div>

                          </div>

              <?php
                  }
                }
                else {
                  echo "It's empty";
                }
              ?>

              <div class="row">

                <a class="button" href="../details/personalDetails.php">Checkout</a>

              </div>

            </div>

            <div class="col-lg-2">

            </div>

          </div>

    </div>

    <?php
      include '../../include/footer/footer.html';
    ?>



  </body>


</html>
