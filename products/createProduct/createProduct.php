<?php
session_start();

if($_SESSION["logged"] != 1) {
    echo("Sod off stranger!");
    exit();
}
else {
?>




<html lang="en" dir="ltr">



  <head>




    <title>Create Product</title>




    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="createProductStyleSheet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

    <script type="text/javascript">

      function showCategory() {

        var appear = document.getElementById("newCategory");
        var text = document.getElementById("newCatLink");

        if(appear.style.display == 'block') {
           appear.style.display = 'none';
           appear.value = "";
           text.innerHTML = "Create new category";
        }
        else {
           appear.style.display = 'block';
           text.innerHTML = "Close new category";
        }
      }

      function checkSelect() {

        var appear = document.getElementById("newCategory");

        if(category != 0) {
          var popup = confirm("Your new category is being selected, not your dropdown selection. Confirm?");
          if (popup == true) {
            document.getElementById("category").value = 0;
          } else {
            appear.value = "";
            appear.style.display = 'none';
          }
        }

      }

      function checkNewCat() {

        var appear = document.getElementById("newCategory");

        if(appear.value != "") {
          var popup = confirm("Your new category is being selected, not your dropdown selection. Confirm?");
          if (popup == true) {
            document.getElementById("category").value = 0;
          } else {
            appear.value = "";
            appear.style.display = 'none';
          }
        }

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
        $categorys = array();

        $sql = "SELECT * FROM category ORDER BY categoryID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {

            $categorys[] = $row["name"];

          }
        }
        else {
            echo "0 results";
        }

        $conn->close();

    ?>



    <a href="../../cms/menu/cmsMenu.php"><img id="backArrow" src="../../img/arrowBack.png" alt="Back Arrow"></a>



    <div class="container">

      <form action="productCreation.php" method="post" enctype="multipart/form-data">



          <div class="row">

            <div class="col-lg-2">

            </div>

            <div id="formWrapper" class="col-lg-8">

              <div class="row">

                <img id="logo" src="../../img/chelseaJayLogoNoCircle.png" alt="Logo">

              </div>

              <div  id="desc" class="row">

                <h3>Create Product</h3>

              </div>

              <div class="row">

                <input type="text" name="productTitle" id="productTitle" placeholder="Product title">

              </div>

              <div class="row">

                <input type="text" name="productPrice" id="productPrice" placeholder="Product price">

              </div>

              <div class="row">

                <select class="form-control" id="category" name="category" onchange="checkNewCat()">
                  <option value="0" selected="true" disabled>Select category</option>
                  <?php
                    for ($i = 0; $i < count($categorys); $i++) {
                  ?>

                      <option value="<?php echo $categorys[$i]; ?>"><?php echo $categorys[$i]; ?></option>

                  <?php
                    }
                  ?>
                </select>

              </div>

              <div class="row">

                <a href="javascript:void(0);" onclick="showCategory()"><p id="newCatLink">Create new category</p></a>

              </div>

              <div class="row">

                <input type="text" name="newCategory" id="newCategory" placeholder="New category" onchange="checkSelect()">

              </div>

              <div class="row">

                <textarea name="productText" id="productText" placeholder="Product description..." rows="8" cols="80"></textarea>

              </div>

              <div class="row">

                <br>
                Select image to upload (1500x1500)

              </div>

              <div class="row">

                <input type="file" name="image" id="image">

              </div>

              <div class="row">

                <input type="submit" value="Upload" name="submit">

              </div>

            </div>

            <div class="col-lg-2">

            </div>

          </div>



      </form>

    </div>

  </body>


</html>

<?php
}
?>
