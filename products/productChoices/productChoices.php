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


    <title>Chelsea Jay Products</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="productChoicesStyleSheet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">


    <!-- jQuery Popper Bootstrap javascript -->
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

      function catChange() {
        var c = document.getElementById("category").value;
        var words = c.split(" ");
        var classNames = words.join(", .");
        classNames = "." + classNames;

        $(".all").css( "display", "none" );
        $(classNames).css( "display" , "inline-block" );
      }

    </script>




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
        $categorys = array();
        $directorys = array();
        $imgDirectorys = array();
        $blogTexts = array();

        $sql = "SELECT * FROM productSpecifics ORDER BY productID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {

            $productIDs[] = $row["productID"];
            $titles[] = $row["title"];
            $prices[] = $row["price"];
            $imgCategorys[] = $row["category"];
            $directorys[] = $row["directory"];
            $imgDirectorys[] = $row["imgDirectory"];
            $productTexts[] = $row["productText"];

          }
        }





        //Array
        $dropDownCategorys = array();

        $categorysql = "SELECT * FROM category ORDER BY categoryID";
        $categoryResult = $conn->query($categorysql);

        if ($categoryResult->num_rows > 0) {
          // output data of each row
          while($categoryRow = $categoryResult->fetch_assoc()) {

            $dropDownCategorys[] = $categoryRow["name"];

          }
        }



        $conn->close();


        include '../../include/header/header.html';
    ?>






    <div id="productContainer" class="jumbotron-fluid">
      <div class="container">



        <?php

          if (! empty($_SESSION['cart'])) {

            $key = array();

            for ($i = 0; $i < count($_SESSION['cart']); $i++) {
              $key[$i] = array_search($_SESSION['cart'][$i][0], $productIDs);
            }

        ?>

            <div class="shoppingCartTitleContainer row">
              <h4 id="cartTitle">Shopping Cart</h4>
            </div>

        <?php
            for ($i = 0; $i < count($key); $i++) {
              //NOT WORKING
              if ($key[$i] != $key[count($key) - 1]) {
                $borderStyle = "border-bottom: 1px solid black;";
              } else {
                $borderStyle = "border-bottom: 0px; margin-bottom: 30px;";
              }
              //END
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
        ?>






        <div class="row">

          <div class="col-sm-5 col-md-6 col-lg-8">

          </div>

          <div id="catGrid" class="col-sm-7 col-md-6 col-lg-4">

            <label for="category">Category</label>

            <select id="category" name="category" onchange="catChange(this)">
              <option value="all" selected="true">All</option>
              <?php
                for ($i = 0; $i < count($dropDownCategorys); $i++) {
              ?>

                  <option value="<?php echo $dropDownCategorys[$i]; ?>"><?php echo $dropDownCategorys[$i]; ?></option>

              <?php
                }
              ?>
            </select>

          </div>

        </div>






        <div class="row productDisplay">

          <?php

            for ($i = (count($titles) - 1); $i > -1; $i--) {

          ?>

            <div class="<?php echo $imgCategorys[$i]; ?> all col-xs-6 col-sm-6 col-md-6 col-lg-3">

              <a href="../product/productTemplate.php?id=<?php echo $productIDs[$i]; ?>">

                <div class="row">

                  <div class="col-1">

                  </div>

                  <div class="col-10">

                    <img src="<?php echo $imgDirectorys[$i]; ?>" alt="<?php echo $titles[$i] . 'Image'; ?>">

                  </div>

                  <div class="col-1">

                  </div>

                </div>

                <div class="row">

                  <div class="col-1">

                  </div>

                  <div class="col-10">

                    <h6><?php echo $titles[$i]; ?></h6>

                  </div>

                  <div class="col-1">

                  </div>

                </div>

                <div class="row">
                  <p><?php echo $prices[$i]; ?></p>
                </div>

              </a>

            </div>

          <?php

            }

          ?>

        </div>
      </div>
    </div>






    <?php
      include '../../include/footer/footer.html';
    ?>

    <script type="text/javascript">

    function loadedCat() {
      var params = new URLSearchParams(document.location.search.substring(1));
      var get_category = params.get("get_category");

      document.getElementById("category").value = get_category;
      var c = document.getElementById("category").value;
      var words = c.split(" ");
      var classNames = words.join(", .");
      classNames = "." + classNames;

      $(".all").css( "display", "none" );
      $(classNames).css( "display" , "inline-block" );
    }

    window.onload = loadedCat();

    </script>


  </body>





</html>
