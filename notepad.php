<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/21/2017
 * Time: 1:23 PM
 */
//crop image with php gd

$filename = 'S:\XAMPP\htdocs\ITM-544-site-code\files\95e2a0ea6d84fa3c8a5fe8f2c68ac241.jpg';

// Load the stamp and the photo to apply the watermark to
$stamp = imagecreatefrompng('watermark.png');
$im = imagecreatefromjpeg($filename);
$watermarkfile = 'S:\XAMPP\htdocs\ITM-544-site-code\files\new1.jpg';

// Set the margins for the stamp and get the height/width of the stamp image
$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

// Copy the stamp image onto our photo using the margin offsets and the photo
// width to calculate positioning of the stamp.
imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
imagejpeg($im, $watermarkfile, 100);


?>