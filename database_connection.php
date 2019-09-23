<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "f19-um-courses";

// Create connection
$myDB = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($myDB->connect_error) {
    die("Connection failed: " . $myDB->connect_error);
}
//echo "Connected successfully \n";

//echo $myDB->host_info;
echo "<br>";

?>