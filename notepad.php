<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/21/2017
 * Time: 1:23 PM
 */
//crop image with php gd

//require_once 'dbconn.php';
//$dbconnection = new dbconnection();
//$cresdarray = $dbconnection->dbcreds();
//assigning values to array position

$credentials=array();

$credentials[0] = "itm544dbformp1cd.c15xslmyk9xr.us-east-2.rds.amazonaws.com";
$credentials[1] = "itm544class";
$credentials[2] = "itm544pass";
$credentials[3] = "itm544dbformp1cd";

$mysqli = new mysqli($credentials[0], $credentials[1], $credentials[2], $credentials[3]);

// Attempt select query execution
$sql = "SELECT * FROM records";
if ($result = mysqli_query($mysqli, $sql)) {
    $i=0;
    if (mysqli_num_rows($result) > 0) {
        echo "<div style='display: flex; flex-direction: row; flex-wrap: wrap; width: 75%; margin: auto;'>";
        while ($row = mysqli_fetch_array($result)){
            echo "<img src='https://" . $row['furl'] . "' atl='image' border=3 height=500 width=500 />";
            echo "<img src='https://" . $row['furl'] . "' atl='image' border=3 height=500 width=500 />";
        }
        echo "</div>";

        echo "<table>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>email</th>";
        echo "<th>phone</th>";
        echo "<th>rurl</th>";
        echo "<th>furl</th>";
        echo "<th>rurl</th>";
        echo "<th>furl</th>";
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
            echo "<td>" . $row['rurl'] . "</td>";
            echo "<td>" . $row['furl'] . "</td>";
            echo "<td><img src='https://" . $row['rurl'] . "' atl='image' border=3 height=100 width=100 /></td>";
            echo "<td><img src='https://" . $row['furl'] . "' atl='image' border=3 height=100 width=100 /></td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td>" . $row['receipt'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        while ($row = mysqli_fetch_array($result)) {

        }

    }
}

?>