<!DOCTYPE html>
<html>
   <body>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "courses_except_engr";

// Create connection
$myDB = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($myDB->connect_error) {
    die("Connection failed: " . $myDB->connect_error);
}
echo "Connected successfully \n";

echo $myDB->host_info;

$sql = "SELECT 'Class Name', Workload, 'A+', FROM myTable";
$result = $myDB->query($sql);



if ($result->num_rows) {

	echo $result;
}
/*	//output data of row
	while ($row = $result->fetch_assoc()) {
		echo "class name " . $row["Class Name"] . " " . "Workload " . $row["Workload"] . " " . "grade " . $row["A+"] . "<br>";

	}
}
else {
	echo "no results mate";
}*/

?>


    	<p>Welcome to viveks website</p>
    


    </body>
</html>