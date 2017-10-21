<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/21/2017
 * Time: 1:23 PM
 */
//crop image with php gd

$filename = 'S:\XAMPP\htdocs\ITM-544-site-code\files\95e2a0ea6d84fa3c8a5fe8f2c68ac241.jpg';
$croppedfile = 'S:\XAMPP\htdocs\ITM-544-site-code\files\new1.jpg';

$imageSize = getimagesize($filename);
$currwidth = $imageSize[0];
$currhight = $imageSize[1];

$left = 0;
$top = 0;

$cropwidth = 700;
$cropheight = 400;

$canvas = imagecreatetruecolor($cropwidth, $cropheight);
$currentimage = imagecreatefromjpeg($filename);
imagecopy($canvas, $currentimage, 100, 100, $left, $top, $currwidth, $currhight);
imagejpeg($canvas, $croppedfile, 100);
echo 'Image crop Successful';
exit;

?>