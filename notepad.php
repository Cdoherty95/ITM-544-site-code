<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/21/2017
 * Time: 1:23 PM
 */

FROM FORMACTION

require_once 'dbconn.php';
$dbconnection = new dbconnection();
$cresdarray = $dbconnection->dbcreds();

$mysqli = new mysqli($cresdarray[0], $cresdarray[1], $cresdarray[2], $cresdarray[3]);

/*prepared statement*/
$stmt = $mysqli->prepare("INSERT INTO records (email, phone, rurl, furl, status, receipt) VALUES (?,?,?,?,?,?)");

//bind parameters to prepared stmt
$stmt->bind_param("ssssii", $email, $phone, $rurl, $furl, $status, $receipt);

//var used for testing
$email = "fd123@g4.com";
$phone = "h778889999";
$rurl = "cdsdgfdsg.com";
$furl = "asdfasdfg.com";
$status = "1";
$receipt = random_int(1, 999999);

//execute the prepared stmt
$stmt->execute();

/*for testing purpoes # of rows affected*/
printf("%d Row inserted.\n", $stmt->affected_rows);

/* close statement and connection */
$stmt->close();
$mysqli->close();