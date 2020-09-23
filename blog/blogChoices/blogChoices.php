

<html lang="en" dir="ltr">





  <head>


    <title>Chelsea Jay Blogs</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="blogChoicesStyleSheet.css?v=<?php echo time(); ?>">
    <!--<link rel="stylesheet" type="text/css" href="blogChoicesStyleSheet.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">


    <!-- jQuery Popper Bootstrap javascript -->
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
        $blogID = array();
        $titles = array();
        $directorys = array();
        $imgDirectorys = array();
        $blogTexts = array();

        $sql = "SELECT * FROM blogSpecifics ORDER BY blogID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

          $blogID[] = $row["blogID"];
          $titles[] = $row["title"];
          $directorys[] = $row["directory"];
          $imgDirectorys[] = $row["imgDirectory"];
          $blogTexts[] = $row["blogText"];

        }
        } else {
            echo "0 results";
        }

        $conn->close();

    ?>


    <?php
      include '../../include/header/header.html';
    ?>



    <div id="recentContainer" class="jumbotron-fluid">


      <div class="container">
        <div class="row">

            <div id="recentDesc" class="col-lg-6">

              <h2><?php echo end($titles); ?></h2>

              <p><?php echo implode(' ', array_slice(explode(' ', $blogTexts[count($blogTexts) - 1]), 0, 60)) . "..."; ?></p>

              <a href="../blogPosts/blogTemplate.php?id=<?php echo end($blogID); ?>">Read more -></a>

              <div class="horizontalStick slideRight">

              </div>

              <div id="shortyStick" class="horizontalStick slideRight">

              </div>

            </div>

            <div class="col-lg-6">
              <div class="hovereffect">
                  <a href="../blogPosts/blogTemplate.php?id=<?php echo end($blogID); ?>">
                    <img id="recentImg" src="<?php echo end($imgDirectorys); ?>" alt="recent blog post image">
                    <div class="overlay">
                        <h2><?php echo end($titles); ?></h2>
                    </div>
                  </a>
              </div>
            </div>

        </div>
      </div>
    </div>





    <div id="serperater" class="jumbotron-fluid">
      <div class="container">
        <div class="row blogPortfolio">


          <?php

            for ($i = (count($titles) - 2); $i > -1; $i--) {

          ?>


          <div class="col-xs-6 col-sm-6 col-lg-4">
            <div class="hovereffect">
                <a href="../blogPosts/blogTemplate.php?id=<?php echo $blogID[$i]; ?>">
                  <img class="blogImg" src="<?php echo $imgDirectorys[$i]; ?>" alt="blog post image">
                  <div class="overlay">
                      <h2><?php echo $titles[$i]; ?></h2>
                  </div>
                </a>
            </div>
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





  </body>






</html>
