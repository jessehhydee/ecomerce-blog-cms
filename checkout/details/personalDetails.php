<?php
session_start();
?>




<html lang="en" dir="ltr">





  <head>



    <title>Order Details</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="personalDetailsStyleSheet.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

    <!-- jQuery Popper Bootstrap javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>



    <script>

      function mergeExDate() {
        var expireMM = document.getElementById("expireMM").value;
        var expireYY = document.getElementById("expireYY").value;
        var expiry = (expireYY + "/" + expireMM);
        document.getElementById("expiry").value = expiry;
      }

    </script>



  </head>





  <body>



    <?php
      include '../../include/header/header.html';
    ?>



    <div id="formSectionBackground" class="container-fluid">

      <!--<form action="http://sit.robertclarkson.net/submission.php" method="post" id="form" name="form" >-->
      <form action="../success/completed.php" method="post" id="form" name="form" >


            <div class="row">

              <div class="col-lg-6 formContainer m-2">

                    <div class="form-group">


                      <div class="formSection">




                          <!--  <input type="hidden" name="product" id="tallyHeaderForm"/>

                            <input type="hidden" name="members" id="qtyForm"/>

                            <input type="hidden" name="days" id="daysForm"/>

                            <input type="hidden" name="total" id="totalForm"/>

                            <input type="hidden" name="dates" id="datesForm"/>

                            <input type="hidden" name="food" id="foodForm"/>

                            <input type="hidden" name="diet" id="dietForm"/>

                            <input type="hidden" name="medical" id="medicalForm"/> -->







                            First name:<br>
                            <input id="firstname" type="text" name="firstname" required>
                            <br>

                            Surname:<br>
                            <input id="surname" type="text" name="surname" required>
                            <br>

                            <label for="gender">Gender:</label><br>
                              <select class="form-control" id="gender" name="gender" required>
                                <option>Please select</option>
                                <option>Male</option>
                                <option>Female</option>
                              </select>
                            <br>

                            <label for="dob">D.O.B:</label>
                            <input id="dob" type="date" name="D.O.B" required>
                            <br>

                            Email:<br>
                            <input id="email" type="text" name="email" required>



                      </div>




                      <div class="formSection">


                            Street Address:<br>
                            <input type="text" name="address">
                            <br>

                            City/Town:<br>
                            <input type="text" name="city/town">
                            <br>

                            Postal Code:<br>
                            <input type="text" name="postCode">
                            <br>

                            Country:<br>
                            <input type="text" name="country">


                      </div>






                    </div>



              </div>

              <div class="col-lg-5 formContainer m-2 ml-auto">

                <div id="paymentSection" class="formSection">


                      <h5>Payment Checkout</h5>

                      <div class="borderLine"></div>

                      <br><br>

                      <h2 id="total">$<?php echo $_SESSION['total']; ?></h2>


                </div>


                <div class="formSection">

                      <h5>Credit Card Payment</h5>

                      <div class="borderLine"></div>
                      <br><br>

                      Card Number:<br>
                      <input type="text" name="cardNum" required>
                      <br><br>

                      Name On Card:<br>
                      <input type="text" name="cardName" required>
                      <br><br>

                      Expiry Date:<br>
                      <select name='expireMM' id='expireMM' required>
                          <option value=''>Month</option>
                          <option value='01'>January</option>
                          <option value='02'>February</option>
                          <option value='03'>March</option>
                          <option value='04'>April</option>
                          <option value='05'>May</option>
                          <option value='06'>June</option>
                          <option value='07'>July</option>
                          <option value='08'>August</option>
                          <option value='09'>September</option>
                          <option value='10'>October</option>
                          <option value='11'>November</option>
                          <option value='12'>December</option>
                      </select>
                      <select name='expireYY' id='expireYY' onchange="mergeExDate()" required>
                          <option value=''>Year</option>
                          <option value='01'>2019</option>
                          <option value='02'>2020</option>
                          <option value='03'>2021</option>
                          <option value='04'>2022</option>
                          <option value='05'>2023</option>
                          <option value='06'>2024</option>
                          <option value='07'>2025</option>
                          <option value='08'>2026</option>
                      </select>
                      <input class="inputCard" type="hidden" name="expiry" id="expiry" required/>
                      <br><br>

                      CVC:<br>
                      <input type="text" name="cvc" required>




                </div>

                <input id="submitSitBottom" type="submit" value="Continue">


              </div>

            </div>

        </form>


    </div>




    <?php
      include '../../include/footer/footer.html';
    ?>





  </body>








</html>
