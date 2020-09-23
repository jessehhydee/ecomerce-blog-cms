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




    <title>Create Blog</title>




    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="createBlogStyleSheet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>



  </head>



  <body>


    <a href="../../cms/menu/cmsMenu.php"><img id="backArrow" src="../../img/arrowBack.png" alt="Back Arrow"></a>



    <div class="container">

      <form action="blogCreation.php" method="post" enctype="multipart/form-data">



          <div class="row">

            <div class="col-lg-2">

            </div>

            <div id="formWrapper" class="col-lg-8">

              <div class="row">

                <img id="logo" src="../../img/chelseaJayLogoNoCircle.png" alt="Logo">

              </div>

              <div  id="desc" class="row">

                <h3>Create Blog</h3>

              </div>

              <div class="row">

                <input type="text" name="blogTitle" id="blogTitle" placeholder="Blog title">

              </div>

              <div class="row">

                <textarea name="blogPostText" id="blogPostText" placeholder="Blog post text..." rows="8" cols="80"></textarea>

              </div>

              <div class="row">

                <br>
                Select image to upload (600x600)

              </div>

              <div class="row">

                <input type="file" name="largeImage" id="largeImage">

              </div>

              <div class="row">

                <br>
                Select image to upload (1260x500)

              </div>

              <div class="row">

                <input type="file" name="smallImage" id="smallImage">

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
