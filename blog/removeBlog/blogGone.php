
<?php




$blogTitle = $_POST['titles'];


//SERVER CONNECT

$servername = "localhost:3306";
$username = "*********";
$password = "*********";
$dbname = "cafe2_blogInformation";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//productSpecifics TABLE INPUT


$sql = "DELETE from blogSpecifics WHERE title = '$blogTitle'";

if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'> document.location = '../../cms/menu/cmsMenu.php'; </script>";
} else {
    echo "Error deleting record: " . $conn->error;
}

?>
