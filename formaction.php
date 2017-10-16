<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/5/2017
 * Time: 12:33 PM
<<<<<<< HEAD
 */
require 'vendor/autoload.php';
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
=======

require 'vendor/autoload.php';
*/


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $name = $_POST['user_mail'];
    $name = $_POST['phone'];
    $file = $_POST['image'];
}
//local directory
$target_dir = "uploads/";
//
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//sets a variable for success
$uploadOk = 1;

//get files type (jpg, png) ect
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

>>>>>>> f32a50e838a87fb1e2bdfd1f97d9974df428da0c
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    //boolean to see if file returns image size
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    //block to check if file is an image
    if ($check !== false) {
        //ensure file is in .jpg, .png, .jpeg, or .gif
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            //message if file is not
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        //message if file is good format and size
        $uploadOk = 1;
    } //else file is not in the proper format
    else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    //upload file to directory
    //this will need to be replaced with call to s3 and my sqldb
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}

//Need to put redirect to gallery page here with get methods
if ($uploadOk == 1) {
    $result = '<div class="alert alert-success">Image Has Been Uploaded</div>';
} else {
    $result = '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
}
//results not echoing

echo $result;

?>

