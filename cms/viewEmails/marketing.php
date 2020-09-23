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




    <title>Emails</title>




    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="marketingStyleSheet.css">
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


        $sql = "SELECT * FROM customers ORDER BY custID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {

            $name[] = $row["name"];
            $surname[] = $row["surname"];
            $email[] = $row["email"];

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

                <h3>Emails</h3>

              </div>

              <div class="row">

                <table>
                  <tr>
                    <th>First Name</th>
                    <th>Surname</th>
                    <th class="emailC">Email</th>
                  </tr>

                  <?php
                    for ($i = 0; $i < count($name); $i++) {
                  ?>

                      <tr>
                        <td><?php echo $name[$i]; ?></td>
                        <td><?php echo $surname[$i]; ?></td>
                        <td class="emailC"><?php echo $email[$i]; ?></td>
                      </tr>

                  <?php
                    }
                  ?>
                </table>

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
