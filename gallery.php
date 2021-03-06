<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/5/2017
 * Time: 10:42 AM
 */

?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Chris Doherty Gallery</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="gallery-grid.css">


</head>
<body>
<div class="indxnav">
    <a href="gallery.php">
        <button type="button" class="btn first">Gallary Page</button>
    </a>
    <a href="upload.php">
        <button type="button" class="btn second">Upload Images</button>
    </a>
</div>

</div>
<?php

require_once 'dbconn.php';
$dbconnection = new dbconnection();
$credentials = $dbconnection->dbcreds();

$mysqli = new mysqli($credentials[0], $credentials[1], $credentials[2], $credentials[3]);

// Attempt select query execution
$sql = "SELECT * FROM records";
if ($result = mysqli_query($mysqli, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<div style='display: flex; flex-direction: row; flex-wrap: wrap; width: 75%; margin-left: 17.5%;'>";
        while ($row = mysqli_fetch_array($result)){
            echo "<img src='https://" . $row['rurl'] . "' atl='image' border=3 height=500 width=500 />";
            echo "<img src='https://" . $row['furl'] . "' atl='image' border=3 height=500 width=500 />";
        }
        echo "</div>";

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

</div>
</div>

</body>
</html>