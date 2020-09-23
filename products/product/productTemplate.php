

<html lang="en" dir="ltr">



  <?php




  //SERVER CONNECT

      $servername = "localhost:3306";
      $username = "*********";
      $password = "*********";
      $dbname = "cafe2_blogInformation";

      $productID = $_GET['id'];


      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }


      $sql = "SELECT * FROM productSpecifics WHERE productID = $productID";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

          $title = $row["title"];
          $price = $row["price"];
          $imgCategory = $row["category"];
          $directory = $row["directory"];
          $imgDirectory = $row["imgDirectory"];
          $productText = $row["productText"];

        }
      }


      $conn->close();

  ?>



  <head>

    <title><?php echo $title; ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="productStyleSheet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script type="text/javascript">

      function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
      }

      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
      }

    </script>

  </head>





  <body>




    <?php
      include '../../include/header/header.html';
    ?>




    <div id="productContainer" class="jumbotron-fluid">

      <div class="container">

        <div class="row">

          <div class="col-md-6">

            <img src="<?php echo $imgDirectory; ?>" alt="Product Image">

          </div>

          <div id="productDesc" class="col-md-6">

            <div class="row">

              <h2><?php echo $title; ?></h2>

            </div>

            <div class="row">

              <p id="priceTag">Price: </p><h4>$<?php echo $price; ?></h4>

            </div>

            <div class="row">

              <p id="productText"><?php echo $productText; ?></p>

            </div>

            <div class="row">

              <a class="button" href="../productChoices/productChoices.php?get_category=all&id=<?php echo $productID; ?>&quantity=1">Add to Cart</a>

            </div>

            <div class="row">

              <a class="button" href="../../checkout/shoppingCart/cart.php?get_category=all&id=<?php echo $productID; ?>&quantity=1">Buy Now</a>

            </div>

          </div>

        </div>

      </div>

    </div>



    <?php
      include '../../include/footer/footer.html';
    ?>



  </body>





</html>
