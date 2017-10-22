<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/5/2017
 * Time: 12:33 PM
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
    $postkey = md5(uniqid());
    $tmp_file_name = "{$key}.{$extension}";
    $tmp_file_post_name = "{$postkey}.{$extension}";
    $tmp_file_path = "/var/www/html/files/{$tmp_file_name}";
    $tmp_file_post_path = "/var/www/html/files/{$tmp_file_post_name}";

    //move the file
    move_uploaded_file($tmp_name, $tmp_file_path);

    try{
        $s3Client = new S3Client([
            'version' => 'latest',
            'region'  => 'us-east-2'
        ]);
        $s3Client->putObject([
            'Bucket' => 'itm544s3pre',
            'Key' => $tmp_file_name,
            'Body' => fopen($tmp_file_path, 'rb'),
            'ACL' => 'public-read'
        ]);

        //remove the file from local
        //unlink($tmp_file_path);
    }catch (S3Exception $e){
        die("error uploading". $e);
    }

    $filename = $tmp_file_path;
    $watermarkfile = $tmp_file_post_path;

// Load the stamp and the photo to apply the watermark to
    $stamp = imagecreatefrompng('watermark.png');
    $im = imagecreatefromjpeg($filename);

// Set the margins for the stamp and get the height/width of the stamp image
    $marge_right = 10;
    $marge_bottom = 10;
    $sx = imagesx($stamp);
    $sy = imagesy($stamp);

// Copy the stamp image onto our photo using the margin offsets and the photo
// width to calculate positioning of the stamp.
    imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
    imagejpeg($im, $watermarkfile, 100);

    try{
        $s3Client = new S3Client([
            'version' => 'latest',
            'region'  => 'us-east-2'
        ]);
        $s3Client->putObject([
            'Bucket' => 'itm544s3post',
            'Key' => $tmp_file_post_name,
            'Body' => fopen($tmp_file_post_path, 'rb'),
            'ACL' => 'public-read'
        ]);

        //remove the file from local
        //unlink($tmp_file_post_path);
    }catch (S3Exception $e){
        die("error uploading". $e);
    }

}

require_once 'dbconn.php';
$dbconnection = new dbconnection();
$cresdarray = $dbconnection->dbcreds();

$mysqli = new mysqli($cresdarray[0], $cresdarray[1], $cresdarray[2], $cresdarray[3]);

/*prepared statement*/
if ($stmt = $mysqli->prepare("INSERT INTO records (email, phone, rurl, furl, status, receipt) VALUES (?,?,?,?,?,?)")){

    //bind parameters to prepared stmt
    $stmt->bind_param("ssssii", $email, $phone, $rurl, $furl, $status, $receipt);
    //var used for testing
    $rurl = "s3.us-east-2.amazonaws.com/itm544s3pre/".$tmp_file_name;
    $furl = "s3.us-east-2.amazonaws.com/itm544s3post/".$tmp_file_post_name;
    $status = "1";
    $receipt = random_int(1, 999999);

    //execute the prepared stmt
    $stmt->execute();

}






/*for testing purpoes # of rows affected*/
//printf("%d Row inserted.\n", $stmt->affected_rows);
echo "<h1 style='text-align: center;'>Upload Successful</h1>";
/* close statement and connection */
$stmt->close();
$mysqli->close();

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="gallery-grid.css">

    <title>Upload Successful!</title>
</head>
<body>
<div class="container gallery-container">
    <h1>Choose A Destination</h1>
    <div class="indxnav">
        <a href="gallery.php">
            <button type="button" class="btn first">Gallary Page</button>
        </a>
        <a href="upload.php">
            <button type="button" class="btn second">Upload Images</button>
        </a>
    </div>
</div>
</body>
</html>