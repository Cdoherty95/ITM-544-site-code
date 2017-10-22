<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/21/2017
 * Time: 1:23 PM
 */
//crop image with php gd

require_once 'dbconn.php';
$dbconnection = new dbconnection();
$cresdarray = $dbconnection->dbcreds();

$mysqli = new mysqli($cresdarray[0], $cresdarray[1], $cresdarray[2], $cresdarray[3]);

// Attempt select query execution
$sql = "SELECT * FROM records";
if ($result = mysqli_query($mysqli, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>email</th>";
        echo "<th>phone</th>";
        echo "<th>rurl</th>";
        echo "<th>status</th>";
        echo "<th>receipt</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            //$alttext = 'image';
            //$address = '<img src="' . $row['rurl'] . '" alt="' . $alttext . '" border=3 height=100 width=100>';
            //$addresspost = '<img src="' . $row['furl'] . '" alt="' . $alttext . '" border=3 height=100 width=100>';
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td><img src='" . $row['rurl'] . "' atl='image' border=3 height=100 width=100 </td>";
            echo "<td><img src='" . $row['furl'] . "' atl='image' border=3 height=100 width=100 </td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td>" . $row['receipt'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";



?>