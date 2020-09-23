
<?php




$productTitle = $_POST['productTitle'];
$productPrice = $_POST['productPrice'];
$droptdownCategory = $_POST['category'];
$productNewCategory = $_POST['newCategory'];
$productText = nl2br($_POST['productText']);
$image = $_FILES["image"]["name"];
$imagePath = "img/".$image;

if (empty($productNewCategory)) {
  $productCategory = $droptdownCategory;
}
else {
  $productCategory = $productNewCategory;
}


//UPLOADING IMAGES TO CORRECT DESTINATIONS


$target_path = "../productChoices/img/";
$target_path = $target_path . basename($_FILES['image']['name']);


$target_path1 = "../product/img/";
$target_path1 = $target_path1 . basename($_FILES['image']['name']);


  if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
    throw new Exception('Could not move file');
  }
  if(!copy ( $target_path , $target_path1 )) {
    throw new Exception('Could not move 2nd file');
  }



//SERVER CONNECT

$servername = "localhost:3306";
$username = "*********";
$password = "*********";
$dbname = "cafe2_blogInformation";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



//category TABLE INPUT

if (!empty($productNewCategory)) {

  $categorysql = "INSERT INTO category (name)
  VALUES ('$productNewCategory')";


  if ($conn->query($categorysql) === TRUE) {


      echo 'Category Table all sorted bro';


  } else {
      echo "Error: " . $categorysql . "<br>" . $conn->error;
  }


}


//productSpecifics TABLE INPUT


$sql = "INSERT INTO productSpecifics (title, price, category, imgDirectory, productText)
VALUES ('$productTitle', '$productPrice', '$productCategory', '$imagePath', '$productText')";

if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'> document.location = '../productChoices/productChoices.php?get_category=all'; </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();












?>
