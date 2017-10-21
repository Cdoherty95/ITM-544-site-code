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
$cresdarray = $dbconnection->dbcreds();

$mysqli = new mysqli($cresdarray[0], $cresdarray[1], $cresdarray[2], $cresdarray[3]);

// Attempt select query execution
$sql = "SELECT * FROM records";
if ($result = mysqli_query($mysqli, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        $alttext = 'image';
        $address = '<img src="' . $row['rurl'] . '" alt="' . $alttext . '" border=3 height=100 width=100>';
        $addresspost = '<img src="' . $row['furl'] . '" alt="' . $alttext . '" border=3 height=100 width=100>';
        echo $address;
        echo $addresspost;
        /*
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
            $alttext = 'image';
            $address = '<img src="' . $row['rurl'] . '" alt="' . $alttext . '" border=3 height=100 width=100>';
            $addresspost = '<img src="' . $row['furl'] . '" alt="' . $alttext . '" border=3 height=100 width=100>';
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $address . "</td>";
            echo "<td>" . $addresspost . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td>" . $row['receipt'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        */

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
</body>
</html>