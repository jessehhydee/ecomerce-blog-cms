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




    <title>Menu</title>




    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="cmsMenuStyleSheet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>



  </head>



  <body>



    <a id="back" href="../../index/dum/index.php">< <u>Back to website</u></a>



    <div class="container">

        <div class="formReplacement">

          <div class="row">

            <div class="col-lg-2">

            </div>

            <div id="formWrapper" class="col-lg-8">

              <div class="row">

                <img id="logo" src="../../img/chelseaJayLogoNoCircle.png" alt="Logo">

              </div>

              <div  id="desc" class="row">

                <h3>Menu</h3>

              </div>

              <div class="row">

                <div class="col-md-4">

                  <a href="../../products/createProduct/createProduct.php">
                    <button type="button" name="button">Create Product</button>
                  </a>

                </div>

                <div class="col-md-4">

                  <a href="../../products/removeProduct/removeProduct.php">
                    <button type="button" name="button">Remove Product</button>
                  </a>

                </div>

                <div class="col-md-4">

                  <a href="../viewEmail/marketing.php">
                    <button type="button" name="button">View Emails</button>
                  </a>

                </div>

              </div>

              <div class="row">

                <div class="col-md-4">

                  <a href="../../blog/createBlog/createBlog.php">
                    <button type="button" name="button">Create Blog</button>
                  </a>

                </div>

                <div class="col-md-4">

                  <a href="../../blog/removeBlog/removeBlog.php">
                    <button type="button" name="button">Remove Blog</button>
                  </a>

                </div>

                <div class="col-md-4">

                </div>

              </div>

            </div>

            <div class="col-lg-2">

            </div>

          </div>

        </div>

    </div>

  </body>


</html>

<?php
}
?>
