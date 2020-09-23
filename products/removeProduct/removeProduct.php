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




    <title>Remove Product</title>




    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="removeProductStyleSheet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>



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

        $sql = "SELECT * FROM productSpecifics ORDER BY productID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {

            $productTitles[] = $row["title"];

          }
        }
        else {
            echo "0 results";
        }

        $conn->close();

    ?>






    <a href="../../cms/menu/cmsMenu.php"><img id="backArrow" src="../../img/arrowBack.png" alt="Back Arrow"></a>



    <div class="container">

      <form action="productGone.php" method="post" enctype="multipart/form-data">



          <div class="row">

            <div class="col-lg-2">

            </div>

            <div id="formWrapper" class="col-lg-8">

              <div class="row">

                <img id="logo" src="../../img/chelseaJayLogoNoCircle.png" alt="Logo">

              </div>

              <div  id="desc" class="row">

                <h3>Remove Product</h3>

              </div>

              <div class="row">

                <select class="form-control" id="titles" name="titles">
                  <option value="0" selected="true" disabled>Select category</option>
                  <?php
                    for ($i = 0; $i < count($productTitles); $i++) {
                  ?>

                      <option value="<?php echo $productTitles[$i]; ?>"><?php echo $productTitles[$i]; ?></option>

                  <?php
                    }
                  ?>
                </select>

              </div>

              <div class="row">

                <input type="submit" value="Remove" name="submit">

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
