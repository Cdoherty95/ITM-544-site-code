<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/5/2017
 * Time: 12:33 PM
 */
require 'vendor/autoload.php';
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            //ensure file is in .jpg, .png, .jpeg, or .gif
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif")
            {
                //message if file is not
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            //message if file is good fromat and size
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        //upload file to directory
        //this will need to be replaced with call to s3 and my sqldb
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    }
    if ($uploadOk == 1) {
        $result = '<div class="alert alert-success">Image Has Been Uploaded</div>';
    } else {
        $result = '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
    }
    //results not echoing

    echo $result;

?>

