<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/5/2017
 * Time: 12:33 PM
 *
 * require 'vendor/autoload.php';
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    //changed from _POST??
    $file = $_FILES['image'];

    //file details
    $name = $_FILES['image']['name'];
    $tmp_name = $file['tmp_name'];

    $extension = explode('.', $name);
    $extension = strtolower(end($extension));

    //temp details
    $key = md5(uniqid());
    $tmp_file_name = "{$key}.{$extension}";
    $tmp_file_path = "/var/www/html/files/{$tmp_file_name}";

    //move the file
    move_uploaded_file($tmp_name, $tmp_file_path);


    try{
        $s3Client = new S3Client([
            'version' => 'latest',
            'region'  => 'us-east-2'
        ]);
        $s3Client->putObject([
            'Bucket' => 'itm544s3pre',
            'Key' => $key,
            'Body' => fopen($tmp_file_path, 'rb'),
            'ACL' => 'public-read'
        ]);

        //remove the file from local
        //unlink($tmp_file_path);
    }catch (S3Exception $e){
        die("error uploading". $e);
    }
}




/*local directory
//$target_dir = "uploads/";
//
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//sets a variable for success
$uploadOk = 1;

//get files type (jpg, png) ect
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

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
*/


/*
//Need to put redirect to gallery page here with get methods
if ($uploadOk == 1) {
    $result = '<div class="alert alert-success">Image Has Been Uploaded</div>';
} else {
    $result = '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
}
//results not echoing

echo $result;
*/
?>

