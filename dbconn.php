<?php
require 'vendor/autoload.php';
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

class dbconnection
{
    public function createbuckets(){

        //Create a S3Client
        $s3Client = new S3Client([
            'version' => 'latest',
            'region'  => 'us-east-2'
        ]);

        //Listing all S3 Bucket
        $buckets = $s3Client->listBuckets();
        $i=0;
        $bucketnames=array();
        foreach ($buckets['Buckets'] as $bucket) {
            $bucketnames[$i] = $bucket['Name'];
            $i++;
        }

        if (in_array("itm544s3pre", $bucketnames)) {
            if (in_array("itm544s3post", $bucketnames)) {
                echo "buckets exist";
            }else {
                //pre is present post is not
                $s3Client->createBucket(array('Bucket' => 'itm544s3post'));
                echo "bucket itm544s3post was created";
            }
        }elseif (in_array("itm544s3post", $bucketnames)){
            //post is present pre is not
            $s3Client->createBucket(array('Bucket' => 'itm544s3pre'));
            echo "bucket itm544s3post was created";
        }else{
            //creates both buckets if neither exist
            $s3Client->createBucket(array('Bucket' => 'itm544s3pre'));
            $s3Client->createBucket(array('Bucket' => 'itm544s3post'));
            //NEEDS TO BE REMOVED
            echo "both buckets were created";
        }
    }

    public function openconnection()
    {
        /*creds*/
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
        return $mysqli;
    }

}
 ?>