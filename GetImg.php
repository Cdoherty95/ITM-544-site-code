<?php
/**
 * Created by PhpStorm.
 * User: Chris
 * Date: 10/5/2017
 * Time: 10:49 AM
 */

class ImgProj
{

    function OpenCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "1234";
        $db = "mysqlbdimages";


        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);


        return $conn;
    }

    function CloseCon($conn)
    {
        $conn->close();
    }

    function getAllImg()
    {

        //connection statement
        $conn = $this->OpenCon();

        //select statement
        $result = $conn->prepare('SELECT * FROM imgdata');
        $result->execute();
        //grab a result set
        $resultSet = $result->get_result();
        $i = 0;
        $dataArray = array();
        foreach ($resultSet as $row) {
            $dataArray[$i][0] = $row['id'];
            $dataArray[$i][1] = $row['name'];
            $dataArray[$i][2] = $row['url'];
            $i++;
        }
        return $dataArray;
    }

    function uploadImg($i, $n, $u)
    {
        $id = $i;
        $name = $n;
        $url = $u;
        //open COnnection
        $conn = $this->OpenCon();
        //Prepared statement
        $insert = $conn->prepare('INSERT INTO imgdata (id, name, url) 
                    VALUES (?, ?, ?');
        //insert statement
        $insert->execute(array($id, $name, $url));
    }
}
?>
