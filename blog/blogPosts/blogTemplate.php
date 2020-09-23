
<!DOCTYPE html>


<?php




//SERVER CONNECT

    $servername = "localhost:3306";
    $username = "*********";
    $password = "*********";
    $dbname = "cafe2_blogInformation";

    $blogID = $_GET['id'];


    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM blogSpecifics WHERE blogID = $blogID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {

        $title = $row["title"];
        $text = $row["blogText"];
        $imgDirectory = $row["largeImgDirectory"];

      }
    }


    $conn->close();

?>


<html lang="en" dir="ltr">





  <head>


    <title><?php echo $title; ?></title>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="blogStyleSheet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <script type="text/javascript">

      function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
      }

      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
      }

    </script>


    <style media="screen">
      #headerImgContainer {
        background-image: url("<?php echo $imgDirectory; ?>");
      }
    </style>



  </head>





  <body>

    <?php
      include '../../include/header/header.html';
    ?>



    <div id="headerImgContainer">

      <div id="blackLayerContainer">

        <div class="row">

          <h1 id="blogTitleH1"><?php echo $title; ?></h1>

        </div>

      </div>

    </div>





    <div id="blogPostContainer" class="jumbotron-fluid">

      <div class="container">

        <div class="row">

          <div class="col-md-3">

            <div id="stickyStickWrapper" class="row">

              <div class="col-4">

                <div id="longStick">

                </div>

              </div>

              <div class="col-4">


              </div>

              <div class="col-4">

                <div id="shortStick">

                </div>

              </div>

            </div>

          </div>

          <div class="col-md-9">

            <p><?php echo $text; ?></p>

          </div>

        </div>

      </div>

    </div>


    <?php
      include '../../include/footer/footer.html';
    ?>



  </body>





</html>
