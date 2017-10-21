<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/21/2017
 * Time: 11:20 AM
 */
require_once '1.php';

$dbconnection = new dbconnection();

$mysqi = $dbconnection->openconnection();

$sql = "SELECT * FROM records";
$result = $mysqi->query($sql);

var_dump($result);
?>