
<?php




$blogTitle = $_POST['blogTitle'];
$blogPostText = nl2br($_POST['blogPostText']);
$largeImage = $_FILES["smallImage"]["name"];
$smallImage = $_FILES["largeImage"]["name"];
$largeImagePath = "img/".$largeImage;


//FOR DATABASE

$smallImageDirectory = "img/" . $smallImage;
//$blogTitle



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


$sql = "INSERT INTO blogSpecifics (title, imgDirectory, blogText, largeImgDirectory)
VALUES ('$blogTitle', '$smallImageDirectory', '$blogPostText', '$largeImagePath')";





//UPLOADING IMAGES TO CORRECT DESTINATIONS

//SMALL IMAGE

$target_dir = "../blogChoices/img/";
$target_file = $target_dir . basename($_FILES["largeImage"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["largeImage"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $uploadOk = 0;
}






//LARGE IMAGE

$target_dir = "../blogPosts/img/";
$target_file = $target_dir . basename($_FILES["smallImage"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["smallImage"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error






if ($conn->query($sql) === TRUE) {
    echo "<script type='text/javascript'> document.location = '../blogChoices/blogChoices.php'; </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();




?>
