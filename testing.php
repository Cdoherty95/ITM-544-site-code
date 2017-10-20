<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/15/2017
 * Time: 8:57 PM
 *
 * ?>
 * <html>
 * <head>
 * <title>Creating MySQL Tables</title>
 * </head>
 * <body>
 * <?php
 * $dbhost = 'rds.c15xslmyk9xr.us-east-2.rds.amazonaws.com';
 * $dbuser = 'admin';
 * $dbpass = 'admin123';
 * $dbname = 'rds';
 *
 * $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
 * if (!$link) {
 * echo "Error: Unable to connect to MySQL." . PHP_EOL;
 * echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
 * echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
 * exit;
 * }
 * echo 'Connected successfully<br />';
 * mysqli_close($link);
 * ?>
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "127.0.0.1";
$username = "admin";
$password = "";
$dbname = "rds";

$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
    exit();
}

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
        echo "<th>furl</th>";
        echo "<th>status</th>";
        echo "<th>receipt</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['rurl'] . "</td>";
            echo "<td>" . $row['furl'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td>" . $row['receipt'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
mysqli_close($mysqli);

?>



