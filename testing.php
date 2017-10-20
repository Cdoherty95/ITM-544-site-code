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

echo getenv('HOME');

$servername = "rds.c15xslmyk9xr.us-east-2.rds.amazonaws.com";
$username = "admin";
$password = "admin123";
$dbname = "rds";

$conn = new mysqli($servername,$username,$password,$dbname);

//Check Connection
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}

$conn->query("DROP TABLE records");


//SQL Statement to create table
$sql = "CREATE TABLE records
(
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(32),
phone VARCHAR(32),
rurl VARCHAR(32),
furl VARCHAR(32),
status INT(1),
receipt BIGINT
)";

//Creates the table if not tells why it cannot
if($conn->query($sql)===TRUE){
    echo "Created table";
}else{
    echo "failed". $conn->error;;
}

/* Prepared statement, stage 1: prepare */
if (!($stmt = $conn->prepare("INSERT INTO records (id, email, phone,
rurl, furl, status, receipt) VALUES (NULL,?,?,?,?,?,?)"))) {
    echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
}

$conn->close();

/*open connection*/
$servername = "rds.c15xslmyk9xr.us-east-2.rds.amazonaws.com";
$username = "admin";
$password = "admin123";
$dbname = "rds";

$conn = new mysqli($servername,$username,$password,$dbname);

//Check Connection
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}

/* Var for testing */
$email = "test1@gum.com";
$phone = "778589";
$raw_url = "aws-raw.com";
$fin_url = "aws-fin.com";
$status = "1";
$receipt = "45454545454545";

/* Binding Values Passed from Post*/
$stmt->bind_param("ssssii", $email, $phone, $raw_url,
    $fin_url, $status, $receipt);

//execute prepared stmt
$stmt->execute();

//display # of rows inserted
printf("%d Row inserted.\n", $stmt->affected_rows);

/* close statement and connection */
$stmt->close();
$conn->close();

/*open connection*/
$servername = "rds.c15xslmyk9xr.us-east-2.rds.amazonaws.com";
$username = "admin";
$password = "admin123";
$dbname = "rds";

$conn1 = new mysqli($servername,$username,$password,$dbname);

//Check Connection
if ($conn1->connect_errno) {
    printf("Connect failed: %s\n", $conn1->connect_error);
    exit();
}

//SQL to select all
$select = "SELECT * FROM records";
$result = mysqli_query($conn1, $select);
var_dump($result);
/*
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
printf ("%s (%s)\n", $row["id"], $row["email"]);
mysqli_free_result($result);
mysqli_close($conn1);
*/
    /*  $id = $row['id'];
      $email = $row['email'];
      $phone =
      $row["id"], $row["email"], $row["phone"],
              $row["rurl"], $row["furl"], $row["status"], $row["recpt"])
  /*
  if ($results = $conn->query($select)){
      var_dump($results);
      echo '</br>';
      while ($row = $results->fetch_assoc()) {
          printf("%s (%s,%s)\n", $row["id"], $row["email"], $row["phone"],
              $row["rurl"], $row["furl"], $row["status"], $row["receipt"]);
      }
      /* free result set */
    //$result->close();


echo '</br>';
/*
$result = $conn->prepare('SELECT * FROM records');
$result->execute();
$data = $result->fetchAll();
$i=0;
$dataArray = array();
foreach ($data as $row){
    $dataArray[$i][0] = $row['id'];
    $dataArray[$i][1] = $row['email'];
    $dataArray[$i][2] = $row['phone'];
    $dataArray[$i][3] = $row['rurl'];
    $dataArray[$i][4] = $row['furl'];
    $dataArray[$i][5] = $row['status'];
    $dataArray[$i][6] = $row['receipt'];
    $i++;
}

$i=0;
foreach ($dataArray as $currentnote){
    for ($x = 1; $x <= 7;  $x++) {
        print '<p>' . $dataArray[$i][$x] . '</p>';
    }
    $i++;

}
*/

/*

$s3 = new Aws\S3\S3Client([
    'version' => 'latest',
    'region'  => 'us-east-2'
]);


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


