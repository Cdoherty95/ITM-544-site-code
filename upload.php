<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/5/2017
 * Time: 12:28 PM
 */
/*
include 'GetImg.php';
$ImgRepo = new ImgProj();
$ImgList = $ImgRepo->getAllImg();
*/
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="gallery-grid.css">

    <title>Upload Images To Site</title>
</head>
<body>

<div class="container gallery-container">

    <h1>Upload Images</h1>

    <div class="upload_form">
    <form action="formaction.php" method="post" enctype="multipart/form-data">
<<<<<<< HEAD
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="user_name">
        </div>
        <div>
            <label for="mail">E-mail:</label>
            <input type="email" id="mail" name="user_mail">
        </div>
        <div>
            <label for="msg">Message:</label>
            <textarea id="msg" name="user_message"></textarea>
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="user_name">
        </div>
        <div>
            <label for="mail">E-mail:</label>
            <input type="email" id="mail" name="email">
        </div>
        <div>
            <label for="msg">Select image to upload:</label>
            <input type="file" name="fileToUpload" id="fileToUpload"
        </div>



        <input type="submit" value="Upload Image" name="submit">
=======
        <div class="form_input">
            <label for="mail">E-mail:</label>
            <input type="email" id="mail" name="user_mail" placeholder="test@test.com">
        </div>
        <div class="form_input">
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" placeholder="3125895689">
        </div>
        <div class="form_input">
            <label for="msg">Select image to upload:</label>
            <input type="file" name="image" id="image">
        </div>
        <input class="form_input" type="submit" value="Upload Image" name="submit">
>>>>>>> f32a50e838a87fb1e2bdfd1f97d9974df428da0c
    </form>

    </div>
</div>
</body>
</html>
