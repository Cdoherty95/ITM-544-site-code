<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/15/2017
 * Time: 8:57 PM
 
?>
<html>
<head>
    <title>Creating MySQL Tables</title>
</head>
<body>
<?php
$dbhost = 'rds.c15xslmyk9xr.us-east-2.rds.amazonaws.com';
$dbuser = 'admin';
$dbpass = 'admin123';
$dbname = 'rds';

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
    echo 'Connected successfully<br />';
mysqli_close($link);
?>
*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

$s3 = new Aws\S3\S3Client([
    'version' => 'latest',
    'region'  => 'us-east-2'
]);
echo getenv('HOME');

/*

$result = $s3->createBucket([
    'ACL' => 'public-read',
    'Bucket' => 'cditm544buckettest', // REQUIRED
]);
*/




/*
$localImage = 'chris.jpg';

$results = $sdk->putObject(array(
    'Bucket'     => 'imgstorageitmd544',
    'SourceFile' => $localImage,
    'Key'        => basename($localImage)
));

// Create an Amazon S3 client using the shared configuration data.
$client = $sdk->createS3();

$result = $client->putObject([
    'Bucket' => 'my-bucket11005566',
    'Key'    => 'my-key',
    'Body'   => 'this is the body!'
]);

// Download the contents of the object.
$result = $s3Client->getObject([
    'Bucket' => 'my-bucket11005566',
    'Key'    => 'my-key'
]);

// Print the body of the result by indexing into the result object.
echo $result['Body'];
*/
echo "heello";

//$client->createBucket(array('Bucket' => 'mybucket'));
/*
$client = S3Client::factory(array(
    'profile' => '<profile in your aws credentials file>'
));


$BUCKET_NAME='cdtim544bucket';
//Create a S3Client
$s3Client = new S3Client([
    'region' => 'us-east-2',
    'version' => '2006-03-01'
]);
//Creating S3 Bucket
try {
    $result = $s3Client->createBucket([
        'Bucket' => $BUCKET_NAME,
    ]);
}catch (AwsException $e) {
    // output error message if fails
    echo $e->getMessage();
    echo "\n";
}

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
//mysqli_close($conn);

?>
</body>
</html>


