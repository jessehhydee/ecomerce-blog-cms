<?php
session_start();


$username = $_POST['username'];
$password = $_POST['password'];


//SERVER CONNECT

$servername = "localhost:3306";
$user = "*********";
$passw = "*********";
$dbname = "cafe2_blogInformation";

$conn = new mysqli($servername, $user, $passw, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM login";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $dbUsername = $row['username'];
    $dbPassword = $row['password'];
  }
}




if (($dbUsername == $username) && ($dbPassword == $password)) {
    $_SESSION['logged'] = 1;
    header("Location: https://www.custombased.com/Jesse/chelseaJay/cms/menu/cmsMenu.php");
} else {
    header("Location: https://www.custombased.com/Jesse/chelseaJay/cms/login/cmsLogin.html?failed=1");
}


$conn->close();



?>
