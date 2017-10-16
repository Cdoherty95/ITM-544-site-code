<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/15/2017
 * Time: 8:57 PM
 */
?>
<html>
<head>
    <title>Creating MySQL Tables</title>
</head>
<body>
<?php
$dbhost = 'localhost:3036';
$dbuser = 'root';
$dbpass = 'rootpassword';
$dbname = 'rds';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
    echo 'Connected successfully<br />';
/*
$sql = "CREATE TABLE records
    (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(32),
    phone VARCHAR(32),
    s3-raw-url VARCHAR(32),
    s3-finished-url VARCHAR(32),
    status INT(1),
    reciept BIGINT
    )";
mysql_select_db( 'TUTORIALS' );
$retval = mysql_query( $sql, $conn );
if(! $retval ) {
    die('Could not create table: ' . mysql_error());
}
echo "Table created successfully\n";

*/
mysqli_close($conn);

?>
</body>
</html>


