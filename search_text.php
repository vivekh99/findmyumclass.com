<?php


include "database_connection.php";
//search database for input

$text_from_search = $_GET["search"];
$sql = "SELECT `Class Name`, `A+` FROM myTable WHERE `A+` >= '$text_from_search' ";
$result = $myDB->query($sql);

if ($result->num_rows > 0) {

//	echo $result;
	//output data of row
	while ($row = $result->fetch_assoc()) {
		echo $row["Class Name"] . " A+ " . $row["A+"] . "<br>";
	}
}
else {
	echo "no results mate";
}

$myDB->close();

?>