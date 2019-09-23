<?php


include "database_connection.php";
//search database for input

$text_from_search = $_GET["search"];
//$text_from_dropdown_workload = $_GET["workload"];
//$text_from_dropdown_grades = $_POST["grades"];
//$text_from_search = preg_replace("#[^1-100]#", "", $text_from_search);

$sql = "SELECT ClassName, `A+`, 'Workload' FROM courses WHERE `A+` >= '$text_from_search'";
//$sql = "SELECT 'Workload' FROM myTable WHERE 'Workload' <= '$text_from_dropdown_workload' ";

$result = $myDB->query($sql);

if ($result->num_rows > 0) {

	//output data of row
	while ($row = $result->fetch_assoc()) {
		echo $row["ClassName"] . " A+ " . $row["A+"] . "<br>";
	}
}
else {
	echo "no results mate";
}

$myDB->close();

?>