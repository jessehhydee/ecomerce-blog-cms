<?php
session_start();
session_destroy();

$name = $_POST['firstname'];
$surname = $_POST['surname'];
$email = $_POST['email'];




//SERVER CONNECT

$servername = "localhost:3306";
$username = "*********";
$password = "*********";
$dbname = "cafe2_blogInformation";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//DATABASE INPUT


$sql = "INSERT INTO customers (name, surname, email)
VALUES ('$name', '$surname', '$email')";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error deleting record: " . $conn->error;
}


$conn->close();



?>






<html lang="en" dir="ltr">



  <head>




    <title>Order Completion</title>




    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="completedStyleSheet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>



  </head>



  <body>


    <?php
      include '../../include/header/header.html';
    ?>


    <div class="container">

        <div class="formReplacement">

          <div class="row">

            <div class="col-lg-2">

            </div>

            <div id="formWrapper" class="col-lg-8">

              <div class="row">

                <img id="logo" src="../../img/chelseaJayLogoNoCircle.png" alt="Logo">

              </div>

              <div class="row desc">

                <h3>All Done!</h3>

              </div>

              <div class="row desc">

                <p>Thanks <?php echo $name; ?>. We will process your order as soon as possible. Expect a 3-5 business day wait.</p>

              </div>

              <div class="row">

                <a id="back" href="../../index/dum/index.php">< <u>Back to website</u></a>

              </div>

            </div>

            <div class="col-lg-2">

            </div>

          </div>

        </div>

    </div>

    <?php
      include '../../include/footer/footer.html';
    ?>

  </body>


</html>
