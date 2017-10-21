<?php

class dbconnection
{

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