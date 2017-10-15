<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/5/2017
 * Time: 12:28 PM
 */
include 'GetImg.php';
$ImgRepo = new ImgProj();
$ImgList = $ImgRepo->getAllImg();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Upload Images To Site</title>
</head>
<body>

<div class="upload_form">

    <h1>Upload Images</h1>

    <form action="formaction.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>

</div>

</body>
</html>
