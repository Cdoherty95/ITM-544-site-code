<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ITM 544 Cloud Computing</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="gallery-grid.css">


</head>
<?php

/*creds SHOULDNT NEED
$servername = "rds.c15xslmyk9xr.us-east-2.rds.amazonaws.com";
$username = "admin";
$password = "admin123";
$dbname = "rds";

$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
    exit();
}
*/

require_once 'dbconn.php';
$dbconnection = new dbconnection();
$cresdarray = $dbconnection->dbcreds();
$dbconnection->createbuckets();

$mysqli = new mysqli($cresdarray[0], $cresdarray[1], $cresdarray[2], $cresdarray[3]);

/*SQL Create teble statement*/
$sql = "CREATE TABLE IF NOT EXISTS records
(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(32),
phone VARCHAR(32),
rurl VARCHAR(255),
furl VARCHAR(255),
status INT(1),
receipt BIGINT
)";

/***********NEEDS TO BE REMOVED
 * run SQL
 */
if ($mysqli->query($sql) === TRUE) {
    //commented out for display purposes
    //echo "Table created successfully";
} else {
    echo "Error creating database: " . $mysqli->error;
}

/* close connection */
$mysqli->close();

?>

<body>

<div class="container gallery-container">

    <h1>Welcome To Chris Doherty Project 1</h1>

    <p class="page-description text-center">Choose a destination</p>

    <div class="indxnav">
        <a href="gallery.php">
            <button type="button" class="btn first">Gallary Page</button>
        </a>
        <a href="upload.php">
            <button type="button" class="btn second">Upload Images</button>
        </a>
    </div>

</div>

</body>
</html>