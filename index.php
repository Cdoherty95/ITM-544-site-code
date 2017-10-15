<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/5/2017
 * Time: 10:42 AM
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

    <title>Freebie: 4 Bootstrap Gallery Templates</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="gallery-grid.css">


</head>
<body>

<div class="container gallery-container">

    <h1>Bootstrap 3 Gallery</h1>

    <p class="page-description text-center">Grid Layout With Zoom Effect</p>

    <div class="tz-gallery">
        <?php

        $i = 0;
        foreach ($ImgList as $currentnote) {
            print '<div class="item">';
            print '<p>ID: ' . $ImgList[$i][0] . '</p>';
            print '<p>name: ' . $ImgList[$i][1] . '</p>';
            print '<p>url: ' . $ImgList[$i][2] . '</p>';
            print '</div>';
            $i++;

        }
        ?>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
</body>
</html>